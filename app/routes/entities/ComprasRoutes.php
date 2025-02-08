<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ComprasRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/compras/novo' => [
                'controller' => 'CompraController',
                'method' => 'new',
                'public' => true
            ],
            '/compras/incluir' => [
                'controller' => 'CompraController',
                'method' => 'add',
                'public' => true
            ],
            '/compras' => [
                'controller' => 'CompraController',
                'method' => 'list',
                'public' => true
            ],
            '/compras/solicitacoes/pesquisa' => [
                'controller' => 'CompraController',
                'method' => 'search',
                'public' => true
            ],
            '/compras/solicitacoes/detalhe' => [
                'controller' => 'CompraController',
                'method' => 'show',
                'public' => true
            ],
            '/compras/solicitacoes/pedido/impressao' => [
                'controller' => 'CompraController',
                'method' => 'print',
                'public' => true
            ],
        ];
    }
}