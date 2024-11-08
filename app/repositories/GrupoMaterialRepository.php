<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\GrupoMaterial;
use App\services\Ordenator;
use \Exception;

class GrupoMaterialRepository
{
    protected string $table = 'ta_material_grupo';
    private Database $db;
    private GrupoMaterial $grupoMaterial;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getGrupoMaterial(): GrupoMaterial
    {
        return $this->grupoMaterial;
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
            'cd_materialGrupo' => $data['codigo'],
            'ds_materialGrupo' => $data['descricao'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $grupoMaterial = new GrupoMaterial($this->db->getLastInsertId(), $data['codigo'], $data['descricao']);
            $this->grupoMaterial = $grupoMaterial;
            return true;
        }
        return false;
    }

    public function update(GrupoMaterial $grupoMaterial): bool
    {
        try {
            $dados = [
                'cd_materialGrupo' => $grupoMaterial->getCodigo(),
                'ds_materialGrupo' => $grupoMaterial->getDescricao(),
            ];

            $condicao = ['id' => $grupoMaterial->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar grupo de material: " . $e->getMessage());
        }
    }

    public function delete(GrupoMaterial $grupoMaterial): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $grupoMaterial->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir grupo de material: " . $e->getMessage());
        }
    }

    public function find(int $id): ?GrupoMaterial
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

    public function findBy(string $column, $value): ?GrupoMaterial
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            return $this->generateObject($resultado[0]);
        } else {
            return null;
        }
    }

    private function generateObjectsList(array $resultList): array
    {
        $grupos = [];
        foreach ($resultList as $result) {
            $grupos[] = $this->generateObject($result);
        }
        return Ordenator::orderBy($grupos, "getDescricao", "asc");
    }

    private function generateObject(array $registro): GrupoMaterial
    {
        return new GrupoMaterial(
            $registro['id'],
            $registro['cd_materialGrupo'],
            $registro['ds_materialGrupo']
        );
    }
}