<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\SituacaoSS;
use Exception;

class SituacaoSSRepository
{
    protected string $table = 'ta_situacao_ss';
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
            'ds_situacao' => $data['descricao'],
            'cor' => $data['cor'],
            'fg_pedido' => $data['fg_pedido'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            return true;
        }
        return false;
    }

    public function update(SituacaoSS $situacaoSS): bool
    {
        try {
            $dados = [
                'ds_situacao' => $situacaoSS->getDescricao(),
                'cor' => $situacaoSS->getCor(),
                'fg_pedido' => $situacaoSS->getFlagPedido(),
            ];

            $condicao = ['id' => $situacaoSS->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar a situação SS: " . $e->getMessage());
        }
    }

    public function delete(SituacaoSS $situacaoSS): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $situacaoSS->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir a situação SS: " . $e->getMessage());
        }
    }

    public function find(int $id): ?SituacaoSS
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
            throw new Exception("Nenhuma situação SS encontrada com o ID fornecido.");
        }
    }

    private function generateObjectsList(array $situacoesList): array
    {
        $situacoes = [];
        foreach ($situacoesList as $situacao) {
            $situacoes[] = $this->generateObject($situacao);
        }
        return $situacoes;
    }

    private function generateObject(array $situacaoReg): SituacaoSS
    {
        return new SituacaoSS(
            $situacaoReg['id'],
            $situacaoReg['ds_situacao'],
            $situacaoReg['cor'],
            $situacaoReg['fg_pedido']
        );
    }
}