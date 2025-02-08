<?php

namespace App\Models;

use Exception;

class PrivilegioAcesso
{
    private int $id;
    private int $idUsuario;
    private int $master;

    private int $cargoVisualizacao;
    private int $cargoCadastro;
    private int $cargoEdicao;
    private int $cargoExclusao;

    private ?int $clientesVisualizacao;
    private ?int $clientesCadastro;
    private ?int $clientesEdicao;
    private ?int $clientesExclusao;

    private ?int $solicitacoesVisualizacao;
    private ?int $solicitacoesCadastro;
    private ?int $solicitacoesEdicao;
    private ?int $solicitacoesExclusao;

    private ?int $levantamentosVisualizacao;
    private ?int $levantamentosCadastro;
    private ?int $levantamentosEdicao;
    private ?int $levantamentosExclusao;

    private int $modelosImpressaoVisualizacao;
    private int $modelosImpressaoCadastro;
    private int $modelosImpressaoEdicao;
    private int $modelosImpressaoExclusao;

    private int $formasPagamentoVisualizacao;
    private int $formasPagamentoCadastro;
    private int $formasPagamentoEdicao;
    private int $formasPagamentoExclusao;

    private int $ferramentasVisualizacao;
    private int $ferramentasCadastro;
    private int $ferramentasEdicao;
    private int $ferramentasExclusao;

    private int $planosManutencaoVisualizacao;
    private int $planosManutencaoCadastro;
    private int $planosManutencaoEdicao;
    private int $planosManutencaoExclusao;

    private int $operadoresVisualizacao;
    private int $operadoresCadastro;
    private int $operadoresEdicao;
    private int $operadoresExclusao;

    private int $caixinhasVisualizacao;
    private int $caixinhasCadastro;
    private int $caixinhasEdicao;
    private int $caixinhasExclusao;

    /**
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        $prefix = substr($method, 0, 3);
        $property = lcfirst(substr($method, 3));

        if ($prefix === 'get' && property_exists($this, $property)) {
            return $this->$property;
        } elseif ($prefix === 'set' && property_exists($this, $property)) {
            $this->$property = $arguments[0];
            return $this;
        }

        throw new Exception("Método {$method} não encontrado");
    }
}