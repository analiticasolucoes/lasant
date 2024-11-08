<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class MateriaisSCORoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/materiais-sco/valor/atualizar' => [
                'controller' => 'DashboardController',
                'method' => 'materiaisSCOAtualizar',
                'public' => true
            ],
            '/materiais/materiais-sco/atualizar' => [
                'controller' => 'MaterialSCOController',
                'method' => 'alter',
                'public' => true
            ],
        ];
    }
}