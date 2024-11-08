<?php

namespace App\Models;

/**
 * Classe int
 *
 * Representa um int ou fornecedor do sistema.
 */
class Cliente
{
    private int $id;
    private int $tipo;
    private string $logomarca;
    private string $nomeEmpresa;
    private string $nomeFantasia;
    private string $descricao;
    private ?Esfera $esfera;
    private string $cnpj;
    private string $emailEngenharia;
    private string $emailOSCC;
    private string $emailOSBCC;
    private string $emailSSCC;
    private string $emailSSBCC;
    private string $dtInicioContrato;
    private string $logradouro;
    private string $numero;
    private string $complemento;
    private string $bairro;
    private string $cidade;
    private string $uf;
    private string $cep;
    private string $inscricaoEstadual;
    private string $inscricaoMunicipal;
    private string $telefone1;
    private string $telefone2;
    private string $telefone3;
    private string $telefoneCelular;
    private ?string $clifor;
    private int $modeloOS;
    private ?string $celulares;
    private ?string $emailCompras;
    private ?string $whatsapp;
    private ?string $smsAprova;
    private ?string $cap;

    public function __construct(
        ?int $id = 0,
        int $tipo = 0,
        string  $logomarca = '',
        string  $nomeEmpresa = '',
        string  $nomeFantasia = '',
        string  $descricao = '',
        ?Esfera $esfera = new Esfera(0, "", ""),
        string  $cnpj = '',
        string  $emailEngenharia = '',
        string  $emailOSCC = '',
        string  $emailOSBCC = '',
        string  $emailSSCC = '',
        string  $emailSSBCC = '',
        string  $dtInicioContrato = '',
        string  $rua = '',
        string  $numero = '',
        string $complemento = '',
        string $bairro = '',
        string  $cidade = '',
        string  $uf = '',
        string  $cep = '',
        string  $inscricaoEstadual = '',
        string  $inscricaoMunicipal = '',
        string  $telefone1 = '',
        string  $telefone2 = '',
        string  $telefone3 = '',
        string  $telefoneCelular = '',
        ?string $clifor = null,
        int $modeloOS = 0,
        ?string $celulares = null,
        ?string $emailCompras = null,
        ?string $whatsapp = null,
        ?string $smsAprova = null,
        ?string $cap = null
    ) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->logomarca = $logomarca;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->nomeFantasia = $nomeFantasia;
        $this->descricao = $descricao;
        $this->esfera = $esfera;
        $this->cnpj = $cnpj;
        $this->emailEngenharia = $emailEngenharia;
        $this->emailOSCC = $emailOSCC;
        $this->emailOSBCC = $emailOSBCC;
        $this->emailSSCC = $emailSSCC;
        $this->emailSSBCC = $emailSSBCC;
        $this->dtInicioContrato = $dtInicioContrato;
        $this->logradouro = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->cep = $cep;
        $this->inscricaoEstadual = $inscricaoEstadual;
        $this->inscricaoMunicipal = $inscricaoMunicipal;
        $this->telefone1 = $telefone1;
        $this->telefone2 = $telefone2;
        $this->telefone3 = $telefone3;
        $this->telefoneCelular = $telefoneCelular;
        $this->clifor = $clifor;
        $this->modeloOS = $modeloOS;
        $this->celulares = $celulares;
        $this->emailCompras = $emailCompras;
        $this->whatsapp = $whatsapp;
        $this->smsAprova = $smsAprova;
        $this->cap = $cap;
    }
    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getLogomarca(): string
    {
        return $this->logomarca;
    }

    public function setLogomarca(string $logomarca): void
    {
        $this->logomarca = $logomarca;
    }

    public function getNomeEmpresa(): string
    {
        return $this->nomeEmpresa;
    }

    public function setNomeEmpresa(string $nomeEmpresa): void
    {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    public function getNomeFantasia(): string
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia(string $nomeFantasia): void
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getEsfera(): Esfera
    {
        return $this->esfera;
    }

    public function setEsfera(?Esfera $esfera): void
    {
        $this->esfera = $esfera;
    }

    public function getCNPJ(): string
    {
        return $this->cnpj;
    }

    public function setCNPJ(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    public function getEmailEngenharia(): string
    {
        return $this->emailEngenharia;
    }

    public function setEmailEngenharia(string $emailEngenharia): void
    {
        $this->emailEngenharia = $emailEngenharia;
    }

    public function getEmailOSCC(): string
    {
        return $this->emailOSCC;
    }

    public function setEmailOSCC(string $emailOSCC): void
    {
        $this->emailOSCC = $emailOSCC;
    }

    public function getEmailOSBCC(): string
    {
        return $this->emailOSBCC;
    }

    public function setEmailOSBCC(string $emailOSBCC): void
    {
        $this->emailOSBCC = $emailOSBCC;
    }

    public function getEmailSSCC(): string
    {
        return $this->emailSSCC;
    }

    public function setEmailSSCC(string $emailSSCC): void
    {
        $this->emailSSCC = $emailSSCC;
    }

    public function getEmailSSBCC(): string
    {
        return $this->emailSSBCC;
    }

    public function setEmailSSBCC(string $emailSSBCC): void
    {
        $this->emailSSBCC = $emailSSBCC;
    }

    public function getDtInicioContrato(): string
    {
        return $this->dtInicioContrato;
    }

    public function setDtInicioContrato(string $dtInicioContrato): void
    {
        $this->dtInicioContrato = $dtInicioContrato;
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

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): void
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

    public function getUf(): string
    {
        return $this->uf;
    }

    public function setUf(string $uf): void
    {
        $this->uf = $uf;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getInscricaoEstadual(): string
    {
        return $this->inscricaoEstadual;
    }

    public function setInscricaoEstadual(string $inscricaoEstadual): void
    {
        $this->inscricaoEstadual = $inscricaoEstadual;
    }

    public function getInscricaoMunicipal(): string
    {
        return $this->inscricaoMunicipal;
    }

    public function setInscricaoMunicipal(string $inscricaoMunicipal): void
    {
        $this->inscricaoMunicipal = $inscricaoMunicipal;
    }

    public function getTelefone1(): string
    {
        return $this->telefone1;
    }

    public function setTelefone1(string $telefone1): void
    {
        $this->telefone1 = $telefone1;
    }

    public function getTelefone2(): string
    {
        return $this->telefone2;
    }

    public function setTelefone2(string $telefone2): void
    {
        $this->telefone2 = $telefone2;
    }

    public function getTelefone3(): string
    {
        return $this->telefone3;
    }

    public function setTelefone3(string $telefone3): void
    {
        $this->telefone3 = $telefone3;
    }

    public function getTelefoneCelular(): string
    {
        return $this->telefoneCelular;
    }

    public function setTelefoneCelular(string $telefoneCelular): void
    {
        $this->telefoneCelular = $telefoneCelular;
    }

    public function getClifor(): ?string
    {
        return $this->clifor;
    }

    public function setClifor(?string $clifor): void
    {
        $this->clifor = $clifor;
    }

    public function getModeloOS(): int
    {
        return $this->modeloOS;
    }

    public function setModeloOS(int $modeloOS): void
    {
        $this->modeloOS = $modeloOS;
    }

    public function getCelulares(): ?string
    {
        return $this->celulares;
    }

    public function setCelulares(?string $celulares): void
    {
        $this->celulares = $celulares;
    }

    public function getEmailCompras(): ?string
    {
        return $this->emailCompras;
    }

    public function setEmailCompras(?string $emailCompras): void
    {
        $this->emailCompras = $emailCompras;
    }

    public function getWhatsapp(): ?string
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(?string $whatsapp): void
    {
        $this->whatsapp = $whatsapp;
    }

    public function getSmsAprova(): ?string
    {
        return $this->smsAprova;
    }

    public function setSmsAprova(?string $smsAprova): void
    {
        $this->smsAprova = $smsAprova;
    }

    public function getCap(): ?string
    {
        return $this->cap;
    }

    public function setCap(?string $cap): void
    {
        $this->cap = $cap;
    }
}