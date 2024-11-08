<?php

namespace App\Models;

enum TipoRelatorio: int {
    case Administracao = 1;
    case Engenharia = 2;
    case Faturamento = 3;
    case Cliente = 4;
    case Refrigeracao = 5;

    public function getLabel(): string {
        return match($this) {
            self::Administracao => 'Administração',
            self::Engenharia => 'Engenharia',
            self::Faturamento => 'Faturamento',
            self::Cliente => 'Cliente',
            self::Refrigeracao => 'Refrigeração',
        };
    }
}

enum TipoRelatorioNum: int {
    case CampoLivre = 1;
    case Data = 2;
    case Select = 3;

    public function getLabel(): string {
        return match($this) {
            self::CampoLivre => 'Campo Livre',
            self::Data => 'Data',
            self::Select => 'Select',
        };
    }
}

class Relatorio
{
    private int $id;
    private string $nome;
    private ?cliente $tipo;
    private string $caminho;
    private string $p1;
    private int $tipo1;
    private string $tabela1;
    private string $coluna1;
    private ?string $nome1;
    private string $p2;
    private int $tipo2;
    private string $tabela2;
    private string $coluna2;
    private ?string $nome2;
    private string $p3;
    private int $tipo3;
    private string $tabela3;
    private string $coluna3;
    private ?string $nome3;
    private string $p4;
    private int $tipo4;
    private string $tabela4;
    private string $coluna4;
    private ?string $nome4;
    private string $p5;
    private int $tipo5;
    private string $tabela5;
    private string $coluna5;
    private ?string $nome5;
    private string $p6;
    private int $tipo6;
    private string $tabela6;
    private string $coluna6;
    private ?string $nome6;

    public function __construct(
        cliente $id, string $nome, cliente $tipo, string $caminho,
        string  $p1, cliente $tipo1, string $tabela1, string $coluna1, ?string $nome1,
        string  $p2, cliente $tipo2, string $tabela2, string $coluna2, ?string $nome2,
        string  $p3, cliente $tipo3, string $tabela3, string $coluna3, ?string $nome3,
        string  $p4, cliente $tipo4, string $tabela4, string $coluna4, ?string $nome4,
        string  $p5, cliente $tipo5, string $tabela5, string $coluna5, ?string $nome5,
        string  $p6, cliente $tipo6, string $tabela6, string $coluna6, ?string $nome6
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->caminho = $caminho;
        $this->p1 = $p1;
        $this->tipo1 = $tipo1;
        $this->tabela1 = $tabela1;
        $this->coluna1 = $coluna1;
        $this->nome1 = $nome1;
        $this->p2 = $p2;
        $this->tipo2 = $tipo2;
        $this->tabela2 = $tabela2;
        $this->coluna2 = $coluna2;
        $this->nome2 = $nome2;
        $this->p3 = $p3;
        $this->tipo3 = $tipo3;
        $this->tabela3 = $tabela3;
        $this->coluna3 = $coluna3;
        $this->nome3 = $nome3;
        $this->p4 = $p4;
        $this->tipo4 = $tipo4;
        $this->tabela4 = $tabela4;
        $this->coluna4 = $coluna4;
        $this->nome4 = $nome4;
        $this->p5 = $p5;
        $this->tipo5 = $tipo5;
        $this->tabela5 = $tabela5;
        $this->coluna5 = $coluna5;
        $this->nome5 = $nome5;
        $this->p6 = $p6;
        $this->tipo6 = $tipo6;
        $this->tabela6 = $tabela6;
        $this->coluna6 = $coluna6;
        $this->nome6 = $nome6;
    }

    // Métodos getters e setters para cada propriedade

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getCaminho(): string
    {
        return $this->caminho;
    }

    public function setCaminho(string $caminho): void
    {
        $this->caminho = $caminho;
    }

    public function getP1(): string
    {
        return $this->p1;
    }

    public function setP1(string $p1): void
    {
        $this->p1 = $p1;
    }

    public function getTipo1(): int
    {
        return $this->tipo1;
    }

    public function setTipo1(int $tipo1): void
    {
        $this->tipo1 = $tipo1;
    }

    public function getTabela1(): string
    {
        return $this->tabela1;
    }

    public function setTabela1(string $tabela1): void
    {
        $this->tabela1 = $tabela1;
    }

    public function getColuna1(): string
    {
        return $this->coluna1;
    }

    public function setColuna1(string $coluna1): void
    {
        $this->coluna1 = $coluna1;
    }

    public function getNome1(): ?string
    {
        return $this->nome1;
    }

    public function setNome1(?string $nome1): void
    {
        $this->nome1 = $nome1;
    }

    public function getP2(): string
    {
        return $this->p2;
    }

    public function setP2(string $p2): void
    {
        $this->p2 = $p2;
    }

    public function getTipo2(): int
    {
        return $this->tipo2;
    }

    public function setTipo2(int $tipo2): void
    {
        $this->tipo2 = $tipo2;
    }

    public function getTabela2(): string
    {
        return $this->tabela2;
    }

    public function setTabela2(string $tabela2): void
    {
        $this->tabela2 = $tabela2;
    }

    public function getColuna2(): string
    {
        return $this->coluna2;
    }

    public function setColuna2(string $coluna2): void
    {
        $this->coluna2 = $coluna2;
    }

    public function getNome2(): ?string
    {
        return $this->nome2;
    }

    public function setNome2(?string $nome2): void
    {
        $this->nome2 = $nome2;
    }

    public function getP3(): string
    {
        return $this->p3;
    }

    public function setP3(string $p3): void
    {
        $this->p3 = $p3;
    }

    public function getTipo3(): int
    {
        return $this->tipo3;
    }

    public function setTipo3(int $tipo3): void
    {
        $this->tipo3 = $tipo3;
    }

    public function getTabela3(): string
    {
        return $this->tabela3;
    }

    public function setTabela3(string $tabela3): void
    {
        $this->tabela3 = $tabela3;
    }

    public function getColuna3(): string
    {
        return $this->coluna3;
    }

    public function setColuna3(string $coluna3): void
    {
        $this->coluna3 = $coluna3;
    }

    public function getNome3(): ?string
    {
        return $this->nome3;
    }

    public function setNome3(?string $nome3): void
    {
        $this->nome3 = $nome3;
    }

    public function getP4(): string
    {
        return $this->p4;
    }

    public function setP4(string $p4): void
    {
        $this->p4 = $p4;
    }

    public function getTipo4(): int
    {
        return $this->tipo4;
    }

    public function setTipo4(int $tipo4): void
    {
        $this->tipo4 = $tipo4;
    }

    public function getTabela4(): string
    {
        return $this->tabela4;
    }

    public function setTabela4(string $tabela4): void
    {
        $this->tabela4 = $tabela4;
    }

    public function getColuna4(): string
    {
        return $this->coluna4;
    }

    public function setColuna4(string $coluna4): void
    {
        $this->coluna4 = $coluna4;
    }

    public function getNome4(): ?string
    {
        return $this->nome4;
    }

    public function setNome4(?string $nome4): void
    {
        $this->nome4 = $nome4;
    }

    public function getP5(): string
    {
        return $this->p5;
    }

    public function setP5(string $p5): void
    {
        $this->p5 = $p5;
    }

    public function getTipo5(): int
    {
        return $this->tipo5;
    }

    public function setTipo5(int $tipo5): void
    {
        $this->tipo5 = $tipo5;
    }

    public function getTabela5(): string
    {
        return $this->tabela5;
    }

    public function setTabela5(string $tabela5): void
    {
        $this->tabela5 = $tabela5;
    }

    public function getColuna5(): string
    {
        return $this->coluna5;
    }

    public function setColuna5(string $coluna5): void
    {
        $this->coluna5 = $coluna5;
    }

    public function getNome5(): ?string
    {
        return $this->nome5;
    }

    public function setNome5(?string $nome5): void
    {
        $this->nome5 = $nome5;
    }

    public function getP6(): string
    {
        return $this->p6;
    }

    public function setP6(string $p6): void
    {
        $this->p6 = $p6;
    }

    public function getTipo6(): int
    {
        return $this->tipo6;
    }

    public function setTipo6(int $tipo6): void
    {
        $this->tipo6 = $tipo6;
    }

    public function getTabela6(): string
    {
        return $this->tabela6;
    }

    public function setTabela6(string $tabela6): void
    {
        $this->tabela6 = $tabela6;
    }

    public function getColuna6(): string
    {
        return $this->coluna6;
    }

    public function setColuna6(string $coluna6): void
    {
        $this->coluna6 = $coluna6;
    }

    public function getNome6(): ?string
    {
        return $this->nome6;
    }

    public function setNome6(?string $nome6): void
    {
        $this->nome6 = $nome6;
    }

    public function getDescricaoTipo(int $tipo): string {
        $tipoRelatorio = TipoRelatorio::from($tipo);
        return $tipoRelatorio->getLabel();
    }

    public function getDescricaoTipoNum(int $tipo): string {
        $tipoRelatorio = TipoRelatorioNum::from($tipo);
        return $tipoRelatorio->getLabel();
    }
}