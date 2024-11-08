<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class EstoquesRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/estoques' => [
                'controller' => 'EstoqueController',
                'method' => 'index',
                'public' => true
            ],
            '/estoques/movimentar' => [
                'controller' => 'EstoqueController',
                'method' => 'move',
                'public' => true
            ],
            '/estoques/entradas' => [
                'controller' => 'EstoqueController',
                'method' => 'entradas',
                'public' => true
            ],
            '/estoques/entradas/novo' => [
                'controller' => 'EstoqueController',
                'method' => 'newEntrada',
                'public' => true
            ],
        ];
    }
}