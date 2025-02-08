<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente, Local};
use \Exception;

class LocalRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cliente_local';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var Local
     */
    private Local $local;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getLocal(): Local
    {
        return $this->local;
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
            'ds_clienteLocal' => $data['descricao-local'],
            'cep' => $data['cep-local'],
            'rua' => $data['logradouro-local'],
            'numero' => $data['numero-local'],
            'complemento_endereco' => $data['complemento-endereco-local'],
            'bairro' => $data['bairro-local'],
            'cidade' => $data['cidade-local'],
            'uf' => $data['uf-local'],
            'contato' => $data['contato-local'],
            'tel_contato' => $data['tel-contato-local'],
            'latitude' => $data['latitude-local'],
            'longitude' => $data['longitude-local'],
            'inclinacao' => "",
            'area_construida' => (float) $data['area-construida-local'],
            'area_total' => (float) $data['area-total-local'],
            'valor_local' => 0.0
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->local = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    public function update(Local $local): bool
    {
        try {
            $dados = [
                'id' => $local->getId(),
                'id_cliente' => $local->getCliente()->getId(),
                'ds_clienteLocal' => $local->getDescricao(),
                'cep' => $local->getCep(),
                'rua' => $local->getLogradouro(),
                'numero' => $local->getNumero(),
                'complemento_endereco' => $local->getComplemento(),
                'bairro' => $local->getBairro(),
                'cidade' => $local->getCidade(),
                'uf' => $local->getUF(),
                'contato' => $local->getContato(),
                'tel_contato' => $local->getTelefone(),
                'latitude' => $local->getLatitude(),
                'longitude' => $local->getLongitude(),
                'inclinacao' => $local->getInclinacao(),
                'area_construida' => $local->getAreaConstruida(),
                'area_total' => $local->getAreaTotal(),
                'valor_local' => $local->getValorLocal()
            ];

            $condicao = ['id' => $local->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar local: " . $e->getMessage());
        }
    }

    public function delete(Local $local): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $local->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir local: " . $e->getMessage());
        }
    }

    public function find(int $id): Local
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateLocal($resultado[0]);
            } else {
                return new Local();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum local encontrado com o ID fornecido.");
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
        foreach ($locaisList as $local) {
            $locais[] = $this->generateLocal($local);
        }
        return $locais;
    }

    private function generateLocal(array $localReg): Local
    {
        $local = new Local();
        $this->setAttributes($local, $localReg);
        return $local;
    }

    private function setAttributes(Local $local, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente();

        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $local->setId($data['id']);
        $local->setCliente($cliente);
        $local->setDescricao($data['ds_clienteLocal']);
        $local->setCep($data['cep']);
        $local->setLogradouro($data['rua']);
        $local->setBairro($data['bairro']);
        $local->setCidade($data['cidade']);
        $local->setUf($data['uf']);
        $local->setNumero($data['numero']);
        $local->setComplemento($data['complemento_endereco']);
        $local->setContato($data['contato']);
        $local->setTelefone($data['tel_contato']);
        $local->setLatitude($data['latitude']);
        $local->setLongitude($data['longitude']);
        $local->setInclinacao($data['inclinacao']);
        $local->setAreaConstruida((float) $data['area_construida']);
        $local->setAreaTotal((float) $data['area_total']);
        $local->setValorLocal((float) $data['valor_local']);
        $local->setCliente($cliente);
    }
}