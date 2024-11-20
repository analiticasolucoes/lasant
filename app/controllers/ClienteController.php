<?php

namespace App\Controllers;

use App\Database\Database;
use App\Models\Esfera;
use App\Repositories\{BancoRepository,
    ClienteHasProfissionalRepository,
    ClienteRepository,
    ContratoRepository,
    EsferaRepository,
    I0SCORepository,
    LocalEntregaRepository,
    LocalRepository,
    MaterialSCORepository,
    ModeloImpressaoRepository,
    PavimentoRepository,
    ProfissionalRepository,
    SetorRepository};
use App\Views\ViewController;

class ClienteController
{
    const LOGOMARCA_FOLDER = DIRECTORY_SEPARATOR . "storage" . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "logomarcas" . DIRECTORY_SEPARATOR;
    private Database $conn;
    private ViewController $view;
    private ClienteRepository $clienteRepository;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
        $this->clienteRepository = new ClienteRepository($conn);
    }

    public function new(array $args = []): void
    {
        $esferaRepository = new EsferaRepository($this->conn);
        $esferas = $esferaRepository->all();

        $modeloOSRepository = new ModeloImpressaoRepository($this->conn);
        $modelosImpressaoOS = $modeloOSRepository->all();

        $this->view->render('dashboard/clientes/novo', [
            'esferas' => $esferas,
            'modelosImpressaoOS' => $modelosImpressaoOS
        ]);
    }

    public function add(array $args = []): void
    {
        if($this->clienteRepository->create($args))
            $this->show(['id' => $this->clienteRepository->getCliente()->getId()]);
    }

    public function show(array $args = []): void
    {
        $esferaRepository = new EsferaRepository($this->conn);
        $esferas = $esferaRepository->all();

        $modeloOSRepository = new ModeloImpressaoRepository($this->conn);
        $modelosImpressaoOS = $modeloOSRepository->all();

        $profissionalRepository = new ProfissionalRepository($this->conn);
        $profissionais = $profissionalRepository->all();

        $cliente = $this->clienteRepository->find($args['id']);

        $bancoRepository = new BancoRepository($this->conn);
        $bancos = $bancoRepository->findBy("id_cliente", $args['id']);

        $localRepository = new LocalRepository($this->conn);
        $locais = $localRepository->findBy("id_cliente", $args['id']);

        $localEntregaRepository = new LocalEntregaRepository($this->conn);
        $locaisEntrega = $localEntregaRepository->findBy("id_cliente", $args['id']);

        $pavimentoRepository = new PavimentoRepository($this->conn);
        $pavimentos = $pavimentoRepository->findBy("id_cliente", $args['id']);

        $setorRepository = new SetorRepository($this->conn);
        $setores = $setorRepository->findBy("id_cliente", $args['id']);

        $clienteHasProfissionalRepository = new ClienteHasProfissionalRepository($this->conn);
        $profissionaisDoCliente = $clienteHasProfissionalRepository->findBy("id_cliente", $args['id']);

        $i0SCORepository = new I0SCORepository($this->conn);
        $datasSCO = $i0SCORepository->datasList();

        $contratoRepository = new ContratoRepository($this->conn);
        $contratos = $contratoRepository->findBy("id_cliente", $args['id']);

        $this->view->render('dashboard/clientes/detalhe', [
            'cliente' => $cliente,
            'esferas' => $esferas,
            'modelosImpressaoOS' => $modelosImpressaoOS,
            'bancos' => $bancos,
            'locais' => $locais,
            "locaisEntrega" => $locaisEntrega,
            'profissionais' => $profissionais,
            'pavimentos' => $pavimentos,
            'setores' => $setores,
            'profissionaisDoCliente' => $profissionaisDoCliente,
            'datasSCO' => $datasSCO,
            'contratos' => $contratos,
        ]);
    }

    /**
     * @throws \Exception
     */
    public function alter(array $args = []): void
    {
        $cliente = $this->clienteRepository->find((int) $args['cliente-id']);

        $esferaRepository = new EsferaRepository($this->conn);
        $esfera = $esferaRepository->find((int) $args['esfera']) ?? new Esfera(0, "", "");

        $cliente->setTipo($args['tipo']);
        //echo"<pre>";var_dump($_FILES);echo"</pre>";die;
        if (!empty($_FILES) && $_FILES['logomarca']['error'] === 0) {
            $newFileName = $this->generateFileName($_FILES['logomarca']['name']);

            if (move_uploaded_file($_FILES['logomarca']['tmp_name'], ".." . $newFileName)) {
                $cliente->setLogomarca(basename($newFileName));
            } else {
                echo "<h1>Erro ao atualizar a imagem de logomarca!</h1>";
                die;
            }
        }

        $cliente->setNomeEmpresa($args['nome-empresa']);
        $cliente->setNomeFantasia($args['nome-fantasia']);
        $cliente->setDescricao($args['descricao']);

        $cliente->setEsfera($esfera);

        $cliente->setCNPJ($args['cnpj']);
        $cliente->setEmailEngenharia($args['email-engenharia']);
        $cliente->setEmailOSCC($args['email-os-cc']);
        $cliente->setEmailOSBCC($args['email-os-bcc']);
        $cliente->setEmailSSCC($args['email-ss-cc']);
        $cliente->setEmailSSBCC($args['email-ss-bcc']);
        $cliente->setDtInicioContrato($args['data-inicio-contrato']);
        $cliente->setLogradouro($args['logradouro']);
        $cliente->setNumero($args['numero']);
        $cliente->setComplemento($args['complemento-endereco']);
        $cliente->setBairro($args['bairro']);
        $cliente->setCidade($args['cidade']);
        $cliente->setUf($args['uf']);
        $cliente->setCep($args['cep']);
        $cliente->setInscricaoEstadual($args['inscricao-estadual']);
        $cliente->setInscricaoMunicipal($args['inscricao-municipal']);
        $cliente->setTelefone1($args['telefone1']);
        $cliente->setTelefone2($args['telefone2']);
        $cliente->setTelefone3($args['telefone3']);
        $cliente->setTelefoneCelular($args['telefone-celular']);
        //$cliente->setClifor($args['clifor']);
        $cliente->setModeloOS($args['modelo-os']);
        $cliente->setCelulares($args['celulares']);
        $cliente->setEmailCompras($args['email-compras']);
        $cliente->setWhatsapp($args['telefone-whatsapp']);
        //$cliente->setSmsAprova($args['sms-aprova']);
        //$cliente->setCap($args['cap']);

        if ($this->clienteRepository->update($cliente)) {
            header("Location: /clientes/detalhe?id={$cliente->getId()}");
            exit;
        } else
            $this->view->render("error");
    }

    public function remove(array $args = []): void
    {

    }

    public function search(array $args = []): void
    {

    }

    public function list(array $args = []): void
    {
        $esferaRepository = new EsferaRepository($this->conn);
        $esferas = $esferaRepository->all();

        $modeloOSRepository = new ModeloImpressaoRepository($this->conn);
        $modelosImpressaoOS = $modeloOSRepository->all();

        $clientes = $this->clienteRepository->all();

        $this->view->render('dashboard/clientes/clientes', [
            'clientes' => $clientes,
            'esferas' => $esferas,
            'modelosImpressaoOS' => $modelosImpressaoOS
        ]);
    }

    private function generateFileName(string $fileName): string
    {
        $temp = substr(md5(uniqid(time())), 0, 10);
        $array = explode('.', $fileName);
        $extensao = strtolower(end($array));
        $cod = self::LOGOMARCA_FOLDER . date('dmy') . '-' . $temp . '.' . $extensao;
        return self::LOGOMARCA_FOLDER . basename($cod);
    }
}