<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\ClienteRepository;
use App\Repositories\GrupoMaterialRepository;
use App\Repositories\PrioridadeCompraRepository;
use App\Views\ViewController;

class CompraController
{
    private Database $conn;
    private ViewController $view;
    private GrupoMaterialRepository $grupoMaterialRepository;
    private PrioridadeCompraRepository $prioridadeCompraRepository;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
        $this->prioridadeCompraRepository = new PrioridadeCompraRepository($conn);
    }
    public function compras(array $args = []): void
    {
        if($_SERVER['REQUEST_METHOD'] === "GET")
            $this->view->render('dashboard/compras');
        if($_SERVER['REQUEST_METHOD'] === "POST")
            $this->view->render('dashboard/compras/');
    }

    public function new(): void
    {
        $grupos = $this->grupoMaterialRepository->all();
        $prioridades = $this->prioridadeCompraRepository->all();
        $clienteRepository = new ClienteRepository($this->conn);
        $clientes = $clienteRepository->all();
        $this->view->render('dashboard/compras/novo', [
            'gruposMaterial' => $grupos,
            'prioridades' => $prioridades,
            'clientes' => $clientes]);
    }

    public function list(): void
    {
        $this->view->render('dashboard/compras/solicitacoes');
    }

    public function levantamento(): void
    {
        $this->view->render('dashboard/compras/levantamento/novo');
    }

    public function levantamentoList(): void
    {
        $this->view->render('dashboard/compras/levantamento/levantamentos');
    }
}