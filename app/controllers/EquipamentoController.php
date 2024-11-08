<?php

namespace App\Controllers;

use App\Database\Database;
use App\interfaces\ControllerInterface;
use App\Views\ViewController;

class EquipamentoController implements ControllerInterface
{

    //private EquipamentoRepository $equipamentoRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        //$this->equipamentoRepository = new EquipamentoRepository($conn);
        $this->view = new ViewController();
    }

    /**
     * @inheritDoc
     */
    public function index(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/equipamentos', []);
    }

    public function classes(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/cadastros/classes', []);
    }

    public function grupos(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/cadastros/grupos', []);
    }

    public function subgrupos(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/cadastros/subgrupos', []);
    }

    public function marcas(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/cadastros/marcas', []);
    }

    public function modelos(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/cadastros/modelos', []);
    }

    public function situacoes(array $args = []): void
    {
        $this->view->render('dashboard/equipamentos/cadastros/situacoes', []);
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