<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente, Local, Pavimento};
use \Exception;

class PavimentoRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cliente_pavimento';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var Pavimento
     */
    private Pavimento $pavimento;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getPavimento(): Pavimento
    {
        return $this->pavimento;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generatePavimentosArray($result);
        } else {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): bool
    {
        $parametros = [
            'id_cliente' => $data['cliente-id'],
            'ds_clientePavimento' => $data['descricao-pavimento'],
            'id_clienteLocal' => $data['cliente-local-pavimento'],
            'status' => true
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->pavimento = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    public function update(Pavimento $pavimento): bool
    {
        try {
            $dados = [
                'id_cliente' => $pavimento->getCliente()->getId(),
                'ds_clientePavimento' => $pavimento->getDescricao(),
                'id_clienteLocal' => $pavimento->getLocal()->getId(),
                'status' => (int) $pavimento->isStatus()
            ];

            $condicao = ['id' => $pavimento->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Pavimento: " . $e->getMessage());
        }
    }

    public function delete(Pavimento $pavimento): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $pavimento->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Pavimento: " . $e->getMessage());
        }
    }

    public function find(int $id): Pavimento
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generatePavimento($resultado[0]);
            } else {
                return new Pavimento();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum Pavimento encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column} ORDER BY ds_clientePavimento";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generatePavimentosArray($resultado);
        } else {
            return [];
        }
    }

    private function generatePavimentosArray(array $pavimentosList): array
    {
        $locais = [];
        foreach ($pavimentosList as $pavimento) {
            $locais[] = $this->generatePavimento($pavimento);
        }
        return $locais;
    }

    private function generatePavimento(array $pavimentoReg): Pavimento
    {
        $pavimento = new Pavimento();
        $this->setAttributes($pavimento, $pavimentoReg);
        return $pavimento;
    }

    private function setAttributes(Pavimento $pavimento, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente(0, "", "");

        $localRepository = new LocalRepository($this->db);
        $local = $localRepository->find($data['id_clienteLocal']) ?? new Local();

        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $pavimento->setId($data['id']);
        $pavimento->setCliente($cliente);
        $pavimento->setLocal($local);
        $pavimento->setDescricao($data['ds_clientePavimento']);
        $pavimento->setStatus($data['status']);
    }
}