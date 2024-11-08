<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\ModeloImpressaoRepository;

class ModeloImpressaoController
{
    private ModeloImpressaoRepository $modeloImpressaoRepository;

    public function __construct(Database $conn)
    {
        $this->modeloImpressaoRepository = new ModeloImpressaoRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->modeloImpressaoRepository->create($args)) {
            header("Location: /cadastros-gerais/modelos-impressao");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $modeloImpressao = $this->modeloImpressaoRepository->find($args["id"]);
        $modeloImpressao->setTitulo($args['titulo']);
        $modeloImpressao->setArquivo($args['arquivo']);
        if ($this->modeloImpressaoRepository->update($modeloImpressao)) {
            header("Location: /cadastros-gerais/modelos-impressao");
        }
    }

    public function delete(array $args): void
    {
        $modeloImpressao = $this->modeloImpressaoRepository->find($args["id"]);
        if ($this->modeloImpressaoRepository->delete($modeloImpressao)) {
            header("Location: /cadastros-gerais/modelos-impressao");
        }
    }
}
