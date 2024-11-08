<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class RelatoriosRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/relatorios/administracao' => [
                'controller' => 'RelatorioController',
                'method' => 'show',
                'public' => true
            ],
            '/relatorios/engenharia' => [
                'controller' => 'RelatorioController',
                'method' => 'show',
                'public' => true
            ],
            '/relatorios/faturamento' => [
                'controller' => 'RelatorioController',
                'method' => 'show',
                'public' => true
            ],
            '/relatorios/refrigeracao' => [
                'controller' => 'RelatorioController',
                'method' => 'show',
                'public' => true
            ],
            '/cadastros-gerais/relatorios/novo' => [
                'controller' => 'RelatorioController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/relatorios/atualizar' => [
                'controller' => 'RelatorioController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/relatorios/excluir' => [
                'controller' => 'RelatorioController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}