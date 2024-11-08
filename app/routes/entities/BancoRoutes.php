<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class BancoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/informacoes-financeiras/incluir' => [
                'controller' => 'BancoController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/informacoes-financeiras/atualizar' => [
                'controller' => 'BancoController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/informacoes-financeiras/excluir' => [
                'controller' => 'BancoController',
                'method' => 'remove',
                'public' => true
            ],
        ];
    }
}