<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\SubGrupoMaterial;
use App\Models\GrupoMaterial;
use \Exception;

class SubGrupoMaterialRepository
{
    protected string $table = 'ta_material_subgrupo';
    private Database $db;
    private SubGrupoMaterial $subGrupoMaterial;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getSubGrupoMaterial(): SubGrupoMaterial
    {
        return $this->subGrupoMaterial;
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
            'id_grupo' => $data['grupo']->getId(),
            'codigo' => $data['codigo'],
            'subgrupo' => $data['descricao'] // Aqui ajustado para o novo atributo 'descricao'
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $subGrupoMaterial = new SubGrupoMaterial($this->db->getLastInsertId(), $data['grupo'], $data['codigo'], $data['descricao']);
            $this->subGrupoMaterial = $subGrupoMaterial;
            return true;
        }
        return false;
    }

    public function update(SubGrupoMaterial $subGrupoMaterial): bool
    {
        try {
            $dados = [
                'id_grupo' => $subGrupoMaterial->getGrupo()->getId(),
                'codigo' => $subGrupoMaterial->getCodigo(),
                'subgrupo' => $subGrupoMaterial->getDescricao() // Aqui ajustado para o novo atributo 'descricao'
            ];

            $condicao = ['id' => $subGrupoMaterial->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar subgrupo de material: " . $e->getMessage());
        }
    }

    public function delete(SubGrupoMaterial $subGrupoMaterial): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $subGrupoMaterial->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir subgrupo de material: " . $e->getMessage());
        }
    }

    public function find(int $id): ?SubGrupoMaterial
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $parametros = ['id' => $id];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
            $grupo = $grupoMaterialRepository->find($resultado[0]['id_grupo']);
            return $this->generateObject($resultado[0], $grupo);
        } else {
            return null;
        }
    }

    public function findBy(string $column, $value): array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) > 1) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    private function generateObjectsList(array $resultList): array
    {
        $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
        $subGrupos = [];
        foreach ($resultList as $result) {
            $grupo = $grupoMaterialRepository->find($result['id_grupo']);
            $subGrupos[] = $this->generateObject($result, $grupo);
        }
        return $subGrupos;
    }

    private function generateObject(array $registro, GrupoMaterial $grupo): SubGrupoMaterial
    {
        return new SubGrupoMaterial(
            $registro['id'],
            $grupo,
            $registro['codigo'],
            $registro['subgrupo']
        );
    }
}