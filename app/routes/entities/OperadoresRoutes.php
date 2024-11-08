<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class OperadoresRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/operadores' => [
                'controller' => 'OperadorController',
                'method' => 'index',
                'public' => true
            ],
            '/operadores/novo' => [
                'controller' => 'OperadorController',
                'method' => 'new',
                'public' => true
            ]
        ];
    }
}