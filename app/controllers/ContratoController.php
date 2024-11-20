<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\LocalRepository;
use App\Repositories\ContratoRepository;
use App\views\ViewController;

class ContratoController
{
    private ContratoRepository $contratoRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->contratoRepository = new ContratoRepository($conn);
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
        if($this->contratoRepository->create($args)) {
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
        $contrato = $this->contratoRepository->find($args["id-contrato-modal"]);

        $clienteId = $contrato->getCliente()->getId();

        $contrato->setNumero($args['numero-contrato-modal']);
        $contrato->setDescricao($args['descricao-contrato-modal']);
        $contrato->setDataInicio(new \DateTime($args['data-inicio-contrato-modal']));
        $contrato->setDataEncerramento(new \DateTime($args['data-encerramento-contrato-modal']));
        $contrato->setBdi($args['bdi-contrato-modal']);
        $contrato->setValorBase($args['valor-base-1-contrato-modal']);
        $contrato->setValorBase2($args['valor-base-2-contrato-modal']);
        $contrato->setValorBase3($args['valor-base-3-contrato-modal']);
        $contrato->setMesSco($args['mes-sco-contrato-modal']);
        $contrato->setAnoSco($args['ano-sco-contrato-modal']);

        if ($this->contratoRepository->update($contrato)) {
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
        $contrato = $this->contratoRepository->find($args["id"]);
        $clienteId = $contrato->getCliente()->getId();
        if($this->contratoRepository->delete($contrato)) {
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