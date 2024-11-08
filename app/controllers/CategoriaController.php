<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\CategoriaRepository;
use App\Views\ViewController;

class CategoriaController
{
    private CategoriaRepository $categoriaRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->categoriaRepository = new CategoriaRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        if($this->categoriaRepository->create($args))
            header("Location: /cadastros-gerais/categorias");
        exit;
    }

    public function alter(array $args): void
    {
        $categoria = $this->categoriaRepository->find($args["id"]);
        $categoria->setDescricao($args['descricao']);
        $categoria->setTipo((int) $args['tipo']);
        $categoria->setCodCategoria($args['codigo']);
        if($this->categoriaRepository->update($categoria))
            header("Location: /cadastros-gerais/categorias");
    }

    public function delete(array $args): void
    {
        $categoria = $this->categoriaRepository->find($args["id"]);
        if($this->categoriaRepository->delete($categoria))
            header("Location: /cadastros-gerais/categorias");
    }
}