<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\ModeloImpressao;
use \Exception;

class ModeloImpressaoRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_modelo_impressao_os';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um modelo de impressão específico após consulta
     * @var ModeloImpressao
     */
    private ModeloImpressao $modeloImpressao;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getModeloImpressao(): ModeloImpressao
    {
        return $this->modeloImpressao;
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
            'titulo' => $data['titulo'],
            'arquivo' => $data['arquivo'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $modeloImpressao = new ModeloImpressao($this->db->getLastInsertId(), $data['titulo'], $data['arquivo']);
            $this->modeloImpressao = $modeloImpressao;
            return true;
        }
        return false;
    }

    public function update(ModeloImpressao $modeloImpressao): bool
    {
        try {
            $dados = [
                'titulo' => $modeloImpressao->getTitulo(),
                'arquivo' => $modeloImpressao->getArquivo(),
            ];

            $condicao = ['id' => $modeloImpressao->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar modelo de impressão: " . $e->getMessage());
        }
    }

    public function delete(ModeloImpressao $modeloImpressao): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $modeloImpressao->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir modelo de impressão: " . $e->getMessage());
        }
    }

    public function find(int $id): ?ModeloImpressao
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
            throw new Exception("Nenhum modelo de impressão encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?ModeloImpressao
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

    private function generateObjectsList(array $modelosImpressaoList): array
    {
        $modelosImpressao = [];
        foreach ($modelosImpressaoList as $modeloImpressao) {
            $modelosImpressao[] = $this->generateObject($modeloImpressao);
        }
        return $modelosImpressao;
    }

    private function generateObject(array $modeloImpressaoReg): ModeloImpressao
    {
        return new ModeloImpressao(
            $modeloImpressaoReg['id'],
            $modeloImpressaoReg['titulo'],
            $modeloImpressaoReg['arquivo']
        );
    }
}