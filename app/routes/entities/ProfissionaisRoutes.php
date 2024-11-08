<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ProfissionaisRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/profissionais/novo' => [
                'controller' => 'ProfissionalController',
                'method' => 'index',
                'public' => true
            ],
            '/profissionais/atualizar' => [
                'controller' => 'ProfissionalController',
                'method' => 'alter',
                'public' => true
            ],
            '/profissionais/excluir' => [
                'controller' => 'ProfissionalController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}