<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class SituacoesSSRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/situacoes-ss/novo' => [
                'controller' => 'SituacaoSSController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/situacoes-ss/atualizar' => [
                'controller' => 'SituacaoSSController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/situacoes-ss/excluir' => [
                'controller' => 'SituacaoSSController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}