<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\SituacaoSSRepository;
use App\Views\ViewController;

class SituacaoSSController
{
    private SituacaoSSRepository $situacaoSSRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->situacaoSSRepository = new SituacaoSSRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        $data = [
            'descricao' => $args['descricao'],
            'cor' => $args['cor'],
            'fg_pedido' => $args['flag-pedido']
        ];

        if ($this->situacaoSSRepository->create($data)) {
            header("Location: /cadastros-gerais/situacoes-ss");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $situacaoSS = $this->situacaoSSRepository->find($args['id']);

        if (!$situacaoSS) {
            // Tratamento de erro se a situação SS não for encontrada
            header("Location: /erro");
            exit;
        }

        $situacaoSS->setDescricao($args['descricao']);
        $situacaoSS->setCor($args['cor']);
        $situacaoSS->setFlagPedido($args['flag-pedido']);

        if ($this->situacaoSSRepository->update($situacaoSS)) {
            header("Location: /cadastros-gerais/situacoes-ss");
        }
        exit;
    }

    public function delete(array $args): void
    {
        $situacaoSS = $this->situacaoSSRepository->find($args['id']);

        if (!$situacaoSS) {
            // Tratamento de erro se a situação SS não for encontrada
            header("Location: /erro");
            exit;
        }

        if ($this->situacaoSSRepository->delete($situacaoSS)) {
            header("Location: /cadastros-gerais/situacoes-ss");
        }
        exit;
    }
}
