<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\LocalRepository;
use App\Repositories\PavimentoRepository;
use App\views\ViewController;

class PavimentoController
{
    private PavimentoRepository $pavimentoRepository;
    private LocalRepository $localRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->pavimentoRepository = new PavimentoRepository($conn);
        $this->localRepository = new LocalRepository($conn);
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
        if($this->pavimentoRepository->create($args)) {
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
        $pavimento = $this->pavimentoRepository->find($args["id-pavimento-modal"]);
        $local = $this->localRepository->find($args["local-pavimento-modal"]);

        $clienteId = $pavimento->getCliente()->getId();

        $pavimento->setLocal($local);
        $pavimento->setDescricao($args['descricao-pavimento-modal']);

        if ($this->pavimentoRepository->update($pavimento)) {
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
        $pavimento = $this->pavimentoRepository->find($args["id"]);
        $clienteId = $pavimento->getCliente()->getId();
        if($this->pavimentoRepository->delete($pavimento)) {
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
        $pavimento = $this->pavimentoRepository->find($args["id"]);

        $pavimento->setStatus($condition);

        if ($this->pavimentoRepository->update($pavimento)) {
            header("Location: /clientes/detalhe?id={$pavimento->getCliente()->getId()}");
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