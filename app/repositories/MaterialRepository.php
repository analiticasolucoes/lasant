<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Material, GrupoMaterial, SubGrupoMaterial, ClasseMaterial, MarcaMaterial};
use \Exception;

class MaterialRepository
{
    protected string $table = 'ta_material';
    private Database $db;
    private Material $material;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getMaterial(): Material
    {
        return $this->material;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateObjectsList($result);
        } else {
            return [];
        }
    }

    public function create(array $data): bool
    {
        $parametros = [
            'id_materialGrupo' => $data['grupo'],
            'id_materialSubgrupo' => $data['subgrupo'] ? $data['subgrupo'] : null,
            'id_materialClasse' => $data['classe'] ? $data['classe'] : null,
            'id_marca' => $data['marca'] ? $data['marca'] : null,
            'cd_material' => $data['codigo'],
            'ds_material' => $data['descricao'],
            'id_unidade' => $data['unidade'],
            'vl_material' => $data['valor']
        ];

        $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
        $subGrupoMaterialRepository = new SubGrupoMaterialRepository($this->db);
        $classeMaterialRepository = new ClasseMaterialRepository($this->db);
        $marcaMaterialRepository = new MarcaMaterialRepository($this->db);
        $unidadeMaterialRepository = new UnidadeRepository($this->db);

        $grupo = $grupoMaterialRepository->find($data['grupo']);
        $subgrupo = $data['subgrupo'] ? $subGrupoMaterialRepository->find($data['subgrupo']) : null;
        $classe = $data['classe'] ? $classeMaterialRepository->find($data['classe']) : null;
        $marca = $data['marca'] ? $marcaMaterialRepository->find($data['marca']) : null;
        $unidade = $data['unidade'] ? $unidadeMaterialRepository->find($data['unidade']) : null;

        if ($this->db->inserir($this->table, $parametros)) {
            $this->material = new Material(
                $this->db->getLastInsertId(),
                $grupo,
                $subgrupo,
                $classe,
                $marca,
                $data['codigo'],
                $data['descricao'],
                $unidade,
                $data['valor']);
            return true;
        }
        return false;
    }

    public function update(Material $material): bool
    {
        try {
            $dados = [
                'id_materialGrupo' => $material->getGrupo()->getId(),
                'id_materialSubgrupo' => $material->getSubgrupo() ? $material->getSubgrupo()->getId() : null,
                'id_materialClasse' => $material->getClasse() ? $material->getClasse()->getId() : null,
                'id_marca' => $material->getMarca() ? $material->getMarca()->getId() : null,
                'cd_material' => $material->getCodigo(),
                'ds_material' => $material->getDescricao(),
                'id_unidade' => $material->getUnidade(),
                'vl_material' => $material->getValor()
            ];

            $condicao = ['id' => $material->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar material: " . $e->getMessage());
        }
    }

    public function delete(Material $material): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $material->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir material: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Material
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $parametros = ['id' => $id];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            return $this->generateObject($resultado[0]);
        } else {
            return null;
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    private function generateObject(array $materialReg): Material
    {
        $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
        $subGrupoMaterialRepository = new SubGrupoMaterialRepository($this->db);
        $classeMaterialRepository = new ClasseMaterialRepository($this->db);
        $marcaMaterialRepository = new MarcaMaterialRepository($this->db);
        $unidadeRepository = new UnidadeRepository($this->db);

        $grupo = (isset($materialReg['id_materialGrupo'])) ? $grupoMaterialRepository->find($materialReg['id_materialGrupo']) : null;
        $subgrupo = (isset($materialReg['id_materialSubgrupo'])) ? $subGrupoMaterialRepository->find($materialReg['id_materialSubgrupo']) : null;
        $classe = (isset($materialReg['id_materialClasse'])) ? $classeMaterialRepository->find($materialReg['id_materialClasse']) : null;
        $marca = (isset($materialReg['id_marca'])) ? $marcaMaterialRepository->find($materialReg['id_marca']) : null;
        $unidade = (isset($materialReg['id_unidade'])) ? $unidadeRepository->find($materialReg['id_unidade']) : null;

        return new Material(
            $materialReg['id'],
            $grupo,
            $subgrupo,
            $classe,
            $marca,
            $materialReg['cd_material'],
            $materialReg['ds_material'],
            $unidade,
            $materialReg['vl_material']
        );
    }

    private function generateObjectsList(array $materialList): array
    {
        $materiais = [];
        foreach ($materialList as $material) {
            $materiais[] = $this->generateObject($material);
        }
        return $materiais;
    }
}