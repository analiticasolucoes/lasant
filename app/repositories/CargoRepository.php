<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Cargo;
use \Exception;

class CargoRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cargo';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um cargo específico após consulta
     * @var Cargo
     */
    private Cargo $cargo;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCargo(): Cargo
    {
        return $this->cargo;
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
            'ds_cargo' => $data['descricao'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $cargo = new Cargo($this->db->getLastInsertId(), $data['descricao']);
            $this->cargo = $cargo;
            return true;
        }
        return false;
    }

    public function update(Cargo $cargo): bool
    {
        try {
            $dados = [
                'ds_cargo' => $cargo->getDescricao(),
            ];

            $condicao = ['id' => $cargo->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar cargo: " . $e->getMessage());
        }
    }

    public function delete(Cargo $cargo): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $cargo->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir cargo: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Cargo
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
            throw new Exception("Nenhum cargo encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?Cargo
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

    private function generateObjectsList(array $cargosList): array
    {
        $cargos = [];
        foreach ($cargosList as $cargo) {
            $cargos[] = $this->generateObject($cargo);
        }
        return $cargos;
    }

    private function generateObject(array $cargoReg): Cargo
    {
        return new Cargo(
            $cargoReg['id'],
            $cargoReg['ds_cargo']
        );
    }
}