<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class UsuariosRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/usuarios' => [
                'controller' => 'UsuarioController',
                'method' => 'index',
                'public' => true
            ],
            '/usuarios/novo' => [
                'controller' => 'UsuarioController',
                'method' => 'new',
                'public' => true
            ],
            '/usuarios/incluir' => [
                'controller' => 'UsuarioController',
                'method' => 'add',
                'public' => true
            ],
            '/usuarios/detalhe' => [
                'controller' => 'UsuarioController',
                'method' => 'show',
                'public' => true
            ],
        ];
    }
}