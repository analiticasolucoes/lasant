<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class MateriaisRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/materiais/novo' => [
                'controller' => 'MaterialController',
                'method' => 'new',
                'public' => true
            ],
            '/materiais/materiais/atualizar' => [
                'controller' => 'MaterialController',
                'method' => 'alter',
                'public' => true
            ],
            '/materiais/materiais/excluir' => [
                'controller' => 'MaterialController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}