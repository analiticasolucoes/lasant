<?php

namespace App\Models;

class LocalEntrega
{
    private int $id;
    private Cliente $cliente;
    private ?string $descricao;
    private string $cep;
    private string $logradouro;
    private string $bairro;
    private string $cidade;
    private string $uf;
    private string $numero;
    private string $complemento;
    private string $contato;
    private string $telefone;

    /**
     * @param int $id
     * @param Cliente $cliente
     * @param string|null $descricao
     * @param string $cep
     * @param string $logradouro
     * @param string $bairro
     * @param string $cidade
     * @param string $uf
     * @param string $numero
     * @param string $complemento
     * @param string $contato
     * @param string $telefone
     */

    public function __construct(
        int $id = 0,
        Cliente $cliente = new CLiente(),
        ?string $descricao = "",
        string $cep = "",
        string $logradouro = "",
        string $bairro = "",
        string $cidade = "",
        string $uf = "",
        string $numero = "",
        string $complemento = "",
        string $contato = "",
        string $telefone = "")
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->descricao = $descricao;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->contato = $contato;
        $this->telefone = $telefone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): void
    {
        $this->logradouro = $logradouro;
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

    public function getUf(): string
    {
        return $this->uf;
    }

    public function setUf(string $uf): void
    {
        $this->uf = $uf;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getContato(): string
    {
        return $this->contato;
    }

    public function setContato(string $contato): void
    {
        $this->contato = $contato;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }
}