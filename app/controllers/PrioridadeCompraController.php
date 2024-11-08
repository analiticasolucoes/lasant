<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\PrioridadeCompraRepository;

class PrioridadeCompraController
{
    private PrioridadeCompraRepository $prioridadeCompraRepository;

    public function __construct(Database $conn)
    {
        $this->prioridadeCompraRepository = new PrioridadeCompraRepository($conn);
    }

    public function new(array $args): void
    {
        if ($this->prioridadeCompraRepository->create($args)) {
            header("Location: /prioridades-compra");
        }
        exit;
    }

    public function alter(array $args): void
    {
        $prioridadeCompra = $this->prioridadeCompraRepository->find($args["id"]);
        $prioridadeCompra->setPrioridade($args['prioridade-editar']);
        if ($this->prioridadeCompraRepository->update($prioridadeCompra)) {
            header("Location: /prioridades-compra");
        }
    }

    public function delete(array $args): void
    {
        $prioridadeCompra = $this->prioridadeCompraRepository->find($args["id"]);
        if ($this->prioridadeCompraRepository->delete($prioridadeCompra)) {
            header("Location: /prioridades-compra");
        }
    }

    public function listAll(): void
    {
        $prioridades = $this->prioridadeCompraRepository->all();

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractPrioridadeCompra'], $prioridades);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    private function extractPrioridadeCompra($prioridadeCompra): array
    {
        return [
            'id' => $prioridadeCompra->getId(),
            'prioridade' => $prioridadeCompra->getPrioridade()
        ];
    }
}