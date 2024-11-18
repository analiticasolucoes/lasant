<?php

namespace App\Routes\Entities;

use App\Interfaces\RoutesInterface;

class ClienteHasProfissionalRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/clientes/profissionais/detalhe' => [
                'controller' => 'ClienteHasProfissionalController',
                'method' => 'show',
                'public' => true
            ],
            '/clientes/profissionais/novo' => [
                'controller' => 'ClienteHasProfissionalController',
                'method' => 'new',
                'public' => true
            ],
            '/clientes/profissionais/incluir' => [
                'controller' => 'ClienteHasProfissionalController',
                'method' => 'add',
                'public' => true
            ],
            '/clientes/profissionais/atualizar' => [
                'controller' => 'ClienteHasProfissionalController',
                'method' => 'alter',
                'public' => true
            ],
            '/clientes/profissionais/excluir' => [
                'controller' => 'ClienteHasProfissionalController',
                'method' => 'remove',
                'public' => true
            ]
        ];
    }
}