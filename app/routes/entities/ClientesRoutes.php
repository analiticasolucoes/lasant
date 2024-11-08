<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ClientesRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/clientes/novo' => [
                'controller' => 'ClienteController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/incluir' => [
                'controller' => 'ClienteController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/detalhe' => [
                'controller' => 'ClienteController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/atualizar' => [
                'controller' => 'ClienteController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/excluir' => [
                'controller' => 'ClienteController',
                'method' => 'delete',
                'public' => true
            ]
        ];
    }
}
