<?php

namespace App\Models;

class SituacaoOS
{
    private int $id;
    private string $descricao;
    private string $cor;

    public function __construct(int $id, string $descricao, string $cor)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->cor = $cor;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getCor(): string
    {
        return $this->cor;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setCor(string $cor): void
    {
        $this->cor = $cor;
    }
}