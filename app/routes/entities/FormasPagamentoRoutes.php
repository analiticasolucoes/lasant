<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class FormasPagamentoRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/cadastros-gerais/formas-pagamento/novo' => [
                'controller' => 'FormaPagamentoController',
                'method' => 'new',
                'public' => true
            ],
            '/cadastros-gerais/formas-pagamento/atualizar' => [
                'controller' => 'FormaPagamentoController',
                'method' => 'alter',
                'public' => true
            ],
            '/cadastros-gerais/formas-pagamento/excluir' => [
                'controller' => 'FormaPagamentoController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}