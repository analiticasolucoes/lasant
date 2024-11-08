<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{ClasseMaterialRepository, GrupoMaterialRepository, SubGrupoMaterialRepository};

class ClasseMaterialController
{
    private ClasseMaterialRepository $classeMaterialRepository;
    private GrupoMaterialRepository $grupoMaterialRepository;
    private SubGrupoMaterialRepository $subGrupoMaterialRepository;

    public function __construct(Database $conn)
    {
        $this->classeMaterialRepository = new ClasseMaterialRepository($conn);
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
        $this->subGrupoMaterialRepository = new SubGrupoMaterialRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->classeMaterialRepository->create($args)) {
            header("Location: /materiais/classes-material");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $classeMaterial = $this->classeMaterialRepository->find($args["id"]);
        $classeMaterial->setGrupo($this->grupoMaterialRepository->find($args['grupo-editar']));
        $classeMaterial->setSubgrupo($this->subGrupoMaterialRepository->find($args['subgrupo-editar']));
        $classeMaterial->setCodigo($args['codigo-editar']);
        $classeMaterial->setDescricao($args['descricao-editar']);
        if ($this->classeMaterialRepository->update($classeMaterial)) {
            header("Location: /materiais/classes-material");
        }
    }

    public function delete(array $args): void
    {
        $classeMaterial = $this->classeMaterialRepository->find($args["id"]);
        if ($this->classeMaterialRepository->delete($classeMaterial)) {
            header("Location: /materiais/classes-material");
        }
    }

    public function listByGrupo(array $args): void
    {
        $classes = $this->classeMaterialRepository->findBy('id_grupo', $args['grupo']);

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractClasseMaterial'], $classes);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    public function listBySubgrupo(array $args): void
    {
        $classes = $this->classeMaterialRepository->findBy('id_subgrupo', $args['subgrupo']);

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractClasseMaterial'], $classes);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    private function extractClasseMaterial($classeMaterial): array
    {
        return [
            'id' => $classeMaterial->getId(),
            'grupo' => [
                'id' => $classeMaterial->getGrupo()->getId(),
                'codigo' => $classeMaterial->getGrupo()->getCodigo(),
                'descricao' => $classeMaterial->getGrupo()->getDescricao()
            ],
            'subgrupo' => [
                'id' => $classeMaterial->getSubgrupo()->getId(),
                'codigo' => $classeMaterial->getSubgrupo()->getCodigo(),
                'descricao' => $classeMaterial->getSubgrupo()->getDescricao()
            ],
            'codigo' => $classeMaterial->getCodigo(),
            'descricao' => $classeMaterial->getDescricao()
        ];
    }
}