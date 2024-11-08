<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\PrioridadeOS;
use Exception;

class PrioridadeOSRepository
{
    protected string $table = 'ta_prioridade_os';
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
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
            'ds_prioridade_os' => $data['descricao'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            return true;
        }
        return false;
    }

    public function update(PrioridadeOS $prioridadeOS): bool
    {
        try {
            $dados = [
                'ds_prioridade_os' => $prioridadeOS->getDescricao(),
            ];

            $condicao = ['id' => $prioridadeOS->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar a prioridade OS: " . $e->getMessage());
        }
    }

    public function delete(PrioridadeOS $prioridadeOS): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $prioridadeOS->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir a prioridade OS: " . $e->getMessage());
        }
    }

    public function find(int $id): ?PrioridadeOS
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateObject($resultado[0]);
            } else {
                return null;
            }
        } catch (Exception $e) {
            throw new Exception("Nenhuma prioridade OS encontrada com o ID fornecido.");
        }
    }

    private function generateObjectsList(array $prioridadesList): array
    {
        $prioridades = [];
        foreach ($prioridadesList as $prioridade) {
            $prioridades[] = $this->generateObject($prioridade);
        }
        return $prioridades;
    }

    private function generateObject(array $prioridadeReg): PrioridadeOS
    {
        return new PrioridadeOS(
            $prioridadeReg['id'],
            $prioridadeReg['ds_prioridade_os']
        );
    }
}