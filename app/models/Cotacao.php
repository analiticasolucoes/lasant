<?php

namespace App\Models;

class Cotacao
{
    private ?int $id;
    private ?int $idCliente;
    private ?int $idClienteLocal;
    private ?DateTime $dtSolicitacao;
    private ?int $idOperador;
    private ?int $idSituacao;
    private ?int $idPrioridade;
    private ?int $idMaterialGrupo;
    private int $tipo;
    private ?string $observacoesReprovacao;
    private ?string $observacoes;
    private ?int $idLocalEntrega;
    private ?string $observacoesEntrega;

    public function __construct(
        ?int $id = null,
        ?int $idCliente = null,
        ?int $idClienteLocal = null,
        ?DateTime $dtSolicitacao = null,
        ?int $idOperador = null,
        ?int $idSituacao = null,
        ?int $idPrioridade = null,
        ?int $idMaterialGrupo = null,
        int $tipo = 0,
        ?string $observacoesReprovacao = null,
        ?string $observacoes = null,
        ?int $idLocalEntrega = null,
        ?string $observacoesEntrega = null
    ) {
        $this->id = $id;
        $this->idCliente = $idCliente;
        $this->idClienteLocal = $idClienteLocal;
        $this->dtSolicitacao = $dtSolicitacao;
        $this->idOperador = $idOperador;
        $this->idSituacao = $idSituacao;
        $this->idPrioridade = $idPrioridade;
        $this->idMaterialGrupo = $idMaterialGrupo;
        $this->tipo = $tipo;
        $this->observacoesReprovacao = $observacoesReprovacao;
        $this->observacoes = $observacoes;
        $this->idLocalEntrega = $idLocalEntrega;
        $this->observacoesEntrega = $observacoesEntrega;
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

    public function getIdCliente(): ?int
    {
        return $this->idCliente;
    }

    public function setIdCliente(?int $idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    public function getIdClienteLocal(): ?int
    {
        return $this->idClienteLocal;
    }

    public function setIdClienteLocal(?int $idClienteLocal): void
    {
        $this->idClienteLocal = $idClienteLocal;
    }

    public function getDtSolicitacao(): ?DateTime
    {
        return $this->dtSolicitacao;
    }

    public function setDtSolicitacao(?DateTime $dtSolicitacao): void
    {
        $this->dtSolicitacao = $dtSolicitacao;
    }

    public function getIdOperador(): ?int
    {
        return $this->idOperador;
    }

    public function setIdOperador(?int $idOperador): void
    {
        $this->idOperador = $idOperador;
    }

    public function getIdSituacao(): ?int
    {
        return $this->idSituacao;
    }

    public function setIdSituacao(?int $idSituacao): void
    {
        $this->idSituacao = $idSituacao;
    }

    public function getIdPrioridade(): ?int
    {
        return $this->idPrioridade;
    }

    public function setIdPrioridade(?int $idPrioridade): void
    {
        $this->idPrioridade = $idPrioridade;
    }

    public function getIdMaterialGrupo(): ?int
    {
        return $this->idMaterialGrupo;
    }

    public function setIdMaterialGrupo(?int $idMaterialGrupo): void
    {
        $this->idMaterialGrupo = $idMaterialGrupo;
    }

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getObservacoesReprovacao(): ?string
    {
        return $this->observacoesReprovacao;
    }

    public function setObservacoesReprovacao(?string $observacoesReprovacao): void
    {
        $this->observacoesReprovacao = $observacoesReprovacao;
    }

    public function getObservacoes(): ?string
    {
        return $this->observacoes;
    }

    public function setObservacoes(?string $observacoes): void
    {
        $this->observacoes = $observacoes;
    }

    public function getIdLocalEntrega(): ?int
    {
        return $this->idLocalEntrega;
    }

    public function setIdLocalEntrega(?int $idLocalEntrega): void
    {
        $this->idLocalEntrega = $idLocalEntrega;
    }

    public function getObservacoesEntrega(): ?string
    {
        return $this->observacoesEntrega;
    }

    public function setObservacoesEntrega(?string $observacoesEntrega): void
    {
        $this->observacoesEntrega = $observacoesEntrega;
    }
}
