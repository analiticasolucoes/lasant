<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\SituacaoOSRepository;
use App\Views\ViewController;

class SituacaoOSController
{
    private SituacaoOSRepository $situacaoOSRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->situacaoOSRepository = new SituacaoOSRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        $data = [
            'descricao' => $args['descricao'],
            'cor' => $args['cor']
        ];

        if ($this->situacaoOSRepository->create($data)) {
            header("Location: /cadastros-gerais/situacoes-os");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $situacaoOS = $this->situacaoOSRepository->find($args['id']);

        if (!$situacaoOS) {
            // Tratamento de erro se a situação OS não for encontrada
            header("Location: /erro");
            exit;
        }

        $situacaoOS->setDescricao($args['descricao']);
        $situacaoOS->setCor($args['cor']);

        if ($this->situacaoOSRepository->update($situacaoOS)) {
            header("Location: /cadastros-gerais/situacoes-os");
        }
        exit;
    }

    public function delete(array $args): void
    {
        $situacaoOS = $this->situacaoOSRepository->find($args['id']);

        if (!$situacaoOS) {
            // Tratamento de erro se a situação OS não for encontrada
            header("Location: /erro");
            exit;
        }

        if ($this->situacaoOSRepository->delete($situacaoOS)) {
            header("Location: /cadastros-gerais/situacoes-os");
        }
        exit;
    }
}