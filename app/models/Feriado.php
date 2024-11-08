<?php

namespace App\Models;

use \DateTime;

class Feriado
{
    private int $id;
    private DateTime $data;
    private string $descricao;

    public function __construct(int $id, DateTime $data, string $descricao)
    {
        $this->id = $id;
        $this->data = $data;
        $this->descricao = $descricao;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}