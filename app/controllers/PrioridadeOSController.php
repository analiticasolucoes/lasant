<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\PrioridadeOSRepository;
use App\Models\PrioridadeOS;
use App\Views\ViewController;

class PrioridadeOSController
{
    private PrioridadeOSRepository $prioridadeOSRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->prioridadeOSRepository = new PrioridadeOSRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        $data = [
            'descricao' => $args['descricao']
        ];

        if ($this->prioridadeOSRepository->create($data)) {
            header("Location: /cadastros-gerais/prioridades-os");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $prioridadeOS = $this->prioridadeOSRepository->find($args['id']);

        if (!$prioridadeOS) {
            header("Location: /erro");
            exit;
        }

        $prioridadeOS->setDescricao($args['descricao']);

        if ($this->prioridadeOSRepository->update($prioridadeOS)) {
            header("Location: /cadastros-gerais/prioridades-os");
        }
        exit;
    }

    public function delete(array $args): void
    {
        $prioridadeOS = $this->prioridadeOSRepository->find($args['id']);

        if (!$prioridadeOS) {
            header("Location: /erro");
            exit;
        }

        if ($this->prioridadeOSRepository->delete($prioridadeOS)) {
            header("Location: /cadastros-gerais/prioridades-os");
        }
        exit;
    }
}