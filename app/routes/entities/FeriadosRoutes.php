<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class FeriadosRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/feriados/novo' => [
                'controller' => 'FeriadoController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/feriados/atualizar' => [
                'controller' => 'FeriadoController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/feriados/excluir' => [
                'controller' => 'FeriadoController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}