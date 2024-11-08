<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{MaterialRepository, GrupoMaterialRepository, SubGrupoMaterialRepository, ClasseMaterialRepository, MarcaMaterialRepository};

class MaterialController
{
    private MaterialRepository $materialRepository;
    private GrupoMaterialRepository $grupoMaterialRepository;
    private SubGrupoMaterialRepository $subGrupoMaterialRepository;
    private ClasseMaterialRepository $classeMaterialRepository;
    private MarcaMaterialRepository $marcaMaterialRepository;

    public function __construct(Database $conn)
    {
        $this->materialRepository = new MaterialRepository($conn);
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
        $this->subGrupoMaterialRepository = new SubGrupoMaterialRepository($conn);
        $this->classeMaterialRepository = new ClasseMaterialRepository($conn);
        $this->marcaMaterialRepository = new MarcaMaterialRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->materialRepository->create($args)) {
            header("Location: /materiais/materiais");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $material = $this->materialRepository->find($args["id"]);
        $material->setGrupo($this->grupoMaterialRepository->find($args['grupo-editar']));
        $material->setSubgrupo($this->subGrupoMaterialRepository->find($args['subgrupo-editar']));
        $material->setClasse($this->classeMaterialRepository->find($args['classe-editar']));
        $material->setMarca($this->marcaMaterialRepository->find($args['marca-editar']));
        $material->setCodigo($args['codigo-editar']);
        $material->setDescricao($args['descricao-editar']);

        if ($this->materialRepository->update($material)) {
            header("Location: /materiais/materiais");
        }
    }

    public function delete(array $args): void
    {
        $material = $this->materialRepository->find($args["id"]);
        if ($this->materialRepository->delete($material)) {
            header("Location: /materiais/materiais");
        }
    }
}