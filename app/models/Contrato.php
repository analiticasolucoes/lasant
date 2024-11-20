<?php

namespace App\Models;

use DateTime;

class Contrato
{
    private int $id;
    private Cliente $cliente;
    private string $descricao;
    private DateTime $dataInicio;
    private DateTime $dataEncerramento;
    private float $valorBase;
    private float $valorBase2;
    private float $valorBase3;
    private float $bdi;
    private string $numero;
    private string $mesSco;
    private string $anoSco;
    private int $status;
    private string $processo;
    private float $valorCorretiva;
    private float $valorPreventiva;

    /**
     * @param int $id
     * @param Cliente $cliente
     * @param string $descricao
     * @param DateTime $dataInicio
     * @param DateTime $dataEncerramento
     * @param float $valorBase
     * @param float $valorBase2
     * @param float $valorBase3
     * @param float $bdi
     * @param string $numero
     * @param string $mesSco
     * @param string $anoSco
     * @param int $status
     * @param string $processo
     * @param float $valorCorretiva
     * @param float $valorPreventiva
     */
    public function __construct(
        int $id = 0,
        Cliente $cliente = new Cliente(),
        string $descricao = "",
        DateTime $dataInicio = new DateTime(),
        DateTime $dataEncerramento = new DateTime(),
        float $valorBase = 0.0,
        float $valorBase2 = 0.0,
        float $valorBase3 = 0.0,
        float $bdi = 0.0,
        string $numero = "",
        string $mesSco = "",
        string $anoSco = "",
        int $status = 0,
        string $processo = "",
        float $valorCorretiva = 0.0,
        float $valorPreventiva = 0.0)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->descricao = $descricao;
        $this->dataInicio = $dataInicio;
        $this->dataEncerramento = $dataEncerramento;
        $this->valorBase = $valorBase;
        $this->valorBase2 = $valorBase2;
        $this->valorBase3 = $valorBase3;
        $this->bdi = $bdi;
        $this->numero = $numero;
        $this->mesSco = $mesSco;
        $this->anoSco = $anoSco;
        $this->status = $status;
        $this->processo = $processo;
        $this->valorCorretiva = $valorCorretiva;
        $this->valorPreventiva = $valorPreventiva;
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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDataInicio(): DateTime
    {
        return $this->dataInicio;
    }

    public function setDataInicio(DateTime $dataInicio): void
    {
        $this->dataInicio = $dataInicio;
    }

    public function getDataEncerramento(): DateTime
    {
        return $this->dataEncerramento;
    }

    public function setDataEncerramento(DateTime $dataEncerramento): void
    {
        $this->dataEncerramento = $dataEncerramento;
    }

    public function getValorBase(): float
    {
        return $this->valorBase;
    }

    public function setValorBase(float $valorBase): void
    {
        $this->valorBase = $valorBase;
    }

    public function getValorBase2(): float
    {
        return $this->valorBase2;
    }

    public function setValorBase2(float $valorBase2): void
    {
        $this->valorBase2 = $valorBase2;
    }

    public function getValorBase3(): float
    {
        return $this->valorBase3;
    }

    public function setValorBase3(float $valorBase3): void
    {
        $this->valorBase3 = $valorBase3;
    }

    public function getBdi(): float
    {
        return $this->bdi;
    }

    public function setBdi(float $bdi): void
    {
        $this->bdi = $bdi;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getMesSco(): string
    {
        return $this->mesSco;
    }

    public function setMesSco(string $mesSco): void
    {
        $this->mesSco = $mesSco;
    }

    public function getAnoSco(): string
    {
        return $this->anoSco;
    }

    public function setAnoSco(string $anoSco): void
    {
        $this->anoSco = $anoSco;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getProcesso(): string
    {
        return $this->processo;
    }

    public function setProcesso(string $processo): void
    {
        $this->processo = $processo;
    }

    public function getValorCorretiva(): float
    {
        return $this->valorCorretiva;
    }

    public function setValorCorretiva(float $valorCorretiva): void
    {
        $this->valorCorretiva = $valorCorretiva;
    }

    public function getValorPreventiva(): float
    {
        return $this->valorPreventiva;
    }

    public function setValorPreventiva(float $valorPreventiva): void
    {
        $this->valorPreventiva = $valorPreventiva;
    }

}