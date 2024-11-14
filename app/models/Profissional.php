<?php

namespace App\Models;

use App\Models\Cargo;

class Profissional
{
    private int $id;
    private string $folha;
    private int $idAvaliacaoProfissional;
    private string $nome;
    private string $cpf;
    private string $dtNascimento;
    private string $telefone;
    private Cargo $cargo;
    private string $status;
    private ?string $tamanhoCalcado;
    private ?string $tamanhoCalca;
    private ?string $tamanhoCamisa;
    private ?float $valorPassagem;
    private ?float $valorPassagem1;
    private ?float $valorPassagem2;
    private ?float $valorPassagem3;
    private ?int $qtdPassagem;
    private ?int $qtdPassagem1;
    private ?int $qtdPassagem2;
    private ?int $qtdPassagem3;

    public function __construct(
        int  $id,
        string   $folha,
        int  $idAvaliacaoProfissional,
        string   $nome,
        string   $cpf,
        string   $dtNascimento,
        string   $telefone,
        string   $status,
        ?Cargo    $cargo = new Cargo(0, ""),
        ?string  $tamanhoCalcado = null,
        ?string  $tamanhoCalca = null,
        ?string  $tamanhoCamisa = null,
        ?float   $valorPassagem = 0,
        ?float   $valorPassagem1 = 0,
        ?float   $valorPassagem2 = 0,
        ?float   $valorPassagem3 = 0,
        ?int $qtdPassagem = 0,
        ?int $qtdPassagem1 = 0,
        ?int $qtdPassagem2 = 0,
        ?int $qtdPassagem3 = 0
    ) {
        $this->id = $id;
        $this->folha = $folha;
        $this->idAvaliacaoProfissional = $idAvaliacaoProfissional;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dtNascimento = $dtNascimento;
        $this->telefone = $telefone;
        $this->cargo = $cargo;
        $this->status = $status;
        $this->tamanhoCalcado = $tamanhoCalcado;
        $this->tamanhoCalca = $tamanhoCalca;
        $this->tamanhoCamisa = $tamanhoCamisa;
        $this->valorPassagem = $valorPassagem;
        $this->valorPassagem1 = $valorPassagem1;
        $this->valorPassagem2 = $valorPassagem2;
        $this->valorPassagem3 = $valorPassagem3;
        $this->qtdPassagem = $qtdPassagem;
        $this->qtdPassagem1 = $qtdPassagem1;
        $this->qtdPassagem2 = $qtdPassagem2;
        $this->qtdPassagem3 = $qtdPassagem3;
    }

    // Getters e Setters para todos os atributos

    public function getId(): int
    {
        return $this->id;
    }

    public function getFolha(): string
    {
        return $this->folha;
    }

    public function getIdAvaliacaoProfissional(): int
    {
        return $this->idAvaliacaoProfissional;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCPF(): string
    {
        return $this->cpf;
    }

    public function getDtNascimento(): string
    {
        return $this->dtNascimento;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getCargo(): ?Cargo
    {
        return $this->cargo;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTamanhoCalcado(): ?string
    {
        return $this->tamanhoCalcado;
    }

    public function getTamanhoCalca(): ?string
    {
        return $this->tamanhoCalca;
    }

    public function getTamanhoCamisa(): ?string
    {
        return $this->tamanhoCamisa;
    }

    public function getValorPassagem(): ?float
    {
        return $this->valorPassagem;
    }

    public function getValorPassagem1(): ?float
    {
        return $this->valorPassagem1;
    }

    public function getValorPassagem2(): ?float
    {
        return $this->valorPassagem2;
    }

    public function getValorPassagem3(): ?float
    {
        return $this->valorPassagem3;
    }

    public function getQtdPassagem(): ?int
    {
        return $this->qtdPassagem;
    }

    public function getQtdPassagem1(): ?int
    {
        return $this->qtdPassagem1;
    }

    public function getQtdPassagem2(): ?int
    {
        return $this->qtdPassagem2;
    }

    public function getQtdPassagem3(): ?int
    {
        return $this->qtdPassagem3;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setFolha(string $folha): void
    {
        $this->folha = $folha;
    }

    public function setIdAvaliacaoProfissional(int $idAvaliacaoProfissional): void
    {
        $this->idAvaliacaoProfissional = $idAvaliacaoProfissional;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setCPF(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setDtNascimento(string $dtNascimento): void
    {
        $this->dtNascimento = $dtNascimento;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function setCargo(Cargo $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setTamanhoCalcado(?string $tamanhoCalcado): void
    {
        $this->tamanhoCalcado = $tamanhoCalcado;
    }

    public function setTamanhoCalca(?string $tamanhoCalca): void
    {
        $this->tamanhoCalca = $tamanhoCalca;
    }

    public function setTamanhoCamisa(?string $tamanhoCamisa): void
    {
        $this->tamanhoCamisa = $tamanhoCamisa;
    }

    public function setValorPassagem(?float $valorPassagem): void
    {
        $this->valorPassagem = $valorPassagem;
    }

    public function setValorPassagem1(?float $valorPassagem1): void
    {
        $this->valorPassagem1 = $valorPassagem1;
    }

    public function setValorPassagem2(?float $valorPassagem2): void
    {
        $this->valorPassagem2 = $valorPassagem2;
    }

    public function setValorPassagem3(?float $valorPassagem3): void
    {
        $this->valorPassagem3 = $valorPassagem3;
    }

    public function setQtdPassagem(?int $qtdPassagem): void
    {
        $this->qtdPassagem = $qtdPassagem;
    }

    public function setQtdPassagem1(?int $qtdPassagem1): void
    {
        $this->qtdPassagem1 = $qtdPassagem1;
    }

    public function setQtdPassagem2(?int $qtdPassagem2): void
    {
        $this->qtdPassagem2 = $qtdPassagem2;
    }

    public function setQtdPassagem3(?int $qtdPassagem3): void
    {
        $this->qtdPassagem3 = $qtdPassagem3;
    }
}