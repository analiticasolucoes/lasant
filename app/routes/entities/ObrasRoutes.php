<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ObrasRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/obras' => [
                'controller' => 'ObraController',
                'method' => 'index',
                'public' => true
            ],
            '/obras/novo' => [
                'controller' => 'ObraController',
                'method' => 'new',
                'public' => true
            ],
            '/obras/responsaveis-tecnicos' => [
                'controller' => 'ObraController',
                'method' => 'responsaveis',
                'public' => true
            ],
            '/obras/borderos' => [
                'controller' => 'ObraController',
                'method' => 'borderos',
                'public' => true
            ],
        ];
    }
}