<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{CargoRepository, ProfissionalRepository};
use App\Views\ViewController;

class ProfissionalController
{
    private ProfissionalRepository $profissionalRepository;
    private CargoRepository $cargoRepository;
    private ViewController $view;
    public function __construct(Database $conn)
    {
        $this->profissionalRepository = new ProfissionalRepository($conn);
        $this->cargoRepository = new CargoRepository($conn);
        $this->view = new ViewController($conn);
    }

    public function index(array $args = []): void
    {
        if(empty($args)) {
            $cargos = $this->cargoRepository->all();
            $this->view->render('dashboard/profissionais/novo', ["cargos" => $cargos]);
        } else {
            $this->new($args);
        }
    }

    public function new(array $args): void
    {
        if ($this->profissionalRepository->create($args)) {
            header("Location: /profissionais");
        }
    }

    public function alter(array $args): void
    {
        $profissional = $this->profissionalRepository->find($args["id"]);
        $profissional->setFolha("");
        $profissional->setIdAvaliacaoProfissional(0);
        $profissional->setNome($args['nome']);
        $profissional->setCPF($args['cpf']);
        $profissional->setDtNascimento($args['dt-nascimento']);
        $profissional->setTelefone($args['telefone']);
        $profissional->setStatus("Ativo");
        $profissional->setTamanhoCalcado($args['tamanho-calcado']);
        $profissional->setTamanhoCalca($args['tamanho-calca']);
        $profissional->setTamanhoCamisa($args['tamanho-camisa']);
        $profissional->setValorPassagem(floatval(str_replace(",", ".", str_replace(",", "", str_replace("R$ ", "", $args['valor-passagem'])))));
        $profissional->setValorPassagem1(floatval(str_replace(",", ".", str_replace(",", "", str_replace("R$ ", "", $args['valor-passagem1'])))));
        $profissional->setValorPassagem2(floatval(str_replace(",", ".", str_replace(",", "", str_replace("R$ ", "", $args['valor-passagem2'])))));
        $profissional->setValorPassagem3(floatval(str_replace(",", ".", str_replace(",", "", str_replace("R$ ", "", $args['valor-passagem3'])))));
        $profissional->setQtdPassagem((int) $args['qtd-passagem']);
        $profissional->setQtdPassagem1((int) $args['qtd-passagem1']);
        $profissional->setQtdPassagem2((int) $args['qtd-passagem2']);
        $profissional->setQtdPassagem3((int) $args['qtd-passagem3']);

        if ($this->profissionalRepository->update($profissional)) {
            header("Location: /profissionais");
        }
    }

    public function delete(array $args): void
    {
        $profissional = $this->profissionalRepository->find($args["id"]);
        if ($this->profissionalRepository->delete($profissional)) {
            header("Location: /profissionais");
        }
    }
}