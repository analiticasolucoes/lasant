<?php

namespace App\Models;

class Esfera
{
    private int $id;
    private string $descricao;
    private string $formOS;

    public function __construct(int $id, string $descricao, string $formOS)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->formOS = $formOS;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getFormOS(): string
    {
        return $this->formOS;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setFormOS(string $formOS): void
    {
        $this->formOS = $formOS;
    }
}