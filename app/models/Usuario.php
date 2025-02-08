<?php

namespace App\Models;

class Usuario
{
    private int $id;
    private string $nome;
    private string $usuario;
    private string $senha;
    private ?string $codigo;
    private ?array $clientes;
    private ?array $fornecedores;
    private ?string $aprovador;
    private ?string $foto;
    private ?float $limite;

    public function __construct(
        int $id = 0,
        string  $nome = "",
        string  $usuario = "",
        string  $senha = "",
        ?string $codigo = null,
        ?array  $clientes = [],
        ?array  $fornecedores = [],
        ?string $aprovador = null,
        ?string $foto = null,
        ?float  $limite = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->codigo = $codigo;
        $this->clientes = $clientes;
        $this->fornecedores = $fornecedores;
        $this->aprovador = $aprovador;
        $this->foto = $foto;
        $this->limite = $limite;
    }

    // Getters e Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

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

    public function getClientes(): ?array
    {
        return $this->clientes;
    }

    public function setClientes(?array $clientes): void
    {
        sort($clientes);
        $this->clientes = $clientes;
    }

    public function getFornecedores(): ?array
    {
        return $this->fornecedores;
    }

    public function setFornecedores(?array $fornecedores): void
    {
        sort($fornecedores);
        $this->fornecedores = $fornecedores;
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