<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{BancoRepository,
    ClienteRepository,
    EsferaRepository,
    LocalRepository,
    ModeloImpressaoRepository,
    ProfissionalRepository};
use App\Views\ViewController;

class ClienteController
{
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
        $profissionais = $profissionalRepository->actives();

        $cliente = $this->clienteRepository->find($args['id']);

        $bancoRepository = new BancoRepository($this->conn);
        $bancos = $bancoRepository->findBy("id_cliente", $args['id']);

        $localRepository = new LocalRepository($this->conn);
        $locais = $localRepository->findBy("id_cliente", $args['id']);

        $this->view->render('dashboard/clientes/detalhe', [
            'cliente' => $cliente,
            'esferas' => $esferas,
            'modelosImpressaoOS' => $modelosImpressaoOS,
            'bancos' => $bancos,
            'locais' => $locais,
            'profissionais' => $profissionais
        ]);
    }

    public function alter(array $args = []): void
    {

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
}