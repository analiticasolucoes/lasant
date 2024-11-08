<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ModelosImpressaoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/modelos-impressao/novo' => [
                'controller' => 'ModeloImpressaoController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/modelos-impressao/atualizar' => [
                'controller' => 'ModeloImpressaoController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/modelos-impressao/excluir' => [
                'controller' => 'ModeloImpressaoController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}