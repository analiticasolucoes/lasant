<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\TipoOS;
use Exception;

class TipoOSRepository
{
    protected string $table = 'ta_tipo_os';
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
            'ta_tipo_os' => $data['descricao'],
            'cod_os' => $data['codigo'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            return true;
        }
        return false;
    }

    public function update(TipoOS $tipoOS): bool
    {
        try {
            $dados = [
                'ta_tipo_os' => $tipoOS->getDescricao(),
                'cod_os' => $tipoOS->getCodigo(),
            ];

            $condicao = ['id' => $tipoOS->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar tipo OS: " . $e->getMessage());
        }
    }

    public function delete(TipoOS $tipoOS): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $tipoOS->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir tipo OS: " . $e->getMessage());
        }
    }

    public function find(int $id): ?TipoOS
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
            throw new Exception("Nenhum tipo de OS encontrado com o ID fornecido.");
        }
    }

    private function generateObjectsList(array $tiposOSList): array
    {
        $tiposOS = [];
        foreach ($tiposOSList as $tipoOS) {
            $tiposOS[] = $this->generateObject($tipoOS);
        }
        return $tiposOS;
    }

    private function generateObject(array $tipoOSReg): TipoOS
    {
        return new TipoOS(
            $tipoOSReg['id'],
            $tipoOSReg['ta_tipo_os'],
            $tipoOSReg['cod_os']
        );
    }
}