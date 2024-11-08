<?php

namespace App\Controllers;

use App\Database\Database;
use App\interfaces\ControllerInterface;
use App\Views\ViewController;

class EstoqueController implements ControllerInterface
{
    private Database $conn;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
    }
    /**
     * @inheritDoc
     */
    public function index(array $args = []): void
    {
        $this->view->render("dashboard/estoques/estoques");
    }

    public function move(array $args = []): void
    {
        $this->view->render("dashboard/estoques/movimentar");
    }

    public function entradas(array $args = []): void
    {
        $this->view->render("dashboard/estoques/entradas/entradas");
    }

    public function newEntrada(array $args = []): void
    {
        $this->view->render("dashboard/estoques/entradas/novo");
    }

    /**
     * @inheritDoc
     */
    public function new(array $args = []): void
    {
        // TODO: Implement new() method.
    }

    /**
     * @inheritDoc
     */
    public function add(array $args = []): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    public function show(array $args = []): void
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function alter(array $args = []): void
    {
        // TODO: Implement alter() method.
    }

    /**
     * @inheritDoc
     */
    public function remove(array $args = []): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function search(array $args = []): void
    {
        // TODO: Implement search() method.
    }

    /**
     * @inheritDoc
     */
    public function list(array $args = []): void
    {
        // TODO: Implement list() method.
    }
}