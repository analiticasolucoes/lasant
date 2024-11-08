<?php

namespace App\Models;

class Ferramenta
{
    private int $id;
    private int $idFerramentaSituacao;
    private string $nmFerramenta;
    private string $dsFerramenta;
    private string $serie;
    private string $nuPatrimonial;
    private string $voltagemFerramenta;
    private ?string $peso;
    private string $potencia;
    private float $valor;
    private \DateTime $dtAquisicao;
    private string $foto1;
    private string $foto2;
    private ?cliente $status;
    private ?string $idProfissional;

    public function __construct(
        cliente   $id,
        cliente   $idFerramentaSituacao,
        string    $nmFerramenta,
        string    $dsFerramenta,
        string    $serie,
        string    $nuPatrimonial,
        string    $voltagemFerramenta,
        ?string   $peso,
        string    $potencia,
        float     $valor,
        \DateTime $dtAquisicao,
        string    $foto1,
        string    $foto2,
        ?cliente  $status,
        ?string   $idProfissional
    ) {
        $this->id = $id;
        $this->idFerramentaSituacao = $idFerramentaSituacao;
        $this->nmFerramenta = $nmFerramenta;
        $this->dsFerramenta = $dsFerramenta;
        $this->serie = $serie;
        $this->nuPatrimonial = $nuPatrimonial;
        $this->voltagemFerramenta = $voltagemFerramenta;
        $this->peso = $peso;
        $this->potencia = $potencia;
        $this->valor = $valor;
        $this->dtAquisicao = $dtAquisicao;
        $this->foto1 = $foto1;
        $this->foto2 = $foto2;
        $this->status = $status;
        $this->idProfissional = $idProfissional;
    }

    // Getters e Setters para todos os atributos

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdFerramentaSituacao(): int
    {
        return $this->idFerramentaSituacao;
    }

    public function getNmFerramenta(): string
    {
        return $this->nmFerramenta;
    }

    public function getDsFerramenta(): string
    {
        return $this->dsFerramenta;
    }

    public function getSerie(): string
    {
        return $this->serie;
    }

    public function getNuPatrimonial(): string
    {
        return $this->nuPatrimonial;
    }

    public function getVoltagemFerramenta(): string
    {
        return $this->voltagemFerramenta;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function getPotencia(): string
    {
        return $this->potencia;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getDtAquisicao(): \DateTime
    {
        return $this->dtAquisicao;
    }

    public function getFoto1(): string
    {
        return $this->foto1;
    }

    public function getFoto2(): string
    {
        return $this->foto2;
    }

    public function getStatus(): ?cliente
    {
        return $this->status;
    }

    public function getIdProfissional(): ?string
    {
        return $this->idProfissional;
    }
}