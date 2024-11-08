<?php

namespace App\Models;

class TipoOS
{
    private int $id;
    private ?string $descricao;
    private ?string $codigo;

    public function __construct(int $id, ?string $descricao, ?string $codigo)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->codigo = $codigo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }
}