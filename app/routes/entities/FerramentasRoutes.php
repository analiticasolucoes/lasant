<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class FerramentasRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/ferramentas/novo' => [
                'controller' => 'FerramentaController',
                'method' => 'new',
                'public' => true
            ],
            '/ferramentas/atualizar' => [
                'controller' => 'FerramentaController',
                'method' => 'alter',
                'public' => true
            ],
            '/ferramentas/excluir' => [
                'controller' => 'FerramentaController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}