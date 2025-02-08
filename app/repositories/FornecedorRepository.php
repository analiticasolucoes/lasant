<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Esfera, Fornecedor};
use \Exception;

class FornecedorRepository
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
     * Objeto acessório para recuperação de um Fornecedor específico após consulta
     * @var Fornecedor
     */
    private Fornecedor $fornecedor;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getFornecedor(): Fornecedor
    {
        return $this->fornecedor;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table WHERE tipo = 2 ORDER BY nome_empresa ASC";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateFornecedoresArray($result);
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
            $fornecedor = new Fornecedor();
            $fornecedor->setId($this->db->getLastInsertId());
            $this->setAttributes($fornecedor, $data);
            $this->fornecedor = $fornecedor;
            return true;
        }
        return false;
    }

    public function update(Fornecedor $fornecedor): bool
    {
        try {
            $dados = [
                'tipo' => $fornecedor->getTipo(),
                'logomarca_clifor' => $fornecedor->getLogomarca(),
                'nome_empresa' => $fornecedor->getNomeEmpresa(),
                'nome_fantasia' => $fornecedor->getNomeFantasia(),
                'ds_cliente' => $fornecedor->getDescricao(),
                'id_esfera' => $fornecedor->getEsfera()->getId(),
                'cnpj' => $fornecedor->getCNPJ(),
                'email_engenharia' => $fornecedor->getEmailEngenharia(),
                'email_os_cc' => $fornecedor->getEmailOSCC(),
                'email_os_bcc' => $fornecedor->getEmailOSBCC(),
                'email_ss_cc' => $fornecedor->getEmailSSCC(),
                'email_ss_bcc' => $fornecedor->getEmailSSBCC(),
                'dt_inicontrato' => $fornecedor->getDtInicioContrato(),
                'rua' => $fornecedor->getLogradouro(),
                'numero' => $fornecedor->getNumero(),
                'complemento_endereco' => $fornecedor->getComplemento(),
                'bairro' => $fornecedor->getBairro(),
                'cidade' => $fornecedor->getCidade(),
                'uf' => $fornecedor->getUf(),
                'cep' => $fornecedor->getCep(),
                'inscricao_estadual' => $fornecedor->getInscricaoEstadual(),
                'inscricao_municipal' => $fornecedor->getInscricaoMunicipal(),
                'telefone1' => $fornecedor->getTelefone1(),
                'telefone2' => $fornecedor->getTelefone2(),
                'telefone3' => $fornecedor->getTelefone3(),
                'telefone_celular' => $fornecedor->getTelefoneCelular(),
                'clifor' => $fornecedor->getClifor(),
                'modelo_os' => $fornecedor->getModeloOS(),
                'celulares' => $fornecedor->getCelulares(),
                'email_compras' => $fornecedor->getEmailCompras(),
                'zap' => $fornecedor->getWhatsapp(),
                'sms_aprova' => $fornecedor->getSmsAprova(),
                'cap' => $fornecedor->getCap(),
            ];

            $condicao = ['id' => $fornecedor->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Fornecedor: " . $e->getMessage());
        }
    }

    public function delete(Fornecedor $fornecedor): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $fornecedor->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Fornecedor: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Fornecedor
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateFornecedor($resultado[0]);
            } else {
                return null;
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum Fornecedor encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column} ORDER BY nome_empresa";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateFornecedoresArray($resultado);
        } else {
            return [];
        }
    }

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateFornecedoresArray(array $fornecedorsList): array
    {
        $fornecedors = [];
        foreach ($fornecedorsList as $fornecedor) {
            $fornecedors[] = $this->generateFornecedor($fornecedor);
        }
        return $fornecedors;
    }

    private function generateFornecedor(array $fornecedorReg): Fornecedor
    {
        $fornecedor = new Fornecedor();
        $this->setAttributes($fornecedor, $fornecedorReg);
        return $fornecedor;
    }

    private function setAttributes(Fornecedor $fornecedor, array $data): void
    {
        $esferaRepository = new EsferaRepository($this->db);
        $esfera = $esferaRepository->find($data['id_esfera']) ?? new Esfera(0, "", "");

        $fornecedor->setId($data['id']);
        $fornecedor->setTipo($data['tipo']);
        $fornecedor->setLogomarca($data['logomarca_clifor']);
        $fornecedor->setNomeEmpresa($data['nome_empresa']);
        $fornecedor->setNomeFantasia($data['nome_fantasia']);
        $fornecedor->setDescricao($data['ds_cliente']);
        $fornecedor->setEsfera($esfera);
        $fornecedor->setCNPJ($data['cnpj']);
        $fornecedor->setEmailEngenharia($data['email_engenharia']);
        $fornecedor->setEmailOSCC($data['email_os_cc']);
        $fornecedor->setEmailOSBCC($data['email_os_bcc']);
        $fornecedor->setEmailSSCC($data['email_ss_cc']);
        $fornecedor->setEmailSSBCC($data['email_ss_bcc']);
        $fornecedor->setDtInicioContrato($data['dt_inicontrato']);
        $fornecedor->setLogradouro($data['rua']);
        $fornecedor->setNumero($data['numero']);
        $fornecedor->setComplemento($data['complemento_endereco']);
        $fornecedor->setBairro($data['bairro']);
        $fornecedor->setCidade($data['cidade']);
        $fornecedor->setUf($data['uf']);
        $fornecedor->setCep($data['cep']);
        $fornecedor->setInscricaoEstadual($data['inscricao_estadual']);
        $fornecedor->setInscricaoMunicipal($data['inscricao_municipal']);
        $fornecedor->setTelefone1($data['telefone1']);
        $fornecedor->setTelefone2($data['telefone2']);
        $fornecedor->setTelefone3($data['telefone3']);
        $fornecedor->setTelefoneCelular($data['telefone_celular']);
        $fornecedor->setClifor($data['clifor']);
        $fornecedor->setModeloOS($data['modelo_os']);
        $fornecedor->setCelulares($data['celulares']);
        $fornecedor->setEmailCompras($data['email_compras']);
        $fornecedor->setWhatsapp($data['zap']);
        $fornecedor->setSmsAprova($data['sms_aprova']);
        $fornecedor->setCap($data['cap']);
    }
}