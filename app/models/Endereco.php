<?php

namespace App\Models;

class Endereco {
    private string $tabela = "endereco";
    private array $campos = [
        ['atributo' => 'id', 'campo' => 'id'],
        ['atributo' => 'logradouro', 'campo' => 'logradouro'],
        ['atributo' => 'numero', 'campo' => 'numero'],
        ['atributo' => 'complemento', 'campo' => 'complemento'],
        ['atributo' => 'bairro', 'campo' => 'bairro'],
        ['atributo' => 'cidade', 'campo' => 'cidade'],
        ['atributo' => 'estado', 'campo' => 'estado'],
        ['atributo' => 'cep', 'campo' => 'cep'],
    ];
    private int $id;
    private string $logradouro;
    private string $numero;
    private ?string $complemento;
    private string $bairro;
    private string $cidade;
    private string $estado;
    private string $cep;

    public function __construct()
    {
        $this->id = 0;
        $this->logradouro = "";
        $this->numero = "";
        $this->complemento = "";
        $this->bairro = "";
        $this->cidade = "";
        $this->estado = "";
        $this->cep = "";
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }
}