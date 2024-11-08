<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class GruposMaterialRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/grupos-material/novo' => [
                'controller' => 'GrupoMaterialController',
                'method' => 'new',
                'public' => true
            ],
            '/materiais/grupos-material/atualizar' => [
                'controller' => 'GrupoMaterialController',
                'method' => 'alter',
                'public' => true
            ],
            '/materiais/grupos-material/excluir' => [
                'controller' => 'GrupoMaterialController',
                'method' => 'delete',
                'public' => true
            ],
        ];
    }
}