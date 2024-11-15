<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\pavimentoRepository;
use App\Repositories\setorRepository;
use App\views\ViewController;

class SetorController
{
    private SetorRepository $setorRepository;
    private pavimentoRepository $pavimentoRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->setorRepository = new SetorRepository($conn);
        $this->pavimentoRepository = new pavimentoRepository($conn);
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
        if($this->setorRepository->create($args)) {
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
        $setor = $this->setorRepository->find($args["id-setor-modal"]);
        $pavimento = $this->pavimentoRepository->find($args["pavimento-setor-modal"]);

        $clienteId = $setor->getCliente()->getId();

        $setor->setPavimento($pavimento);
        $setor->setDescricao($args['descricao-setor-modal']);
        $setor->setOcupantesFixos($args['ocupantes-fixos-setor-modal']);
        $setor->setOcupantesFlutuantes($args['ocupantes-flutuantes-setor-modal']);
        $setor->setLargura($args['largura-setor-modal']);
        $setor->setComprimento($args['comprimento-setor-modal']);
        $setor->setAltura($args['altura-setor-modal']);

        if ($this->setorRepository->update($setor)) {
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
        $setor = $this->setorRepository->find($args["id"]);
        $clienteId = $setor->getCliente()->getId();
        if($this->setorRepository->delete($setor)) {
            header("Location: /clientes/detalhe?id={$clienteId}");
            exit;
        } else
            $this->view->render("error");
    }

    public function active(array $args = []): void
    {
        $this->updateStatus($args, true);
    }

    public function disable(array $args = []): void
    {
        $this->updateStatus($args, false);
    }

    private function updateStatus(array $args, bool $condition): void
    {
        $setor = $this->setorRepository->find($args["id"]);

        $setor->setStatus($condition);

        if ($this->setorRepository->update($setor)) {
            header("Location: /clientes/detalhe?id={$setor->getCliente()->getId()}");
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