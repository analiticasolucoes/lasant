<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\CargoRepository;
use App\Views\ViewController;

class CargoController
{
    private CargoRepository $cargoRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->cargoRepository = new CargoRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        if($this->cargoRepository->create($args))
            header("Location: /cadastros-gerais/cargos");
        exit;
    }

    public function alter(array $args): void
    {
        $cargo = $this->cargoRepository->find($args["id"]);
        $cargo->setDescricao($args['descricao']);
        if($this->cargoRepository->update($cargo))
            header("Location: /cadastros-gerais/cargos");
    }

    public function delete(array $args): void
    {
        $cargo = $this->cargoRepository->find($args["id"]);
        if($this->cargoRepository->delete($cargo))
            header("Location: /cadastros-gerais/cargos");
    }
}