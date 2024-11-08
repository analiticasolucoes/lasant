<?php

namespace App\Models;

class SituacaoSS
{
    private int $id;
    private string $descricao;
    private string $cor;
    private string $flagPedido;

    public function __construct(int $id, string $descricao, string $cor, string $flagPedido)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->cor = $cor;
        $this->flagPedido = $flagPedido;
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

    public function getFlagPedido(): string
    {
        return $this->flagPedido;
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

    public function setFlagPedido(string $flagPedido): void
    {
        $this->flagPedido = $flagPedido;
    }
}