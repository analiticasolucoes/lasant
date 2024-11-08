<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class CaixinhasRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/caixinhas' => [
                'controller' => 'CaixinhaController',
                'method' => 'index',
                'public' => true
            ],
            '/caixinhas/novo' => [
                'controller' => 'CaixinhaController',
                'method' => 'new',
                'public' => true
            ],
            '/caixinhas/detalhe' => [
                'controller' => 'CaixinhaController',
                'method' => 'show',
                'public' => true
            ],
            '/caixinhas/atualizar' => [
                'controller' => 'CaixinhaController',
                'method' => 'alter',
                'public' => true
            ],
            '/caixinhas/excluir' => [
                'controller' => 'CaixinhaController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}
