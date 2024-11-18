<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\ClienteHasProfissionalRepository;
use App\views\ViewController;
use DateTime;

class ClienteHasProfissionalController
{
    private ClienteHasProfissionalRepository $clienteHasProfissionalRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->clienteHasProfissionalRepository = new ClienteHasProfissionalRepository($conn);
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
        if($this->clienteHasProfissionalRepository->create($args)) {
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
     * @throws \DateMalformedStringException
     */
    public function alter(array $args = []): void
    {
        $profissionalDoCliente = $this->clienteHasProfissionalRepository->find($args["id-profissional-modal"]);

        $clienteId = $profissionalDoCliente->getCliente()->getId();

        $profissionalDoCliente->setDataInicio(new DateTime($args['data-inicio-profissional-modal']));
        $profissionalDoCliente->setDataTermino(new DateTime($args['data-termino-profissional-modal']));
        $profissionalDoCliente->setStatus($args['status-profissional-modal']);

        if ($this->clienteHasProfissionalRepository->update($profissionalDoCliente)) {
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
        $profissionalDoCliente = $this->clienteHasProfissionalRepository->find($args["id"]);
        $clienteId = $profissionalDoCliente->getCliente()->getId();
        if($this->clienteHasProfissionalRepository->delete($profissionalDoCliente)) {
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