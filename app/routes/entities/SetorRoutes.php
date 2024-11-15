<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class SetorRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/setores/detalhe' => [
                'controller' => 'SetorController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/setores/novo' => [
                'controller' => 'SetorController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/setores/incluir' => [
                'controller' => 'SetorController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/setores/atualizar' => [
                'controller' => 'SetorController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/setores/excluir' => [
                'controller' => 'SetorController',
                'method' => 'remove',
                'public' => true
            ],
            '/clientes/setores/ativar' => [
                'controller' => 'SetorController',
                'method' => 'active',
                'public' => true
            ],
            '/clientes/setores/desativar' => [
                'controller' => 'SetorController',
                'method' => 'disable',
                'public' => true
            ],
        ];
    }
}