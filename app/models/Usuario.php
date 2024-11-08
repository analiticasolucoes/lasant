<?php

namespace App\Models;

class Usuario
{
    private int $id;
    private string $nome;
    private string $usuario;
    private string $senha;
    private ?string $codigo;
    private ?array $idCliente;
    private ?string $aprovador;
    private ?string $foto;
    private ?float $limite;

    public function __construct(
        int $id,
        string  $nome,
        string  $usuario,
        string  $senha,
        ?string $codigo = null,
        ?array  $idCliente = [],
        ?string $aprovador = null,
        ?string $foto = null,
        ?float  $limite = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->codigo = $codigo;
        $this->idCliente = $idCliente;
        $this->aprovador = $aprovador;
        $this->foto = $foto;
        $this->limite = $limite;
    }

    // Getters e Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function verificarSenha(string $senha): bool
    {
        return password_verify($senha, $this->senha);
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getIdCliente(): ?array
    {
        return $this->idCliente;
    }

    public function setIdCliente(?array $idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    public function getAprovador(): ?string
    {
        return $this->aprovador;
    }

    public function setAprovador(?string $aprovador): void
    {
        $this->aprovador = $aprovador;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): void
    {
        $this->foto = $foto;
    }

    public function getLimite(): ?float
    {
        return $this->limite;
    }

    public function setLimite(?float $limite): void
    {
        $this->limite = $limite;
    }
}