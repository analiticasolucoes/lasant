<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\EsferaRepository;
use App\Views\ViewController;

class EsferaController
{
    private EsferaRepository $esferaRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->esferaRepository = new EsferaRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        if ($this->esferaRepository->create($args))
            header("Location: /cadastros-gerais/esferas");
        exit;
    }

    public function alter(array $args): void
    {
        $esfera = $this->esferaRepository->find($args['id']);
        $esfera->setDescricao($args['descricao']);
        $esfera->setFormOS($args['form-os']);

        if ($this->esferaRepository->update($esfera)) {
            header("Location: /cadastros-gerais/esferas");
            exit;
        }
    }

    public function delete(array $args): void
    {
        $esfera = $this->esferaRepository->find($args['id']);
        if ($this->esferaRepository->delete($esfera)) {
            header("Location: /cadastros-gerais/esferas");
            exit;
        }
    }
}