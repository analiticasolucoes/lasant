<?php

namespace App\Models;

class I0SCO
{
    private int $id;
    private ?string $codSCO;
    private string $mes;
    private ?string $ano;
    private string $valor;

    public function __construct(
        cliente $id,
        ?string $codSCO,
        string  $mes,
        ?string $ano,
        string  $valor
    ) {
        $this->id = $id;
        $this->codSCO = $codSCO;
        $this->mes = $mes;
        $this->ano = $ano;
        $this->valor = $valor;
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

    // Getter e Setter para codSCO
    public function getCodSCO(): ?string
    {
        return $this->codSCO;
    }

    public function setCodSCO(?string $codSCO): void
    {
        $this->codSCO = $codSCO;
    }

    // Getter e Setter para mes
    public function getMes(): string
    {
        return $this->mes;
    }

    public function setMes(string $mes): void
    {
        $this->mes = $mes;
    }

    // Getter e Setter para ano
    public function getAno(): ?string
    {
        return $this->ano;
    }

    public function setAno(?string $ano): void
    {
        $this->ano = $ano;
    }

    // Getter e Setter para valor
    public function getValor(): string
    {
        return $this->valor;
    }

    public function setValor(string $valor): void
    {
        $this->valor = $valor;
    }
}