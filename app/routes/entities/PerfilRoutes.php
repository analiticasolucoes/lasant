<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class PerfilRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/perfil' => [
                'controller' => 'DashboardController',
                'method' => 'perfil',
                'public' => true
            ],
            '/perfil/alterar' => [
                'controller' => 'PerfilController',
                'method' => 'alter',
                'public' => true
            ],
            '/perfil/foto' => [
                'controller' => 'PerfilController',
                'method' => 'getPhoto',
                'public' => true
            ],
        ];
    }
}