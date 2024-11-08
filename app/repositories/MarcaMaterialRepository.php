<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\MarcaMaterial;
use App\Models\GrupoMaterial;
use \Exception;

class MarcaMaterialRepository
{
    protected string $table = 'ta_material_marca';
    private Database $db;
    private MarcaMaterial $marcaMaterial;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getMarcaMaterial(): MarcaMaterial
    {
        return $this->marcaMaterial;
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
            'id_grupo' => $data['grupo'],
            'marca' => $data['descricao']
        ];

        $grupoRepository = new GrupoMaterialRepository($this->db);
        $grupo = $grupoRepository->find($data['grupo']);

        if ($this->db->inserir($this->table, $parametros)) {
            $marcaMaterial = new MarcaMaterial(
                $this->db->getLastInsertId(),
                $grupo,
                (string) $data['descricao']);
            $this->marcaMaterial = $marcaMaterial;
            return true;
        }
        return false;
    }

    public function update(MarcaMaterial $marcaMaterial): bool
    {
        try {
            $dados = [
                'id_grupo' => $marcaMaterial->getGrupo()->getId(),
                'marca' => $marcaMaterial->getDescricao()
            ];

            $condicao = ['id' => $marcaMaterial->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar marca de material: " . $e->getMessage());
        }
    }

    public function delete(MarcaMaterial $marcaMaterial): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $marcaMaterial->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir marca de material: " . $e->getMessage());
        }
    }

    public function find(int $id): ?MarcaMaterial
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

    private function generateObject(array $materialMarcaReg, GrupoMaterial $grupo): MarcaMaterial
    {
        return new MarcaMaterial(
            $materialMarcaReg['id'],
            $grupo,
            $materialMarcaReg['marca']
        );
    }

    private function generateObjectsList(array $materialMarcaList): array
    {
        $marcas = [];
        foreach ($materialMarcaList as $materialMarca) {
            $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
            $grupo = $grupoMaterialRepository->find($materialMarca['id_grupo']);
            $marcas[] = $this->generateObject($materialMarca, $grupo);
        }
        return $marcas;
    }
}