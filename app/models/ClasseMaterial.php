<?php

namespace App\Models;

class ClasseMaterial
{
    private int $id;
    private GrupoMaterial $grupo;
    private SubGrupoMaterial $subgrupo;
    private string $codigo;
    private string $descricao;

    public function __construct(int $id = 0, GrupoMaterial $grupo = null, SubGrupoMaterial $subgrupo = null, string $codigo = '', string $descricao = '')
    {
        $this->id = $id;
        $this->grupo = $grupo;
        $this->subgrupo = $subgrupo;
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getGrupo(): GrupoMaterial
    {
        return $this->grupo;
    }

    public function setGrupo(GrupoMaterial $grupo): void
    {
        $this->grupo = $grupo;
    }

    public function getSubgrupo(): SubGrupoMaterial
    {
        return $this->subgrupo;
    }

    public function setSubgrupo(SubGrupoMaterial $subgrupo): void
    {
        $this->subgrupo = $subgrupo;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}