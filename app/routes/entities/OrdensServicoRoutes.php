<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class OrdensServicoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/ordens-servico' => [
                'controller' => 'OrdemServicoController',
                'method' => 'index',
                'public' => true
            ],
        ];
    }
}