<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class EquipamentosRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/equipamentos' => [
                'controller' => 'EquipamentoController',
                'method' => 'index',
                'public' => true
            ],
            '/equipamentos/cadastros/grupos' => [
                'controller' => 'EquipamentoController',
                'method' => 'grupos',
                'public' => true
            ],
            '/equipamentos/cadastros/subgrupos' => [
                'controller' => 'EquipamentoController',
                'method' => 'subgrupos',
                'public' => true
            ],
            '/equipamentos/cadastros/classes' => [
                'controller' => 'EquipamentoController',
                'method' => 'classes',
                'public' => true
            ],
            '/equipamentos/cadastros/marcas' => [
                'controller' => 'EquipamentoController',
                'method' => 'marcas',
                'public' => true
            ],
            '/equipamentos/cadastros/modelos' => [
                'controller' => 'EquipamentoController',
                'method' => 'modelos',
                'public' => true
            ],
            '/equipamentos/cadastros/situacoes' => [
                'controller' => 'EquipamentoController',
                'method' => 'situacoes',
                'public' => true
            ],
        ];
    }
}
