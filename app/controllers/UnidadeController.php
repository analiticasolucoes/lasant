<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\UnidadeRepository;
use App\Views\ViewController;

class UnidadeController
{
    private UnidadeRepository $unidadeRepository;

    public function __construct(Database $conn)
    {
        $this->unidadeRepository = new UnidadeRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->unidadeRepository->create($args)) {
            header("Location: /materiais/unidades");
            exit;
        }
    }

    public function alter(array $args): void
    {
        $unidade = $this->unidadeRepository->find($args["id"]);
        $unidade->setDescricao($args['descricao']);
        if ($this->unidadeRepository->update($unidade)) {
            header("Location: /materiais/unidades");
            exit;
        }
    }

    public function delete(array $args): void
    {
        $unidade = $this->unidadeRepository->find($args["id"]);
        if ($this->unidadeRepository->delete($unidade)) {
            header("Location: /materiais/unidades");
            exit;
        }
    }
}