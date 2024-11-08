<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\BancoRepository;
use App\views\ViewController;

class BancoController
{
    private BancoRepository $caixinhaRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->bancoRepository = new BancoRepository($conn);
        $this->view = new ViewController();
    }

    /**
     * @inheritDoc
     */
    public function index(array $args = []): void
    {
        // TODO: Implement index() method.
    }

    /**
     * @inheritDoc
     */
    public function new(array $args = []): void
    {
        // TODO: Implement new() method.
    }

    /**
     * @inheritDoc
     */
    public function add(array $args = []): void
    {
        if($this->bancoRepository->create($args)) {
            header("Location: /clientes/detalhe?id={$args['cliente-id']}");
            exit;
        } else
            $this->view->render("error");
    }

    /**
     * @inheritDoc
     */
    public function show(array $args = []): void
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function alter(array $args = []): void
    {
        $banco = $this->bancoRepository->find($args["id"]);
        $clienteId = $banco->getCliente()->getId();

        $banco->setBanco($args['banco']);
        $banco->setAgencia($args['agencia']);
        $banco->setConta($args['conta']);

        if ($this->bancoRepository->update($banco)) {
            header("Location: /clientes/detalhe?id={$clienteId}");
            exit;
        } else
            $this->view->render("error");
    }

    /**
     * @inheritDoc
     */
    public function remove(array $args = []): void
    {
        $banco = $this->bancoRepository->find($args["id"]);
        $clienteId = $banco->getCliente()->getId();
        if($this->bancoRepository->delete($banco)) {
            header("Location: /clientes/detalhe?id={$clienteId}");
            exit;
        } else
            $this->view->render("error");
    }

    /**
     * @inheritDoc
     */
    public function search(array $args = []): void
    {
        // TODO: Implement search() method.
    }

    /**
     * @inheritDoc
     */
    public function list(array $args = []): void
    {

    }
}