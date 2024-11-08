<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\FormaPagamento;
use \Exception;

class FormaPagamentoRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'tb_formas_pagamento';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de uma forma de pagamento específica após consulta
     * @var FormaPagamento
     */
    private FormaPagamento $formaPagamento;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getFormaPagamento(): FormaPagamento
    {
        return $this->formaPagamento;
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
            'forma_de_pagamento' => $data['descricao'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $formaPagamento = new FormaPagamento($this->db->getLastInsertId(), $data['descricao']);
            $this->formaPagamento = $formaPagamento;
            return true;
        }
        return false;
    }

    public function update(FormaPagamento $formaPagamento): bool
    {
        try {
            $dados = [
                'forma_de_pagamento' => $formaPagamento->getDescricao(),
            ];

            $condicao = ['id' => $formaPagamento->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar forma de pagamento: " . $e->getMessage());
        }
    }

    public function delete(FormaPagamento $formaPagamento): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $formaPagamento->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir forma de pagamento: " . $e->getMessage());
        }
    }

    public function find(int $id): ?FormaPagamento
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
            throw new Exception("Nenhuma forma de pagamento encontrada com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?FormaPagamento
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

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateObjectsList(array $formasPagamentoList): array
    {
        $formasPagamento = [];
        foreach ($formasPagamentoList as $formaPagamento) {
            $formasPagamento[] = $this->generateObject($formaPagamento);
        }
        return $formasPagamento;
    }

    private function generateObject(array $formaPagamentoReg): FormaPagamento
    {
        return new FormaPagamento(
            $formaPagamentoReg['id'],
            $formaPagamentoReg['forma_de_pagamento']
        );
    }
}