<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\LocalEntregaRepository;
use App\views\ViewController;

class LocalEntregaController
{
    private LocalEntregaRepository $localEntregaRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->localEntregaRepository = new LocalEntregaRepository($conn);
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
        if($this->localEntregaRepository->create($args)) {
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
        $localEntrega = $this->localEntregaRepository->find($args["id-local-entrega-modal"]);
        $clienteId = $localEntrega->getCliente()->getId();

        $localEntrega->setDescricao($args['descricao-local-entrega-modal']);
        $localEntrega->setCep($args['cep-local-entrega-modal']);
        $localEntrega->setLogradouro($args['logradouro-local-entrega-modal']);
        $localEntrega->setNumero($args['numero-local-entrega-modal']);
        $localEntrega->setComplemento($args['complemento-endereco-local-entrega-modal']);
        $localEntrega->setBairro($args['bairro-local-entrega-modal']);
        $localEntrega->setCidade($args['cidade-local-entrega-modal']);
        $localEntrega->setUf($args['uf-local-entrega-modal']);
        $localEntrega->setContato($args['contato-local-entrega-modal']);
        $localEntrega->setTelefone($args['tel-contato-local-entrega-modal']);

        if ($this->localEntregaRepository->update($localEntrega)) {
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
        $localEntrega = $this->localEntregaRepository->find($args["id"]);
        $clienteId = $localEntrega->getCliente()->getId();
        if($this->localEntregaRepository->delete($localEntrega)) {
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