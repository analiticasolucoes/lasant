<?php

namespace App\Controllers;

use App\Database\Database;
use App\Models\Compra;
use App\Repositories\ClienteRepository;
use App\Repositories\CompraRepository;
use App\Repositories\GrupoMaterialRepository;
use App\Repositories\LocalRepository;
use App\Repositories\PrioridadeCompraRepository;
use App\Views\ViewController;

class LevantamentoController
{
    private Database $conn;
    private ViewController $view;
    private GrupoMaterialRepository $grupoMaterialRepository;
    private PrioridadeCompraRepository $prioridadeCompraRepository;
    private CompraRepository $compraRepository;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
        $this->prioridadeCompraRepository = new PrioridadeCompraRepository($conn);
        $this->compraRepository = new CompraRepository($conn);
    }
    public function levantamentos(array $args = []): void
    {

    }

    public function new(): void
    {
        $clienteRepository = new ClienteRepository($this->conn);

        $clientes = [];

        foreach($_SESSION['usuario']['clientes'] as $idCliente) {
            $clientes[] = $clienteRepository->find($idCliente);
        }

        $grupos = $this->grupoMaterialRepository->all();
        $prioridades = $this->prioridadeCompraRepository->all();

        $this->view->render('dashboard/compras/levantamento/novo', [
            'gruposMaterial' => $grupos,
            'prioridades' => $prioridades,
            'clientes' => $clientes]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $args = []): void
    {
        $novaCompra = new Compra();

        $clienteRepository = new ClienteRepository($this->conn);
        $cliente = $clienteRepository->find($args['cliente']);

        $localRepository = new LocalRepository($this->conn);
        $local = $localRepository->find($args['local']);

        $grupo = $this->grupoMaterialRepository->find($args['grupo']);

        $prioridade = $this->prioridadeCompraRepository->find($args['prioridade']);

        $novaCompra->setIdOperador($_SESSION['usuario']['id']);
        $novaCompra->setCliente($cliente);
        $novaCompra->setLocal($local);
        $novaCompra->setGrupoMaterial($grupo);
        $novaCompra->setDtSolicitacao(new \DateTime('now'));
        $novaCompra->setPrioridade($prioridade);
        $novaCompra->setObservacoes($args['observacoes']);

        if($this->compraRepository->create($novaCompra)) {
            $this->new();
        } else
            $this->view->render("error");
    }

    public function list(): void
    {
        $this->view->render('dashboard/compras/levantamento/levantamentos');
    }
}