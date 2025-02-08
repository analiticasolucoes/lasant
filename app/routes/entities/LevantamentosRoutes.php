<?php

namespace App\Routes\Entities;

use App\interfaces\RoutesInterface;

class LevantamentosRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [

            '/compras/levantamentos/novo' => [
                'controller' => 'LevantamentoController',
                'method' => 'new',
                'public' => true
            ],
            '/compras/levantamentos/incluir' => [
                'controller' => 'LevantamentoController',
                'method' => 'add',
                'public' => true
            ],
            '/compras/levantamentos' => [
                'controller' => 'LevantamentoController',
                'method' => 'list',
                'public' => true
            ],
        ];
    }
}