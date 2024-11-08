<?php

namespace App\Models;

class CategoriaServico
{
    private int $id;
    private Categoria $categoria;
    private string $descricao;
    private bool $ativo;

    public function __construct(int $id, Categoria $categoria, string $descricao, bool $ativo = true)
    {
        $this->id = $id;
        $this->categoria = $categoria;
        $this->descricao = $descricao;
        $this->ativo = $ativo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCategoria(Categoria $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }
}