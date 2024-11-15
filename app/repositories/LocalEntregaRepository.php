<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente, LocalEntrega};
use \Exception;

class LocalEntregaRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cliente_Local_entrega';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var LocalEntrega
     */
    private LocalEntrega $localEntrega;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getLocalEntregaEntrega(): LocalEntrega
    {
        return $this->localEntrega;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateLocaisArray($result);
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
            'local' => $data['descricao-local-entrega'],
            'cep' => $data['cep-local-entrega'],
            'rua' => $data['logradouro-local-entrega'],
            'numero' => $data['numero-local-entrega'],
            'complemento_endereco' => $data['complemento-endereco-local-entrega'],
            'bairro' => $data['bairro-local-entrega'],
            'cidade' => $data['cidade-local-entrega'],
            'uf' => $data['uf-local-entrega'],
            'contato' => $data['contato-local-entrega'],
            'tel_contato' => $data['tel-contato-local-entrega']
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->localEntrega = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    public function update(LocalEntrega $localEntrega): bool
    {
        try {
            $dados = [
                'id' => $localEntrega->getId(),
                'id_cliente' => $localEntrega->getCliente()->getId(),
                'local' => $localEntrega->getDescricao(),
                'cep' => $localEntrega->getCep(),
                'rua' => $localEntrega->getLogradouro(),
                'numero' => $localEntrega->getNumero(),
                'complemento_endereco' => $localEntrega->getComplemento(),
                'bairro' => $localEntrega->getBairro(),
                'cidade' => $localEntrega->getCidade(),
                'uf' => $localEntrega->getUF(),
                'contato' => $localEntrega->getContato(),
                'tel_contato' => $localEntrega->getTelefone()
            ];

            $condicao = ['id' => $localEntrega->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar LocalEntrega: " . $e->getMessage());
        }
    }

    public function delete(LocalEntrega $localEntrega): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $localEntrega->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir LocalEntrega: " . $e->getMessage());
        }
    }

    public function find(int $id): LocalEntrega
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateLocalEntrega($resultado[0]);
            } else {
                return new LocalEntrega();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum Local de Entrega encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateLocaisArray($resultado);
        } else {
            return [];
        }
    }

    private function generateLocaisArray(array $locaisList): array
    {
        $locais = [];
        foreach ($locaisList as $localEntrega) {
            $locais[] = $this->generateLocalEntrega($localEntrega);
        }
        return $locais;
    }

    private function generateLocalEntrega(array $localEntregaReg): LocalEntrega
    {
        $localEntrega = new LocalEntrega();
        $this->setAttributes($localEntrega, $localEntregaReg);
        return $localEntrega;
    }

    private function setAttributes(LocalEntrega $localEntrega, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente(0, "", "");

        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $localEntrega->setId($data['id']);
        $localEntrega->setCliente($cliente);
        $localEntrega->setDescricao($data['local']);
        $localEntrega->setCep($data['cep']);
        $localEntrega->setLogradouro($data['rua']);
        $localEntrega->setBairro($data['bairro']);
        $localEntrega->setCidade($data['cidade']);
        $localEntrega->setUf($data['uf']);
        $localEntrega->setNumero($data['numero']);
        $localEntrega->setComplemento($data['complemento_endereco']);
        $localEntrega->setContato($data['contato']);
        $localEntrega->setTelefone($data['tel_contato']);
    }
}