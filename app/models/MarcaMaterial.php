<?php

namespace App\Models;

class MarcaMaterial
{
    private int $id;
    private GrupoMaterial $grupo;
    private string $descricao;

    public function __construct(int $id = 0, GrupoMaterial $grupo = null, string $descricao = '')
    {
        $this->id = $id;
        $this->grupo = $grupo;
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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}