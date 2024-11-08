<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Banco, Cliente};
use \Exception;

class BancoRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_financeiro_fornecedor';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var Banco
     */
    private Banco $banco;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getbanco(): Banco
    {
        return $this->banco;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateBancosArray($result);
        } else {
            return [];
        }
    }

    public function create(array $data): bool
    {
        $parametros = [
            'id_cliente' => $data['cliente-id'],
            'banco' => $data['banco'],
            'agencia' => $data['agencia'],
            'conta' => $data['conta'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $banco = new Banco();
            $data['id'] = $this->db->getLastInsertId();
            $data['id_cliente'] = $data['cliente-id'];
            $this->setAttributes($banco, $data);
            $this->banco = $banco;
            return true;
        }
        return false;
    }

    public function update(Banco $banco): bool
    {
        try {
            $dados = [
                'id_cliente' => $banco->getCliente()->getId(),
                'banco' => $banco->getBanco(),
                'agencia' => $banco->getAgencia(),
                'conta' => $banco->getConta()
            ];

            $condicao = ['id' => $banco->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar banco: " . $e->getMessage());
        }
    }

    public function delete(Banco $banco): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $banco->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir banco: " . $e->getMessage());
        }
    }

    public function find(int $id): Banco
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateBanco($resultado[0]);
            } else {
                return new Banco();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum banco encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateBancosArray($resultado);
        } else {
            return [];
        }
    }

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateBancosArray(array $bancosList): array
    {
        $bancos = [];
        foreach ($bancosList as $banco) {
            $bancos[] = $this->generateBanco($banco);
        }
        return $bancos;
    }

    private function generateBanco(array $bancoReg): Banco
    {
        $banco = new Banco();
        $this->setAttributes($banco, $bancoReg);
        return $banco;
    }

    private function setAttributes(Banco $banco, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente(0, "", "");

        $banco->setId($data['id']);
        $banco->setCliente($cliente);
        $banco->setBanco($data['banco']);
        $banco->setAgencia($data['agencia']);
        $banco->setConta($data['conta']);
    }
}