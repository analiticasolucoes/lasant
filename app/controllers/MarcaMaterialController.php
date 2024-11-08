<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{MarcaMaterialRepository, GrupoMaterialRepository};

class MarcaMaterialController
{
    private MarcaMaterialRepository $marcaMaterialRepository;
    private GrupoMaterialRepository $grupoMaterialRepository;

    public function __construct(Database $conn)
    {
        $this->marcaMaterialRepository = new MarcaMaterialRepository($conn);
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->marcaMaterialRepository->create($args)) {
            header("Location: /materiais/marcas-material");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $marcaMaterial = $this->marcaMaterialRepository->find($args["id"]);
        $marcaMaterial->setGrupo($this->grupoMaterialRepository->find($args['grupo-editar']));
        $marcaMaterial->setDescricao($args['descricao-editar']);
        if ($this->marcaMaterialRepository->update($marcaMaterial)) {
            header("Location: /materiais/marcas-material");
        }
    }

    public function delete(array $args): void
    {
        $marcaMaterial = $this->marcaMaterialRepository->find($args["id"]);
        if ($this->marcaMaterialRepository->delete($marcaMaterial)) {
            header("Location: /materiais/marcas-material");
        }
    }

    public function listByGrupo(array $args): void
    {
        $marcas = $this->marcaMaterialRepository->findBy('id_grupo', $args['grupo']);

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractMarcaMaterial'], $marcas);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    private function extractMarcaMaterial($marcaMaterial): array
    {
        return [
            'id' => $marcaMaterial->getId(),
            'grupo' => [
                'id' => $marcaMaterial->getGrupo()->getId(),
                'codigo' => $marcaMaterial->getGrupo()->getCodigo(),
                'descricao' => $marcaMaterial->getGrupo()->getDescricao()
            ],
            'descricao' => $marcaMaterial->getDescricao()
        ];
    }

}