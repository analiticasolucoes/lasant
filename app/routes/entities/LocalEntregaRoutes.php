<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class LocalEntregaRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/locais-entrega/detalhe' => [
                'controller' => 'LocalEntregaController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/locais-entrega/novo' => [
                'controller' => 'LocalEntregaController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/locais-entrega/incluir' => [
                'controller' => 'LocalEntregaController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/locais-entrega/atualizar' => [
                'controller' => 'LocalEntregaController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/locais-entrega/excluir' => [
                'controller' => 'LocalEntregaController',
                'method' => 'remove',
                'public' => true
            ],
        ];
    }
}