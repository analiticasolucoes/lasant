<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\CaixinhaRepository;
use App\Views\ViewController;

class CaixinhaController
{
    private CaixinhaRepository $caixinhaRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        //$this->caixinhaRepository = new CaixinhaRepository($conn);
        $this->view = new ViewController();
    }

    public function index(array $args = []): void
    {
        $this->view->render('dashboard/caixinhas/caixinhas');
    }

    public function new(array $args = []): void
    {
        //if ($this->caixinhaRepository->create($args))
            $this->view->render('dashboard/caixinhas/novo');
    }

    public function alter(array $args = []): void
    {
        $caixinha = $this->caixinhaRepository->find($args["id"]);
        $caixinha->setDescricao($args['descricao']);
        if ($this->caixinhaRepository->update($caixinha))
            $this->view->render('dashboard/caixinhas/caixinhas');
    }

    public function delete(array $args = []): void
    {
        $caixinha = $this->caixinhaRepository->find($args["id"]);
        if ($this->caixinhaRepository->delete($caixinha))
            $this->view->render('dashboard/caixinhas/caixinhas');
    }

    public function show(array $args = []): void
    {
        // Busca a caixinha pelo ID
        //$caixinha = $this->caixinhaRepository->find($args['id']);

        // Verifica se a caixinha foi encontrada
        /*if (!$caixinha) {
            // Redireciona ou exibe uma mensagem de erro, se necessário
            header("Location: /caixinhas/caixinhas?error=not-found");
            exit;
        }*/

        // Renderiza a página de detalhes da caixinha
        $this->view->render('dashboard/caixinha/ficha-caixinha', [
            'caixinha' => []
        ]);
    }
}