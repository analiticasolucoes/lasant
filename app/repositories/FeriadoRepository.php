<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Feriado;
use \Exception;

class FeriadoRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_feriado';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um feriado específico após consulta
     * @var Feriado
     */
    private Feriado $feriado;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getFeriado(): Feriado
    {
        return $this->feriado;
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
            'dt_feriado' => $this->setDateToDB($data['data'])->format('Y-m-d'),
            'ds_feriado' => $data['descricao'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $feriado = new Feriado(
                $this->db->getLastInsertId(),
                $this->setDateToDB($data['data']),
                $data['descricao']
            );
            $this->feriado = $feriado;
            return true;
        }
        return false;
    }

    public function update(Feriado $feriado): bool
    {
        try {
            $dados = [
                'dt_feriado' => $feriado->getData()->format('Y-m-d'),
                'ds_feriado' => $feriado->getDescricao(),
            ];

            $condicao = ['id' => $feriado->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar feriado: " . $e->getMessage());
        }
    }

    public function delete(Feriado $feriado): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $feriado->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir feriado: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Feriado
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
            throw new Exception("Nenhum feriado encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?Feriado
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

    private function generateObjectsList(array $feriadosList): array
    {
        $feriados = [];
        foreach ($feriadosList as $feriado) {
            $feriados[] = $this->generateObject($feriado);
        }
        return $feriados;
    }

    private function generateObject(array $feriadoReg): Feriado
    {
        $data = $this->setDateFromDB($feriadoReg['dt_feriado']);
        return new Feriado(
            $feriadoReg['id'],
            $data,
            $feriadoReg['ds_feriado']
        );
    }

    private function setDateToDB(string $data): ?\DateTime
    {
        return \DateTime::createFromFormat('d/m/Y', $data) ?? null;
    }

    private function setDateFromDB(string $data): ?\DateTime
    {
        return \DateTime::createFromFormat('Y-m-d', $data) ?? null;
    }
}