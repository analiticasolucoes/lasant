<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{ClasseMaterial, GrupoMaterial, SubGrupoMaterial};
use \Exception;

class ClasseMaterialRepository
{
    protected string $table = 'ta_material_classe';
    private Database $db;
    private ClasseMaterial $classeMaterial;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getClasseMaterial(): ClasseMaterial
    {
        return $this->classeMaterial;
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
            'id_subgrupo' => $data['subgrupo'],
            'codigo' => $data['codigo'],
            'classe' => $data['descricao']
        ];

        $grupoRepository = new GrupoMaterialRepository($this->db);
        $subgrupoRepository = new SubGrupoMaterialRepository($this->db);

        $grupo = $grupoRepository->find($data['grupo']);
        $subgrupo = $subgrupoRepository->find($data['subgrupo']);

        if ($this->db->inserir($this->table, $parametros)) {
            $classeMaterial = new ClasseMaterial(
                $this->db->getLastInsertId(),
                $grupo,
                $subgrupo,
                $grupo->getCodigo() . $subgrupo->getCodigo() . $data['codigo'],
                (string) $data['descricao']);
            $this->classeMaterial = $classeMaterial;
            return true;
        }
        return false;
    }

    public function update(ClasseMaterial $classeMaterial): bool
    {
        try {
            $dados = [
                'id_grupo' => $classeMaterial->getGrupo()->getId(),
                'id_subgrupo' => $classeMaterial->getSubgrupo()->getId(),
                'codigo' => $classeMaterial->getCodigo(),
                'classe' => $classeMaterial->getDescricao()
            ];

            $condicao = ['id' => $classeMaterial->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar classe de material: " . $e->getMessage());
        }
    }

    public function delete(ClasseMaterial $classeMaterial): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $classeMaterial->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir classe de material: " . $e->getMessage());
        }
    }

    public function find(int $id): ?ClasseMaterial
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $parametros = ['id' => $id];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
            $subGrupoMaterialRepository = new SubGrupoMaterialRepository($this->db);
            $grupo = $grupoMaterialRepository->find($resultado[0]['id_grupo']);
            $subgrupo = $subGrupoMaterialRepository->find($resultado[0]['id_subgrupo']);
            return $this->generateObject($resultado[0], $grupo, $subgrupo);
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

    private function generateObject(array $materialClasseReg, GrupoMaterial $grupo, SubGrupoMaterial $subgrupo): ClasseMaterial
    {
        return new ClasseMaterial(
            $materialClasseReg['id'],
            $grupo,
            $subgrupo,
            $materialClasseReg['codigo'],
            (string) $materialClasseReg['classe']
        );
    }

    private function generateObjectsList(array $materialClasseList): array
    {
        $classes = [];
        foreach ($materialClasseList as $materialClasse) {
            $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
            $subGrupoMaterialRepository = new SubGrupoMaterialRepository($this->db);
            $grupo = $grupoMaterialRepository->find($materialClasse['id_grupo']);
            $subgrupo = $subGrupoMaterialRepository->find($materialClasse['id_subgrupo']);
            $classes[] = $this->generateObject($materialClasse, $grupo, $subgrupo);
        }
        return $classes;
    }
}