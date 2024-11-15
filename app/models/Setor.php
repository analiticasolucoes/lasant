<?php

namespace App\Models;

class Setor
{
    private int $id;
    private Cliente $cliente;
    private Pavimento $pavimento;
    private string $descricao;
    private bool $status;
    private int $ocupantesFixos;
    private int $ocupantesFlutuantes;
    private float $largura;
    private float $comprimento;
    private float $altura;

    /**
     * @param int $id
     * @param Cliente $cliente
     * @param Pavimento $pavimento
     * @param string $descricao
     * @param bool $status
     * @param int $ocupantesFixos
     * @param int $ocupantesFlutuantes
     * @param float $largura
     * @param float $comprimento
     * @param float $altura
     */
    public function __construct(
        int       $id = 0,
        Cliente   $cliente = new Cliente(),
        Pavimento $pavimento = new Pavimento(),
        string    $descricao = "",
        bool      $status = true,
        int       $ocupantesFixos = 0,
        int       $ocupantesFlutuantes = 0,
        float     $largura = 0.0,
        float     $comprimento = 0.0,
        float     $altura = 0.0)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->pavimento = $pavimento;
        $this->descricao = $descricao;
        $this->status = $status;
        $this->ocupantesFixos = $ocupantesFixos;
        $this->ocupantesFlutuantes = $ocupantesFlutuantes;
        $this->largura = $largura;
        $this->comprimento = $comprimento;
        $this->altura = $altura;
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

    public function getPavimento(): Pavimento
    {
        return $this->pavimento;
    }

    public function setPavimento(Pavimento $pavimento): void
    {
        $this->pavimento = $pavimento;
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

    public function getOcupantesFixos(): int
    {
        return $this->ocupantesFixos;
    }

    public function setOcupantesFixos(int $ocupantesFixos): void
    {
        $this->ocupantesFixos = $ocupantesFixos;
    }

    public function getOcupantesFlutuantes(): int
    {
        return $this->ocupantesFlutuantes;
    }

    public function setOcupantesFlutuantes(int $ocupantesFlutuantes): void
    {
        $this->ocupantesFlutuantes = $ocupantesFlutuantes;
    }

    public function getLargura(): float
    {
        return $this->largura;
    }

    public function setLargura(float $largura): void
    {
        $this->largura = $largura;
    }

    public function getComprimento(): float
    {
        return $this->comprimento;
    }

    public function setComprimento(float $comprimento): void
    {
        $this->comprimento = $comprimento;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function setAltura(float $altura): void
    {
        $this->altura = $altura;
    }
}