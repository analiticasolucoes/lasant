<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class PrioridadesRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/prioridades-os/novo' => [
                'controller' => 'PrioridadeOSController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/prioridades-os/atualizar' => [
                'controller' => 'PrioridadeOSController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/prioridades-os/excluir' => [
                'controller' => 'PrioridadeOSController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}