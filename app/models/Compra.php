<?php

namespace App\Models;

use Exception;

/**
 * Classe Compra
 *
 * Representa os atributos da tabela `tb_cotacao`.
 */
class Compra
{
    private int $id;
    private ?Cliente $cliente;
    private ?Local $local;
    private ?\DateTime $dtSolicitacao;
    private ?int $idOperador;
    private ?SituacaoCotacao $situacao;
    private ?PrioridadeCompra $prioridade;
    private ?GrupoMaterial $grupoMaterial;
    private int $tipo;
    private ?string $observacoesReprovacao;
    private ?string $observacoes;
    private ?LocalEntrega $localEntrega;
    private ?string $observacoesEntrega;

    public function __construct()
    {
        $this->id = 0;
        $this->cliente = new Cliente();
        $this->local = new Local();
        $this->dtSolicitacao = new \DateTime();
        $this->idOperador = null;
        $this->situacao = new SituacaoCotacao();
        $this->prioridade = new PrioridadeCompra();
        $this->grupoMaterial = new GrupoMaterial();
        $this->tipo = 0;
        $this->observacoesReprovacao = null;
        $this->observacoes = null;
        $this->localEntrega = new LocalEntrega();
        $this->observacoesEntrega = null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getLocal(): ?Local
    {
        return $this->local;
    }

    public function setLocal(?Local $local): void
    {
        $this->local = $local;
    }

    public function getDtSolicitacao(): ?\DateTime
    {
        return $this->dtSolicitacao;
    }

    public function setDtSolicitacao(?\DateTime $dtSolicitacao): void
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

    public function getSituacao(): ?SituacaoCotacao
    {
        return $this->situacao;
    }

    public function setSituacao(?SituacaoCotacao $situacao): void
    {
        $this->situacao = $situacao;
    }

    public function getPrioridade(): ?PrioridadeCompra
    {
        return $this->prioridade;
    }

    public function setPrioridade(?PrioridadeCompra $prioridade): void
    {
        $this->prioridade = $prioridade;
    }

    public function getGrupoMaterial(): ?GrupoMaterial
    {
        return $this->grupoMaterial;
    }

    public function setGrupoMaterial(?GrupoMaterial $grupoMaterial): void
    {
        $this->grupoMaterial = $grupoMaterial;
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

    public function getLocalEntrega(): ?LocalEntrega
    {
        return $this->localEntrega;
    }

    public function setLocalEntrega(?LocalEntrega $localEntrega): void
    {
        $this->localEntrega = $localEntrega;
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