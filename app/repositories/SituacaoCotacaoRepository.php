<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\SituacaoCotacao;
use \Exception;

class SituacaoCotacaoRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'tb_situacao_cotacao';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var SituacaoCotacao
     */
    private SituacaoCotacao $situacaoCotacao;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getSituacaoCotacao(): SituacaoCotacao
    {
        return $this->situacaoCotacao;
    }

    /**
     * @throws Exception
     */
    public function all(): array
    {
        $sql = "SELECT * FROM $this->table ORDER BY situacao";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateSituacaoCotacaoArray($result);
        } else {
            return [];
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function create(SituacaoCotacao $situacaoCotacao): bool
    {
        $parametros = [
            'situacao' => $situacaoCotacao->getSituacao(),
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->situacaoCotacao = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function update(SituacaoCotacao $situacaoCotacao): bool
    {
        try {
            $dados = [
                'situacao' => $situacaoCotacao->getSituacao()
            ];

            $condicao = ['id' => $situacaoCotacao->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Situacao de Cotacao: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function delete(SituacaoCotacao $situacaoCotacao): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $situacaoCotacao->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Situacao de Cotacao: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function find(int $id): SituacaoCotacao
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateSituacaoCotacao($resultado[0]);
            } else {
                return new SituacaoCotacao();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhuma SituacaoCotacao encontrado com o ID fornecido.");
        }
    }

    /**
     * @throws Exception
     */
    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateSituacaoCotacaoArray($resultado);
        } else {
            return [];
        }
    }

    private function generateSituacaoCotacaoArray(array $situacaoCotacaosList): array
    {
        $locais = [];
        foreach ($situacaoCotacaosList as $situacaoCotacao) {
            $locais[] = $this->generateSituacaoCotacao($situacaoCotacao);
        }
        return $locais;
    }

    private function generateSituacaoCotacao(array $situacaoCotacaoReg): SituacaoCotacao
    {
        $situacaoCotacao = new SituacaoCotacao();
        $this->setAttributes($situacaoCotacao, $situacaoCotacaoReg);
        return $situacaoCotacao;
    }

    private function setAttributes(SituacaoCotacao $situacaoCotacao, array $data): void
    {
        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $situacaoCotacao->setId($data['id']);
        $situacaoCotacao->setSituacao($data['situacao']);
    }
}