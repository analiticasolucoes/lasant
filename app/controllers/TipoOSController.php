<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\TipoOSRepository;
use App\Views\ViewController;

class TipoOSController
{
    private TipoOSRepository $tipoOSRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->tipoOSRepository = new TipoOSRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        $data = [
            'descricao' => $args['descricao'],
            'codigo' => $args['codigo']
        ];

        if ($this->tipoOSRepository->create($data)) {
            header("Location: /cadastros-gerais/tipos-os");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $tipoOS = $this->tipoOSRepository->find($args['id']);

        if (!$tipoOS) {
            // Tratamento de erro se o tipo OS não for encontrado
            header("Location: /erro");
            exit;
        }

        $tipoOS->setDescricao($args['descricao']);
        $tipoOS->setCodigo($args['codigo']);

        if ($this->tipoOSRepository->update($tipoOS)) {
            header("Location: /cadastros-gerais/tipos-os");
        }
        exit;
    }

    public function delete(array $args): void
    {
        $tipoOS = $this->tipoOSRepository->find($args['id']);

        if (!$tipoOS) {
            // Tratamento de erro se o tipo OS não for encontrado
            header("Location: /erro");
            exit;
        }

        if ($this->tipoOSRepository->delete($tipoOS)) {
            header("Location: /cadastros-gerais/tipos-os");
        }
        exit;
    }
}