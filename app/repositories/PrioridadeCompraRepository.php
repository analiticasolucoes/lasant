<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\PrioridadeCompra;
use Exception;

class PrioridadeCompraRepository
{
    protected string $table = 'tb_prioridade_compra';
    private Database $db;
    private PrioridadeCompra $prioridadeCompra;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getPrioridadeCompra(): PrioridadeCompra
    {
        return $this->prioridadeCompra;
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
            'prioridade' => $data['prioridade']
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $prioridadeCompra = new PrioridadeCompra();
            $prioridadeCompra->setId($this->db->getLastInsertId());
            $prioridadeCompra->setPrioridade($data['prioridade']);
            $this->prioridadeCompra = $prioridadeCompra;
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function update(PrioridadeCompra $prioridadeCompra): bool
    {
        try {
            $dados = [
                'prioridade' => $prioridadeCompra->getPrioridade()
            ];

            $condicao = ['id' => $prioridadeCompra->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar prioridade de compra: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function delete(PrioridadeCompra $prioridadeCompra): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $prioridadeCompra->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir prioridade de compra: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function find(int $id): ?PrioridadeCompra
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

    private function generateObject(array $prioridadeCompraReg): PrioridadeCompra
    {
        $prioridade =  new PrioridadeCompra();

        $prioridade->setId($prioridadeCompraReg['id']);
        $prioridade->setPrioridade($prioridadeCompraReg['prioridade']);

        return $prioridade;
    }

    private function generateObjectsList(array $prioridadeCompraList): array
    {
        $prioridades = [];
        foreach ($prioridadeCompraList as $prioridadeCompra) {
            $prioridades[] = $this->generateObject($prioridadeCompra);
        }
        return $prioridades;
    }
}