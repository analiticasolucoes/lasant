<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class CategoriasServicoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/categorias-servicos/novo' => [
                'controller' => 'CategoriaServicoController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/categorias-servicos/atualizar' => [
                'controller' => 'CategoriaServicoController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/categorias-servicos/excluir' => [
                'controller' => 'CategoriaServicoController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}