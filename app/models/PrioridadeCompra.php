<?php

namespace App\Models;

class PrioridadeCompra {
    private int $id;
    private string $prioridade;

    public function __construct() {
        $this->id = 0;
        $this->prioridade = "";
    }

    public function getId(): int {
        return $this->id;
    }

    public function getPrioridade(): string {
        return $this->prioridade;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setPrioridade(string $prioridade) {
        $this->prioridade = $prioridade;
    }
}