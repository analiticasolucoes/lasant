<?php

namespace App\Models;

class Banco
{
    private int $id;
    private string $banco;
    private string $agencia;
    private string $conta;
    private Cliente $cliente;

    public function __construct(int $id = 0, string $banco = "", string $agencia = "", string $conta = "", Cliente $cliente = new Cliente())
    {
        $this->id = $id;
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->cliente = $cliente;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getConta(): string
    {
        return $this->conta;
    }

    public function setConta(string $conta): void
    {
        $this->conta = $conta;
    }

    public function getAgencia(): string
    {
        return $this->agencia;
    }

    public function setAgencia(string $agencia): void
    {
        $this->agencia = $agencia;
    }

    public function getBanco(): string
    {
        return $this->banco;
    }

    public function setBanco(string $banco): void
    {
        $this->banco = $banco;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }
}