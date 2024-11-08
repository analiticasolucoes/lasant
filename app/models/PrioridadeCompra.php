<?php

namespace App\Models;

class PrioridadeCompra {
    private int $id;
    private string $prioridade;

    public function __construct(int $id = null, string $prioridade = null) {
        $this->id = $id;
        $this->prioridade = $prioridade;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getPrioridade(): string {
        return $this->prioridade;
    }

    // Setters
    public function setId(int $id) {
        $this->id = $id;
    }

    public function setPrioridade(string $prioridade) {
        $this->prioridade = $prioridade;
    }
}