<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\MaterialSCORepository;
use App\Views\ViewController;

class MaterialSCOController
{
    private MaterialSCORepository $materialSCORepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->materialSCORepository = new MaterialSCORepository($conn);
        $this->view = new ViewController();
    }

    public function new(array $args): void
    {
        if ($this->materialSCORepository->create($args))
            header("Location: /material-sco");
        exit;
    }

    public function alter(array $args): void
    {
        $valor = floatval(str_replace(",", ".", str_replace(".", "", $args["valor"])));

        if($this->materialSCORepository->updateValor($valor, $args)) {
            $this->view->render('dashboard/materiais/materiais-sco-atualizar-valor', [
                "acao" => "pesquisa",
                "criterios" => $args,
            ]);
        } else {
            echo"<h1>ERRO AO ATUALIZAR O VALOR DO MATERIAL</h1>";
        }
        var_dump($valor);
        var_dump($args);die;
    }

    public function view(int $id): void
    {
        $materialSCO = $this->materialSCORepository->find($id);
        $this->view->render('materialSCO/view', ['materialSCO' => $materialSCO]);
    }

    public function search(array $args): void
    {
        $materiais = [];

        if (!empty($args['cod-referencia'])) {
            $result = $this->materialSCORepository->findByCodigo($args['cod-referencia']);
            if (!empty($result)) {
                $materiais[0] = $result[0];
            }
        }

        if (!empty($args['descricao'])) {
            $result = $this->materialSCORepository->findByDescricao($args['descricao']);
            if (!empty($result)) {
                $materiais[0] = $result[0];
            }
        }

        $filtrados = $this->removeMaterialByDate($materiais, $args['mes'], $args['ano']);
        if (!empty($filtrados)) {
            $materiais[0] = $filtrados[0];
        }

        $this->view->render('dashboard/materiais/' . $args['page-search'], [
            "acao" => "resultado",
            "criterios" => $args,
            "materiaisSCO" => $materiais
        ]);
    }

    private function removeMaterialByDate(array $materiais, string $mes, string $ano): array
    {
        foreach ($materiais as $materialKey => $material) {
            $tempI0SCO = $material->getI0SCO();
            foreach ($tempI0SCO as $key => $i0SCO) {
                if ($i0SCO->getMes() !== $mes || $i0SCO->getAno() !== $ano) {
                    unset($tempI0SCO[$key]);
                }
            }
            if (!count($tempI0SCO)) {
                unset($materiais[$materialKey]);
            } else {
                $material->setI0SCO(array_values($tempI0SCO)); // Reindexando o array
            }
        }

        return array_values($materiais); // Reindexando o array
    }
}