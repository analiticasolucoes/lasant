<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class SubgruposMaterialRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/subgrupos-material/novo' => [
                'controller' => 'SubGrupoMaterialController',
                'method' => 'new',
                'public' => true
            ],
            '/materiais/subgrupos-material/atualizar' => [
                'controller' => 'SubGrupoMaterialController',
                'method' => 'alter',
                'public' => true
            ],
            '/materiais/subgrupos-material/excluir' => [
                'controller' => 'SubGrupoMaterialController',
                'method' => 'delete',
                'public' => true
            ],
            '/materiais/subgrupos-material/by-grupo' => [
                'controller' => 'SubGrupoMaterialController',
                'method' => 'listByGrupo',
                'public' => true
            ],
        ];
    }
}