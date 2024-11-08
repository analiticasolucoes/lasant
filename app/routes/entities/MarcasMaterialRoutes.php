<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class MarcasMaterialRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/materiais/marcas-material/novo' => [
                'controller' => 'MarcaMaterialController',
                'method' => 'new',
                'public' => true
            ],
            '/materiais/marcas-material/atualizar' => [
                'controller' => 'MarcaMaterialController',
                'method' => 'alter',
                'public' => true
            ],
            '/materiais/marcas-material/excluir' => [
                'controller' => 'MarcaMaterialController',
                'method' => 'delete',
                'public' => true
            ],
            '/materiais/marcas-material/by-grupo' => [
                'controller' => 'MarcaMaterialController',
                'method' => 'listByGrupo',
                'public' => true
            ],
        ];
    }
}