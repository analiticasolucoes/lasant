<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\RelatorioRepository;
use App\Views\ViewController;

class RelatorioController
{
    private RelatorioRepository $relatorioRepository;

    public function __construct(Database $conn)
    {
        $this->relatorioRepository = new RelatorioRepository($conn);
    }

    public function new(array $args): void
    {
        $data = [
            'nome_relatorio' => $args['nome'],
            'tipo_rel' => $args['tipo'],
            'caminho' => $args['caminho'],
            'p1' => $args['p1'],
            'tipo1' => $args['tipo1'],
            'tabela1' => $args['tabela1'],
            'coluna1' => $args['coluna1'],
            'nome1' => $args['nome1'],
            'p2' => $args['p2'],
            'tipo2' => $args['tipo2'],
            'tabela2' => $args['tabela2'],
            'coluna2' => $args['coluna2'],
            'nome2' => $args['nome2'],
            'p3' => $args['p3'],
            'tipo3' => $args['tipo3'],
            'tabela3' => $args['tabela3'],
            'coluna3' => $args['coluna3'],
            'nome3' => $args['nome3'],
            'p4' => $args['p4'],
            'tipo4' => $args['tipo4'],
            'tabela4' => $args['tabela4'],
            'coluna4' => $args['coluna4'],
            'nome4' => $args['nome4'],
            'p5' => $args['p5'],
            'tipo5' => $args['tipo5'],
            'tabela5' => $args['tabela5'],
            'coluna5' => $args['coluna5'],
            'nome5' => $args['nome5'],
            'p6' => $args['p6'],
            'tipo6' => $args['tipo6'],
            'tabela6' => $args['tabela6'],
            'coluna6' => $args['coluna6'],
            'nome6' => $args['nome6'],
        ];

        if ($this->relatorioRepository->create($data)) {
            header("Location: /cadastros-gerais/relatorios");
        }
        exit;
    }

    public function show(array $args = []): void
    {
        $view = new ViewController();
        $requestRoute = explode('/', $_SERVER['REQUEST_URI']);
        $value = 0;

        switch ($requestRoute[2]) {
            case 'administracao':
                $value = 1;
                break;
            case 'engenharia':
                $value = 2;
                break;
            case 'faturamento':
                $value = 3;
                break;
            case 'refrigeracao':
                $value = 4;
                break;
        }

        if($value)
            $relatorios = $this->relatorioRepository->findBy("tipo_rel", $value);
        else
            $relatorios = [];

        $view->render('dashboard/relatorios/relatorios', [
            'tipo' => $requestRoute[2],
            'relatorios' => $relatorios,
        ]);
    }

    public function alter(array $args): void
    {
        // Encontrar o relatório pelo ID
        $relatorio = $this->relatorioRepository->find($args['id']);

        if (!$relatorio) {
            // Tratamento de erro se o relatório não for encontrado
            header("Location: /erro");
            exit;
        }

        // Atualizar as propriedades do relatório com os novos valores dos argumentos
        $relatorio->setNome($args['nome']);
        $relatorio->setTipo($args['tipo']);
        $relatorio->setCaminho($args['caminho']);
        $relatorio->setP1($args['p1']);
        $relatorio->setTipo1($args['tipo1']);
        $relatorio->setTabela1($args['tabela1']);
        $relatorio->setColuna1($args['coluna1']);
        $relatorio->setNome1($args['nome1']);
        $relatorio->setP2($args['p2']);
        $relatorio->setTipo2($args['tipo2']);
        $relatorio->setTabela2($args['tabela2']);
        $relatorio->setColuna2($args['coluna2']);
        $relatorio->setNome2($args['nome2']);
        $relatorio->setP3($args['p3']);
        $relatorio->setTipo3($args['tipo3']);
        $relatorio->setTabela3($args['tabela3']);
        $relatorio->setColuna3($args['coluna3']);
        $relatorio->setNome3($args['nome3']);
        $relatorio->setP4($args['p4']);
        $relatorio->setTipo4($args['tipo4']);
        $relatorio->setTabela4($args['tabela4']);
        $relatorio->setColuna4($args['coluna4']);
        $relatorio->setNome4($args['nome4']);
        $relatorio->setP5($args['p5']);
        $relatorio->setTipo5($args['tipo5']);
        $relatorio->setTabela5($args['tabela5']);
        $relatorio->setColuna5($args['coluna5']);
        $relatorio->setNome5($args['nome5']);
        $relatorio->setP6($args['p6']);
        $relatorio->setTipo6($args['tipo6']);
        $relatorio->setTabela6($args['tabela6']);
        $relatorio->setColuna6($args['coluna6']);
        $relatorio->setNome6($args['nome6']);

        // Atualizar o relatório no repositório
        if ($this->relatorioRepository->update($relatorio)) {
            header("Location: /cadastros-gerais/relatorios");
        }
        exit;
    }

    public function delete(array $args): void
    {
        $relatorio = $this->relatorioRepository->find($args['id']);

        if (!$relatorio) {
            // Tratamento de erro se a situação SS não for encontrada
            header("Location: /erro");
            exit;
        }

        if ($this->relatorioRepository->delete($relatorio)) {
            header("Location: /cadastros-gerais/relatorios");
        }
        exit;
    }
}