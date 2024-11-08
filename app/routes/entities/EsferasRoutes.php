<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class EsferasRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/cadastros-gerais/esferas/novo' => [
                'controller' => 'EsferaController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/esferas/atualizar' => [
                'controller' => 'EsferaController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/esferas/excluir' => [
                'controller' => 'EsferaController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}