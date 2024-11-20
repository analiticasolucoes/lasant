<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class ContratoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/contratos/detalhe' => [
                'controller' => 'ContratoController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/contratos/novo' => [
                'controller' => 'ContratoController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/contratos/incluir' => [
                'controller' => 'ContratoController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/contratos/atualizar' => [
                'controller' => 'ContratoController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/contratos/excluir' => [
                'controller' => 'ContratoController',
                'method' => 'remove',
                'public' => true
            ],
        ];
    }
}