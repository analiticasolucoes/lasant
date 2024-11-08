<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{CategoriaServicoRepository, CategoriaRepository};
use App\Views\ViewController;

class CategoriaServicoController
{
    private CategoriaServicoRepository $categoriaServicoRepository;
    private CategoriaRepository $categoriaRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->categoriaServicoRepository = new CategoriaServicoRepository($conn);
        $this->categoriaRepository = new CategoriaRepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        $categoria = $this->categoriaRepository->find($args['categoria']);

        if (!$categoria) {
            // Tratamento de erro se a categoria não for encontrada
            header("Location: /erro");
            exit;
        }

        $data = [
            'categoria' => $categoria,
            'dsCategoriaServico' => $args['descricao'],
            'ativo' => $args['ativo'] ?? true,
        ];

        if ($this->categoriaServicoRepository->create($data)) {
            header("Location: /cadastros-gerais/categorias-servicos");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $categoriaServico = $this->categoriaServicoRepository->find($args['id']);

        if (!$categoriaServico) {
            // Tratamento de erro se o serviço de categoria não for encontrado
            header("Location: /erro");
            exit;
        }

        $categoria = $this->categoriaRepository->find($args['categoria']);

        if (!$categoria) {
            // Tratamento de erro se a categoria associada não for encontrada
            header("Location: /erro");
            exit;
        }

        $categoriaServico->setCategoria($categoria);
        $categoriaServico->setDescricao($args['descricao']);
        $categoriaServico->setAtivo($args['ativo'] ?? true);

        if ($this->categoriaServicoRepository->update($categoriaServico)) {
            header("Location: /cadastros-gerais/categorias-servicos");
        }
    }

    public function delete(array $args): void
    {
        $categoriaServico = $this->categoriaServicoRepository->find($args['id']);

        if (!$categoriaServico) {
            // Tratamento de erro se o serviço de categoria não for encontrado
            header("Location: /erro");
            exit;
        }

        if ($this->categoriaServicoRepository->delete($categoriaServico)) {
            header("Location: /cadastros-gerais/categorias-servicos");
        }
    }
}