<?php

namespace App\Models;

class Material
{
    private int $id;
    private ?GrupoMaterial $grupo;
    private ?SubGrupoMaterial $subgrupo;
    private ?ClasseMaterial $classe;
    private ?MarcaMaterial $marca;
    private string $codigo;
    private ?string $descricao;
    private ?Unidade $unidade;
    private float $valor;

    public function __construct(
        int          $id = 0,
        GrupoMaterial    $grupo = null,
        SubGrupoMaterial $subgrupo = null,
        ClasseMaterial   $classe = null,
        MarcaMaterial    $marca = null,
        string           $codigo = '',
        string           $descricao = '',
        Unidade          $unidade = null,
        float            $valor = 0.0
    ) {
        $this->id = $id;
        $this->grupo = $grupo;
        $this->subgrupo = $subgrupo;
        $this->classe = $classe;
        $this->marca = $marca;
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->unidade = $unidade;
        $this->valor = $valor;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getGrupo(): ?GrupoMaterial
    {
        return $this->grupo;
    }

    public function setGrupo(?GrupoMaterial $grupo): void
    {
        $this->grupo = $grupo;
    }

    public function getSubgrupo(): ?SubGrupoMaterial
    {
        return $this->subgrupo;
    }

    public function setSubgrupo(?SubGrupoMaterial $subgrupo): void
    {
        $this->subgrupo = $subgrupo;
    }

    public function getClasse(): ?ClasseMaterial
    {
        return $this->classe;
    }

    public function setClasse(?ClasseMaterial $classe): void
    {
        $this->classe = $classe;
    }

    public function getMarca(): ?MarcaMaterial
    {
        return $this->marca;
    }

    public function setMarca(?MarcaMaterial $marca): void
    {
        $this->marca = $marca;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao ?? "";
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getUnidade(): ?Unidade
    {
        return $this->unidade;
    }

    public function setUnidade(?Unidade $unidade): void
    {
        $this->unidade = $unidade;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }
}