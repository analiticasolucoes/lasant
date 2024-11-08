<?php

namespace App\Repositories;

use App\Models\MaterialSCO;
use App\Database\Database;
use \Exception;

class MaterialSCORepository
{
    protected string $table = 'sco';
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
            'id_contrato' => $data['idContrato'],
            'cod_i0_sco' => $data['codI0SCO'],
            'id_sco' => $data['idSCO'],
            'cod_sco' => $data['codSCO'],
            'descricao_sco' => $data['descricaoSCO'],
            'unidade' => $data['unidade'],
            'tipo' => $data['tipo']
        ];

        return $this->db->inserir($this->table, $parametros);
    }

    public function updateValor(float $valor, array $args): bool
    {
        try {
            $dados = [
                'valor_i0_sco' => $valor
            ];

            $condicao = [
                "cod_sco" => $args['cod-sco'],
                "mes_i0_sco" => $args['mes'],
                "ano_i0_sco" => $args['ano'],
            ];
            return $this->db->atualizar('i0_sco', $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }

    public function find(int $id): ?MaterialSCO
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

    public function findByCodigo(string $codigo): ?array
    {
        $query = "SELECT * FROM $this->table WHERE cod_sco LIKE CONCAT('%', :codigo, '%')";
        $parametros = ["codigo" => $codigo];
        $resultado = $this->db->consultar($query, $parametros);
        if (count($resultado) > 0) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    public function findByDescricao(string $descricao): ?array
    {
        $query = "SELECT * FROM $this->table WHERE descricao_sco LIKE CONCAT('%', :descricao, '%') LIMIT 30";
        $parametros = ["descricao" => $descricao];
        $resultado = $this->db->consultar($query, $parametros);
        if (count($resultado) > 0) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }
    private function generateObjectsList(array $scoList): array
    {
        $materialSCOs = [];
        foreach ($scoList as $sco) {
            $materialSCOs[] = $this->generateObject($sco);
        }
        return $materialSCOs;
    }

    private function generateObject(array $sco): MaterialSCO
    {
        return new MaterialSCO(
            $sco['id'],
            $sco['id_contrato'],
            $sco['cod_i0_sco'],
            $sco['id_sco'],
            $sco['cod_sco'],
            $sco['descricao_sco'],
            $sco['unidade'],
            $sco['tipo'],
            (new I0SCORepository($this->db))->findBy("cod_sco", $sco['cod_sco'])
        );
    }
}