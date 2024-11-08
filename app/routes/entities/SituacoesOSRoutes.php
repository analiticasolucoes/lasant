<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class SituacoesOSRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/situacoes-os/novo' => [
                'controller' => 'SituacaoOSController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/situacoes-os/atualizar' => [
                'controller' => 'SituacaoOSController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/situacoes-os/excluir' => [
                'controller' => 'SituacaoOSController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}