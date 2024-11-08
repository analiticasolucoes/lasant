<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\FeriadoRepository;
use App\Views\ViewController;

class FeriadoController
{
    private FeriadoRepository $feriadoRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->feriadoRepository = new FeriadoRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        $data = [
            'data' => $args['data'],
            'descricao' => $args['descricao']
        ];

        if ($this->feriadoRepository->create($data)) {
            header("Location: /cadastros-gerais/feriados");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $feriado = $this->feriadoRepository->find($args['id']);

        if (!$feriado) {
            // Tratamento de erro se o feriado não for encontrado
            header("Location: /erro");
            exit;
        }

        $feriado->setData(\DateTime::createFromFormat('d/m/Y', $args['data']));
        $feriado->setDescricao($args['descricao']);

        if ($this->feriadoRepository->update($feriado)) {
            header("Location: /cadastros-gerais/feriados");
        }
        exit;
    }

    public function delete(array $args): void
    {
        $feriado = $this->feriadoRepository->find($args['id']);

        if (!$feriado) {
            // Tratamento de erro se o feriado não for encontrado
            header("Location: /erro");
            exit;
        }

        if ($this->feriadoRepository->delete($feriado)) {
            header("Location: /cadastros-gerais/feriados");
        }
        exit;
    }
}