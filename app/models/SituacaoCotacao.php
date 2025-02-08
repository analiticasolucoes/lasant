<?php

namespace App\Models;

class SituacaoCotacao
{
    private ?int $id;
    private ?string $situacao;

    public function __construct()
    {
        $this->id = 0;
        $this->situacao = "";
    }

    // Getters e Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(?string $situacao): void
    {
        $this->situacao = $situacao;
    }
}
