<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class TiposOSRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/tipos-os/novo' => [
                'controller' => 'TipoOSController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/tipos-os/atualizar' => [
                'controller' => 'TipoOSController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/tipos-os/excluir' => [
                'controller' => 'TipoOSController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}