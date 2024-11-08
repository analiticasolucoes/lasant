<?php

namespace App\Repositories;

use App\Models\I0SCO;
use App\Database\Database;

class I0SCORepository
{
    protected string $table = 'i0_sco';
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function find(int $id): ?I0SCO
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $resultado = $this->db->consultar($query, ['id' => $id]);

        if (count($resultado) == 1) {
            return $this->generateObject($resultado[0]);
        } else {
            return null;
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) > 0) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    private function generateObject(array $i0SCO): I0SCO
    {
        return new I0SCO(
            $i0SCO['id'],
            $i0SCO['cod_sco'],
            $i0SCO['mes_i0_sco'],
            $i0SCO['ano_i0_sco'],
            $i0SCO['valor_i0_sco']
        );
    }

    private function generateObjectsList(array $i0SCOList): array
    {
        $i0SCOArray = [];
        foreach ($i0SCOList as $i0SCO) {
            $i0SCOArray[] = $this->generateObject($i0SCO);
        }
        return $i0SCOArray;
    }
}