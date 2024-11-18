<?php

namespace App\Models;

use DateTime;

/**
 * Classe int
 *
 * Representa um int ou fornecedor do sistema.
 */
class ClienteHasProfissional
{
    private int $id;
    private Cliente $cliente;
    private Profissional $profissional;
    private DateTime $dataInicio;
    private DateTime $dataTermino;
    private bool $status;

    /**
     * @param int $id
     * @param Cliente $cliente
     * @param Profissional $profissional
     * @param DateTime $dataInicio
     * @param DateTime $dataTermino
     * @param bool $status
     */
    public function __construct(
        int $id = 0,
        Cliente $cliente = new Cliente(),
        Profissional $profissional = new Profissional(),
        DateTime $dataInicio = new DateTime(),
        DateTime $dataTermino = new DateTime(),
        bool $status = true)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->profissional = $profissional;
        $this->dataInicio = $dataInicio;
        $this->dataTermino = $dataTermino;
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

    public function getProfissional(): Profissional
    {
        return $this->profissional;
    }

    public function setProfissional(Profissional $profissional): void
    {
        $this->profissional = $profissional;
    }

    public function getDataInicio(): DateTime
    {
        return $this->dataInicio;
    }

    public function setDataInicio(DateTime $dataInicio): void
    {
        $this->dataInicio = $dataInicio;
    }

    public function getDataTermino(): DateTime
    {
        return $this->dataTermino;
    }

    public function setDataTermino(DateTime $dataTermino): void
    {
        $this->dataTermino = $dataTermino;
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