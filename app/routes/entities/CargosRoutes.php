<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class CargosRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/cargos/novo' => [
                'controller' => 'CargoController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/cargos/atualizar' => [
                'controller' => 'CargoController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/cargos/excluir' => [
                'controller' => 'CargoController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}