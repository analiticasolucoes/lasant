<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Unidade;
use \Exception;

class UnidadeRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_unidade';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de uma unidade específica após consulta
     * @var Unidade
     */
    private Unidade $unidade;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUnidade(): Unidade
    {
        return $this->unidade;
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
            'ds_unidade' => $data['descricao'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $unidade = new Unidade($this->db->getLastInsertId(), $data['descricao']);
            $this->unidade = $unidade;
            return true;
        }
        return false;
    }

    public function update(Unidade $unidade): bool
    {
        try {
            $dados = [
                'ds_unidade' => $unidade->getDescricao(),
            ];

            $condicao = ['id' => $unidade->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar unidade: " . $e->getMessage());
        }
    }

    public function delete(Unidade $unidade): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $unidade->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir unidade: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Unidade
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
            throw new Exception("Nenhuma unidade encontrada com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?Unidade
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

    private function generateObjectsList(array $unidadesList): array
    {
        $unidades = [];
        foreach ($unidadesList as $unidade) {
            $unidades[] = $this->generateObject($unidade);
        }
        return $unidades;
    }

    private function generateObject(array $unidadeReg): Unidade
    {
        return new Unidade(
            $unidadeReg['id'],
            $unidadeReg['ds_unidade']
        );
    }
}