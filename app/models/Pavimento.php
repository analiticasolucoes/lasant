<?php

namespace App\Models;

class Pavimento
{
    private int $id;
    private Cliente $cliente;
    private Local $local;
    private string $descricao;
    private bool $status;

    /**
     * @param int $id
     * @param Cliente $cliente
     * @param Local $local
     * @param string $descricao
     * @param bool $status
     */
    public function __construct(int $id = 0, Cliente $cliente = new Cliente(), Local $local = new Local(), string $descricao = "", bool $status = true)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->local = $local;
        $this->descricao = $descricao;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getLocal(): Local
    {
        return $this->local;
    }

    public function setLocal(Local $local): void
    {
        $this->local = $local;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
}