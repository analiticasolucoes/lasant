<?php

namespace App\Models;

class ModeloImpressao
{
    private int $id;
    private ?string $titulo;
    private ?string $arquivo;

    public function __construct(int $id, ?string $titulo, ?string $arquivo)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->arquivo = $arquivo;
    }

    // Métodos getters e setters para cada propriedade

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getArquivo(): ?string
    {
        return $this->arquivo;
    }

    public function setArquivo(?string $arquivo): void
    {
        $this->arquivo = $arquivo;
    }
}