<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class ClassesMaterialRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/classes-material/novo' => [
                'controller' => 'ClasseMaterialController',
                'method' => 'new',
                'public' => true
            ],
            '/materiais/classes-material/atualizar' => [
                'controller' => 'ClasseMaterialController',
                'method' => 'alter',
                'public' => true
            ],
            '/materiais/classes-material/excluir' => [
                'controller' => 'ClasseMaterialController',
                'method' => 'delete',
                'public' => true
            ],
            '/materiais/classes-material/by-grupo' => [
                'controller' => 'ClasseMaterialController',
                'method' => 'listByGrupo',
                'public' => true
            ],
            '/materiais/classes-material/by-subgrupo' => [
                'controller' => 'ClasseMaterialController',
                'method' => 'listBySubgrupo',
                'public' => true
            ],
        ];
    }
}