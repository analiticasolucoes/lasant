<?php

namespace App\Models;

use Exception;

/**
 * Classe CotacaoFase
 *
 * Representa os atributos da tabela `tb_fases_cotacao`.
 */
class CotacaoFase
{
    private int $id;
    private ?int $cotacao;
    private ?int $situacao;
    private ?\DateTime $dtSituacao;
    private ?int $operador;

    public function __construct()
    {
        $this->id = 0;
        $this->cotacao = 0;
        $this->situacao = 0;
        $this->dtSituacao = new \DateTime();
        $this->operador = 0;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCotacao(): ?int
    {
        return $this->cotacao;
    }

    public function setCotacao(?int $cotacao): void
    {
        $this->cotacao = $cotacao;
    }

    public function getSituacao(): ?int
    {
        return $this->situacao;
    }

    public function setSituacao(?int $situacao): void
    {
        $this->situacao = $situacao;
    }

    public function getDtSituacao(): ?\DateTime
    {
        return $this->dtSituacao;
    }

    public function setDtSituacao(?\DateTime $dtSituacao): void
    {
        $this->dtSituacao = $dtSituacao;
    }

    public function getOperador(): ?int
    {
        return $this->operador;
    }

    public function setOperador(?int $operador): void
    {
        $this->operador = $operador;
    }
}