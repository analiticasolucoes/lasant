<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\SituacaoOS;
use Exception;

class SituacaoOSRepository
{
    protected string $table = 'ta_situacao_os';
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
            'ds_situacaoSS' => $data['descricao'],
            'cor' => $data['cor'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            return true;
        }
        return false;
    }

    public function update(SituacaoOS $situacaoOS): bool
    {
        try {
            $dados = [
                'ds_situacaoSS' => $situacaoOS->getDescricao(),
                'cor' => $situacaoOS->getCor(),
            ];

            $condicao = ['id' => $situacaoOS->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar a situação OS: " . $e->getMessage());
        }
    }

    public function delete(SituacaoOS $situacaoOS): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $situacaoOS->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir a situação OS: " . $e->getMessage());
        }
    }

    public function find(int $id): ?SituacaoOS
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
            throw new Exception("Nenhuma situação OS encontrada com o ID fornecido.");
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

    private function generateObject(array $situacaoReg): SituacaoOS
    {
        return new SituacaoOS(
            $situacaoReg['id'],
            $situacaoReg['ds_situacaoSS'],
            $situacaoReg['cor']
        );
    }
}