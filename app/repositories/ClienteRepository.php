<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Cliente;
use App\Models\Esfera;
use \Exception;

class ClienteRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cliente_fornecedor';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um cliente específico após consulta
     * @var Cliente
     */
    private Cliente $cliente;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table WHERE tipo = 1 ORDER BY nome_empresa ASC";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateClientesArray($result);
        } else {
            return [];
        }
    }

    public function create(array $data): bool
    {
        $parametros = [
            'tipo' => $data['tipo'],
            'logomarca_clifor' => $data['logomarca_clifor'],
            'nome_empresa' => $data['nome-empresa'],
            'nome_fantasia' => $data['nome-fantasia'],
            'ds_cliente' => $data['descricao'],
            'id_esfera' => $data['esfera'],
            'cnpj' => $data['cnpj'],
            'email_engenharia' => $data['email_-engenharia'],
            'email_os_cc' => $data['email-os-cc'],
            'email_os_bcc' => $data['email-os-bcc'],
            'email_ss_cc' => $data['email-ss-cc'],
            'email_ss_bcc' => $data['email-ss-bcc'],
            'dt_inicio_contrato' => $data['data-inicio-contrato'],
            'rua' => $data['logradouro'],
            'numero' => $data['numero'],
            'complemento_endereco' => $data['complemento-endereco'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'uf' => $data['uf'],
            'cep' => $data['cep'],
            'inscricao_estadual' => $data['inscricao-estadual'],
            'inscricao_municipal' => $data['inscricao-municipal'],
            'telefone1' => $data['telefone1'],
            'telefone2' => $data['telefone2'],
            'telefone3' => $data['telefone3'],
            'telefone_celular' => $data['telefone-celular'],
            'clifor' => $data['clifor'],
            'modelo_os' => $data['modelo-os'],
            'celulares' => $data['celulares'],
            'email_compras' => $data['email-compras'],
            'zap' => $data['zap'],
            'sms_aprova' => $data['sms-aprova'],
            'cap' => $data['cap'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $cliente = new Cliente();
            $cliente->setId($this->db->getLastInsertId());
            $this->setAttributes($cliente, $data);
            $this->cliente = $cliente;
            return true;
        }
        return false;
    }

    public function update(Cliente $cliente): bool
    {
        try {
            $dados = [
                'tipo' => $cliente->getTipo(),
                'logomarca_clifor' => $cliente->getLogomarca(),
                'nome_empresa' => $cliente->getNomeEmpresa(),
                'nome_fantasia' => $cliente->getNomeFantasia(),
                'ds_cliente' => $cliente->getDescricao(),
                'id_esfera' => $cliente->getEsfera()->getId(),
                'cnpj' => $cliente->getCNPJ(),
                'email_engenharia' => $cliente->getEmailEngenharia(),
                'email_os_cc' => $cliente->getEmailOSCC(),
                'email_os_bcc' => $cliente->getEmailOSBCC(),
                'email_ss_cc' => $cliente->getEmailSSCC(),
                'email_ss_bcc' => $cliente->getEmailSSBCC(),
                'dt_inicontrato' => $cliente->getDtInicioContrato(),
                'rua' => $cliente->getLogradouro(),
                'numero' => $cliente->getNumero(),
                'complemento_endereco' => $cliente->getComplemento(),
                'bairro' => $cliente->getBairro(),
                'cidade' => $cliente->getCidade(),
                'uf' => $cliente->getUf(),
                'cep' => $cliente->getCep(),
                'inscricao_estadual' => $cliente->getInscricaoEstadual(),
                'inscricao_municipal' => $cliente->getInscricaoMunicipal(),
                'telefone1' => $cliente->getTelefone1(),
                'telefone2' => $cliente->getTelefone2(),
                'telefone3' => $cliente->getTelefone3(),
                'telefone_celular' => $cliente->getTelefoneCelular(),
                'clifor' => $cliente->getClifor(),
                'modelo_os' => $cliente->getModeloOS(),
                'celulares' => $cliente->getCelulares(),
                'email_compras' => $cliente->getEmailCompras(),
                'zap' => $cliente->getWhatsapp(),
                'sms_aprova' => $cliente->getSmsAprova(),
                'cap' => $cliente->getCap(),
            ];

            $condicao = ['id' => $cliente->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar cliente: " . $e->getMessage());
        }
    }

    public function delete(Cliente $cliente): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $cliente->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir cliente: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Cliente
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateCliente($resultado[0]);
            } else {
                return null;
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum cliente encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateClientesArray($resultado);
        } else {
            return [];
        }
    }

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateClientesArray(array $clientesList): array
    {
        $clientes = [];
        foreach ($clientesList as $cliente) {
            $clientes[] = $this->generateCliente($cliente);
        }
        return $clientes;
    }

    private function generateCliente(array $clienteReg): Cliente
    {
        $cliente = new Cliente();
        $this->setAttributes($cliente, $clienteReg);
        return $cliente;
    }

    private function setAttributes(Cliente $cliente, array $data): void
    {
        $esferaRepository = new EsferaRepository($this->db);
        $esfera = $esferaRepository->find($data['id_esfera']) ?? new Esfera(0, "", "");

        $cliente->setId($data['id']);
        $cliente->setTipo((int) $data['tipo']);
        $cliente->setLogomarca($data['logomarca_clifor']);
        $cliente->setNomeEmpresa($data['nome_empresa']);
        $cliente->setNomeFantasia($data['nome_fantasia']);
        $cliente->setDescricao($data['ds_cliente']);
        $cliente->setEsfera($esfera);
        $cliente->setCNPJ($data['cnpj']);
        $cliente->setEmailEngenharia($data['email_engenharia']);
        $cliente->setEmailOSCC($data['email_os_cc']);
        $cliente->setEmailOSBCC($data['email_os_bcc']);
        $cliente->setEmailSSCC($data['email_ss_cc']);
        $cliente->setEmailSSBCC($data['email_ss_bcc']);
        $cliente->setDtInicioContrato($data['dt_inicontrato']);
        $cliente->setLogradouro($data['rua']);
        $cliente->setNumero($data['numero']);
        $cliente->setComplemento($data['complemento_endereco']);
        $cliente->setBairro($data['bairro']);
        $cliente->setCidade($data['cidade']);
        $cliente->setUf($data['uf']);
        $cliente->setCep($data['cep']);
        $cliente->setInscricaoEstadual($data['inscricao_estadual']);
        $cliente->setInscricaoMunicipal($data['inscricao_municipal']);
        $cliente->setTelefone1($data['telefone1']);
        $cliente->setTelefone2($data['telefone2']);
        $cliente->setTelefone3($data['telefone3']);
        $cliente->setTelefoneCelular($data['telefone_celular']);
        $cliente->setClifor($data['clifor']);
        $cliente->setModeloOS($data['modelo_os']);
        $cliente->setCelulares($data['celulares']);
        $cliente->setEmailCompras($data['email_compras']);
        $cliente->setWhatsapp($data['zap']);
        $cliente->setSmsAprova($data['sms_aprova']);
        $cliente->setCap($data['cap']);
    }
}