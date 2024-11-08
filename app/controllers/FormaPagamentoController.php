<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\FormaPagamentoRepository;

class FormaPagamentoController
{
    private FormaPagamentoRepository $formaPagamentoRepository;

    public function __construct(Database $conn)
    {
        $this->formaPagamentoRepository = new FormaPagamentoRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->formaPagamentoRepository->create($args)) {
            header("Location: /cadastros-gerais/formas-pagamento");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $formaPagamento = $this->formaPagamentoRepository->find($args["id"]);
        $formaPagamento->setDescricao($args['descricao']);

        if ($this->formaPagamentoRepository->update($formaPagamento)) {
            header("Location: /cadastros-gerais/formas-pagamento");
        }
    }

    public function delete(array $args): void
    {
        $formaPagamento = $this->formaPagamentoRepository->find($args["id"]);
        if ($this->formaPagamentoRepository->delete($formaPagamento)) {
            header("Location: /cadastros-gerais/formas-pagamento");
        }
    }
}