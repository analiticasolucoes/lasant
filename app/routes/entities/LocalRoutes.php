<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class LocalRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/locais/detalhe' => [
                'controller' => 'LocalController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/locais/novo' => [
                'controller' => 'LocalController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/locais/incluir' => [
                'controller' => 'LocalController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/locais/atualizar' => [
                'controller' => 'LocalController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/locais/excluir' => [
                'controller' => 'LocalController',
                'method' => 'remove',
                'public' => true
            ],
        ];
    }
}