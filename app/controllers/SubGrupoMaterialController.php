<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\SubGrupoMaterialRepository;
use App\Repositories\GrupoMaterialRepository;

class SubGrupoMaterialController
{
    private SubGrupoMaterialRepository $subGrupoMaterialRepository;
    private GrupoMaterialRepository $grupoMaterialRepository;

    public function __construct(Database $conn)
    {
        $this->subGrupoMaterialRepository = new SubGrupoMaterialRepository($conn);
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
    }

    public function new(array $args): void
    {
        $grupo = $this->grupoMaterialRepository->find($args['grupo']);
        $args['grupo'] = $grupo;

        if ($this->subGrupoMaterialRepository->create($args)) {
            header("Location: /materiais/subgrupos-material");
            exit;
        }
    }

    public function alter(array $args): void
    {
        $subGrupoMaterial = $this->subGrupoMaterialRepository->find($args["id"]);
        $grupo = $this->grupoMaterialRepository->find($args['grupo']);

        $subGrupoMaterial->setGrupo($grupo);
        $subGrupoMaterial->setCodigo($args['codigo']);
        $subGrupoMaterial->setDescricao($args['descricao']); // Aqui ajustado para o novo atributo 'descricao'

        if ($this->subGrupoMaterialRepository->update($subGrupoMaterial)) {
            header("Location: /materiais/subgrupos-material");
            exit;
        }
    }

    public function delete(array $args): void
    {
        $subGrupoMaterial = $this->subGrupoMaterialRepository->find($args["id"]);
        if ($this->subGrupoMaterialRepository->delete($subGrupoMaterial)) {
            header("Location: /materiais/subgrupos-material");
            exit;
        }
    }

    public function listByGrupo(array $args): void
    {
        $subGrupos = $this->subGrupoMaterialRepository->findBy('id_grupo', $args['grupo']);

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractSubGrupoMaterial'], $subGrupos);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    private function extractSubGrupoMaterial($subGrupoMaterial): array
    {
        return [
            'id' => $subGrupoMaterial->getId(),
            'grupo' => [
                'id' => $subGrupoMaterial->getGrupo()->getId(),
                'codigo' => $subGrupoMaterial->getGrupo()->getCodigo(),
                'descricao' => $subGrupoMaterial->getGrupo()->getDescricao()
            ],
            'codigo' => $subGrupoMaterial->getCodigo(),
            'descricao' => $subGrupoMaterial->getDescricao()
        ];
    }
}