<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class PavimentoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/pavimentos/detalhe' => [
                'controller' => 'PavimentoController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/pavimentos/novo' => [
                'controller' => 'PavimentoController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/pavimentos/incluir' => [
                'controller' => 'PavimentoController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/pavimentos/atualizar' => [
                'controller' => 'PavimentoController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/pavimentos/excluir' => [
                'controller' => 'PavimentoController',
                'method' => 'remove',
                'public' => true
            ],
            '/clientes/pavimentos/ativar' => [
                'controller' => 'PavimentoController',
                'method' => 'active',
                'public' => true
            ],
            '/clientes/pavimentos/desativar' => [
                'controller' => 'PavimentoController',
                'method' => 'disable',
                'public' => true
            ],
        ];
    }
}