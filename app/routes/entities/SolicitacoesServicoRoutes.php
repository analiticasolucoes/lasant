<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class SolicitacoesServicoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/solicitacoes-servico' => [
                'controller' => 'SolicitacaoServicoController',
                'method' => 'index',
                'public' => true
            ],
            '/solicitacoes-servico/lote' => [
                'controller' => 'SolicitacaoServicoController',
                'method' => 'lote',
                'public' => true
            ],
        ];
    }
}