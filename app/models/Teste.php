<?php

namespace App\Models;

class Teste
{
    private string $tabela = "teste";
    private array $campos = [
        ['atributo' => 'id', 'campo' => 'id'],
        ['atributo' => 'descricao', 'campo' => 'descricao'],
        ['atributo' => 'endereco', 'campo' => 'endereco'],
        ['atributo' => 'createdAt', 'campo' => 'created_at'],
    ];
    private ?int $id = 0;
    private string $descricao = "";
    private ?Endereco $endereco = null;
    private ?\DateTime $createdAt = null;

    public function __construct()
    {
        $this->id = 0;
        $this->descricao = "";
        $this->endereco = null;
        $this->createdAt = null;
    }

    public function getTabela(): string
    {
        return $this->tabela;
    }

    public function getCampos(): array
    {
        return $this->campos;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}