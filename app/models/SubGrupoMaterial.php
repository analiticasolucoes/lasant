<?php

namespace App\Models;

class SubGrupoMaterial
{
    private int $id;
    private GrupoMaterial $grupo;
    private string $codigo;
    private string $descricao;

    public function __construct(int $id = 0, GrupoMaterial $grupo = null, string $codigo = '', string $descricao = '')
    {
        $this->id = $id;
        $this->grupo = $grupo;
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