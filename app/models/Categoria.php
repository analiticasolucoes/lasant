<?php

namespace App\Models;

class Categoria
{
    private int $id;
    private string $descricao;
    private int $tipo;
    private string $codCategoria;
    private bool $ativo;

    public function __construct(int $id, string $descricao, cliente $tipo, string $codCategoria, bool $ativo)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->tipo = $tipo;
        $this->codCategoria = $codCategoria;
        $this->ativo = $ativo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function getCodCategoria(): string
    {
        return $this->codCategoria;
    }

    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function setCodCategoria(string $codCategoria): void
    {
        $this->codCategoria = $codCategoria;
    }

    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }
}