<?php

namespace App\Controllers;

use App\Database\Database;
use App\Models\Material;
use Exception;
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

    /**
     * @throws \Exception
     */
    public function search(array $args = []): void
    {
        $materiais = [];

        // Se o grupo estiver preenchido, buscar por ele
        if (!empty($args['grupo'])) {
            $materiais = $this->materialRepository->findBy('id_materialGrupo', $args['grupo']);
        } else {
            // Caso contrário, retornar todos os materiais ou lidar de forma genérica
            throw new Exception('Grupo é obrigatório para realizar a pesquisa.');
        }

        // Filtrar pelos critérios de código ou descrição, se fornecidos
        foreach ($materiais as $key => $material) {
            // Filtra pelo código do material, se informado
            if (!empty($args['codigo']) && !str_contains($material->getCodigo(), $args['codigo'])) {
                unset($materiais[$key]);
                continue;
            }

            // Filtra pela descrição do material, se informado
            if (!empty($args['descricao']) && stripos($material->getDescricao(), $args['descricao']) === false) {
                unset($materiais[$key]);
            }
        }

        // Reorganiza os índices do array após a filtragem
        $materiais = array_values($materiais);

        // Mapeia os resultados em um formato adequado
        $resultado = array_map([$this, 'extractMaterial'], $materiais);

        // Retorna os resultados como JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    /**
     * Extrai as informações de um objeto Material para o formato desejado.
     */
    private function extractMaterial(Material $material): array
    {
        return [
            'id' => $material->getId(),
            'codigo' => $material->getCodigo(),
            'descricao' => $material->getDescricao(),
            'classe' => $material->getClasse() ? $material->getClasse()->getDescricao() : '',
            'marca' => $material->getMarca() ? $material->getMarca()->getDescricao() : 'SEM MARCA',
            'unidade' => $material->getUnidade() ? $material->getUnidade()->getDescricao() : ''
        ];
    }
}