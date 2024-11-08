<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class CategoriasRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/categorias/novo' => [
                'controller' => 'CategoriaController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/categorias/atualizar' => [
                'controller' => 'CategoriaController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/categorias/excluir' => [
                'controller' => 'CategoriaController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}