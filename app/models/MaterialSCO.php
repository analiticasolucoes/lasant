<?php

namespace App\Models;

class MaterialSCO
{
    private int $id;
    private int $idContrato;
    private int $codI0SCO;
    private int $idSCO;
    private string $codSCO;
    private string $descricaoSCO;
    private string $unidade;
    private int $tipo;
    private array $i0SCO;

    public function __construct(
        cliente $id,
        cliente $idContrato,
        cliente $codI0SCO,
        cliente $idSCO,
        string  $codSCO,
        string  $descricaoSCO,
        string  $unidade,
        cliente $tipo,
        array   $i0SCO
    ) {
        $this->id = $id;
        $this->idContrato = $idContrato;
        $this->codI0SCO = $codI0SCO;
        $this->idSCO = $idSCO;
        $this->codSCO = $codSCO;
        $this->descricaoSCO = $descricaoSCO;
        $this->unidade = $unidade;
        $this->tipo = $tipo;
        $this->i0SCO = $i0SCO;
    }

    // Getter e Setter para id
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter e Setter para idContrato
    public function getIdContrato(): int
    {
        return $this->idContrato;
    }

    public function setIdContrato(int $idContrato): void
    {
        $this->idContrato = $idContrato;
    }

    // Getter e Setter para codI0SCO
    public function getCodI0SCO(): int
    {
        return $this->codI0SCO;
    }

    public function setCodI0SCO(int $codI0SCO): void
    {
        $this->codI0SCO = $codI0SCO;
    }

    // Getter e Setter para idSCO
    public function getIdSCO(): int
    {
        return $this->idSCO;
    }

    public function setIdSCO(int $idSCO): void
    {
        $this->idSCO = $idSCO;
    }

    // Getter e Setter para codSCO
    public function getCodSCO(): string
    {
        return $this->codSCO;
    }

    public function setCodSCO(string $codSCO): void
    {
        $this->codSCO = $codSCO;
    }

    // Getter e Setter para descricaoSCO
    public function getDescricaoSCO(): string
    {
        return $this->descricaoSCO;
    }

    public function setDescricaoSCO(string $descricaoSCO): void
    {
        $this->descricaoSCO = $descricaoSCO;
    }

    // Getter e Setter para unidade
    public function getUnidade(): string
    {
        return $this->unidade;
    }

    public function setUnidade(string $unidade): void
    {
        $this->unidade = $unidade;
    }

    // Getter e Setter para tipo
    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }

    // Getter e Setter para I0SCO (relação 1:1)
    public function getI0SCO(): array
    {
        return $this->i0SCO;
    }

    public function setI0SCO(array $i0SCO): void
    {
        $this->i0SCO = $i0SCO;
    }
}