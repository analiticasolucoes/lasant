<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Esfera;
use \Exception;

class EsferaRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_esfera';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de uma esfera específica após consulta
     * @var Esfera
     */
    private Esfera $esfera;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getEsfera(): Esfera
    {
        return $this->esfera;
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
            'ds_esfera' => $data['descricao'],
            'form_os' => $data['form-os'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $esfera = new Esfera(
                $this->db->getLastInsertId(),
                $data['descricao'],
                $data['form-os']
            );
            $this->esfera = $esfera;
            return true;
        }
        return false;
    }

    public function update(Esfera $esfera): bool
    {
        try {
            $dados = [
                'ds_esfera' => $esfera->getDescricao(),
                'form_os' => $esfera->getFormOS(),
            ];

            $condicao = ['id' => $esfera->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar esfera: " . $e->getMessage());
        }
    }

    public function delete(Esfera $esfera): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $esfera->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir esfera: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Esfera
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
            throw new Exception("Nenhuma esfera encontrada com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?Esfera
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

    private function generateObjectsList(array $esferasList): array
    {
        $esferas = [];
        foreach ($esferasList as $esfera) {
            $esferas[] = $this->generateObject($esfera);
        }
        return $esferas;
    }

    private function generateObject(array $esferaReg): Esfera
    {
        return new Esfera(
            $esferaReg['id'],
            $esferaReg['ds_esfera'],
            $esferaReg['form_os']
        );
    }
}