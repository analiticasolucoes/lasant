<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\GrupoMaterialRepository;

class GrupoMaterialController
{
    private GrupoMaterialRepository $grupoMaterialRepository;

    public function __construct(Database $conn)
    {
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->grupoMaterialRepository->create($args)) {
            header("Location: /materiais/grupos-material");
            exit;
        }
    }

    public function alter(array $args): void
    {
        $grupoMaterial = $this->grupoMaterialRepository->find($args["id"]);
        $grupoMaterial->setCodigo($args['codigo']);
        $grupoMaterial->setDescricao($args['descricao']);
        if ($this->grupoMaterialRepository->update($grupoMaterial)) {
            header("Location: /materiais/grupos-material");
            exit;
        }
    }

    public function delete(array $args): void
    {
        $grupoMaterial = $this->grupoMaterialRepository->find($args["id"]);
        if ($this->grupoMaterialRepository->delete($grupoMaterial)) {
            header("Location: /materiais/grupos-material");
            exit;
        }
    }
}