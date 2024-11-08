<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class PlanosManutencaoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/planos-manutencao' => [
                'controller' => 'PlanoManutencaoController',
                'method' => 'index',
                'public' => true
            ],
            '/planos-manutencao/novo' => [
                'controller' => 'PlanoManutencaoController',
                'method' => 'new',
                'public' => true
            ],
        ];
    }
}