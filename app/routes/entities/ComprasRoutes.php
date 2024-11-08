<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ComprasRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/compras/novo' => [
                'controller' => 'CompraController',
                'method' => 'new',
                'public' => true
            ],
            '/compras' => [
                'controller' => 'CompraController',
                'method' => 'list',
                'public' => true
            ],
            '/compras/levantamentos/novo' => [
                'controller' => 'CompraController',
                'method' => 'levantamento',
                'public' => true
            ],
            '/compras/levantamentos' => [
                'controller' => 'CompraController',
                'method' => 'levantamentoList',
                'public' => true
            ],
        ];
    }
}