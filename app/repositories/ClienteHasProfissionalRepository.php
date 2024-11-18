<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente, ClienteHasProfissional, Profissional};
use \DateTime;
use \Exception;

class ClienteHasProfissionalRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cliente_profissional';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var ClienteHasProfissional
     */
    private ClienteHasProfissional $profissionalDoCLiente;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getPavimento(): ClienteHasProfissional
    {
        return $this->profissionalDoCLiente;
    }

    /**
     * @throws \DateMalformedStringException
     * @throws Exception
     */
    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateProfissionaisDoClienteArray($result);
        } else {
            return [];
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function create(array $data): bool
    {
        $parametros = [
            'id_cliente' => $data['cliente-id'],
            'id_profissional' => $data['id-profissional'],
            'dt_inicio' => $data['data-inicio-profissional'],
            'dt_termino' => $data['data-termino-profissional'],
            'status' => 'Ativo'
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->profissionalDoCLiente = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function update(ClienteHasProfissional $profissionalDoCliente): bool
    {
        $status = $profissionalDoCliente->isStatus() ? "Ativo" : "Inativo";
        try {
            $dados = [
                'id_cliente' => $profissionalDoCliente->getCliente()->getId(),
                'id_profissional' => $profissionalDoCliente->getProfissional()->getId(),
                'dt_inicio' => $profissionalDoCliente->getDataInicio()->format('Y-m-d'),
                'dt_termino' => $profissionalDoCliente->getDataTermino()->format('Y-m-d'),
                'status' => $status
            ];

            $condicao = ['id' => $profissionalDoCliente->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Profissional do Cliente: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function delete(ClienteHasProfissional $profissionalDoCliente): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $profissionalDoCliente->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Profissional do Cliente: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function find(int $id): ClienteHasProfissional
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateProfissionalDoCliente($resultado[0]);
            } else {
                return new ClienteHasProfissional();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum Profissional do Cliente encontrado com o ID fornecido.");
        }
    }

    /**
     * @throws \DateMalformedStringException
     * @throws Exception
     */
    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateProfissionaisDoClienteArray($resultado);
        } else {
            return [];
        }
    }

    /**
     * @throws \DateMalformedStringException
     */
    private function generateProfissionaisDoClienteArray(array $profissionaisDoClienteList): array
    {
        $profissionaisDoCliente = [];
        foreach ($profissionaisDoClienteList as $profissionalDoCliente) {
            $profissionaisDoCliente[] = $this->generateProfissionalDoCliente($profissionalDoCliente);
        }
        return $profissionaisDoCliente;
    }

    /**
     * @throws \DateMalformedStringException
     */
    private function generateProfissionalDoCliente(array $profissionalDoClienteReg): ClienteHasProfissional
    {
        $profissionalDoCLiente = new ClienteHasProfissional();
        $this->setAttributes($profissionalDoCLiente, $profissionalDoClienteReg);
        return $profissionalDoCLiente;
    }

    /**
     * @throws \DateMalformedStringException
     */
    private function setAttributes(ClienteHasProfissional $profissionalDoCLiente, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente(0, "", "");

        $profissionalRepository = new ProfissionalRepository($this->db);
        $profissional = $profissionalRepository->find($data['id_profissional']) ?? new Profissional();

        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $status = $data['status'] === "Ativo" ? 1 : 0;

        $profissionalDoCLiente->setId($data['id']);
        $profissionalDoCLiente->setCliente($cliente);
        $profissionalDoCLiente->setProfissional($profissional);
        $profissionalDoCLiente->setDataInicio(new DateTime($data['dt_inicio']));
        $profissionalDoCLiente->setDataTermino(new DateTime($data['dt_termino']));
        $profissionalDoCLiente->setStatus((bool) $status);
    }
}