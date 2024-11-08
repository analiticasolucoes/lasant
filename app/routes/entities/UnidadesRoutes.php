<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class UnidadesRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/unidades/novo' => [
                'controller' => 'UnidadeController',
                'method' => 'new',
                'public' => true
            ],
            '/materiais/unidades/atualizar' => [
                'controller' => 'UnidadeController',
                'method' => 'alter',
                'public' => true
            ],
            '/materiais/unidades/excluir' => [
                'controller' => 'UnidadeController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}