<?php

namespace App\services;

class Ordenator
{
    /**
     * @param array $array Elemento array a ser ordenado
     * @param string $propriedade Propriedade (metodo) a ser utilizado na comparacao de ordenacao
     * @param string $ordem Define ordem ascendente caso nao informado ou descentende quando informado o prefixo 'desc'
     * @return array Retorna o array ordenado
     */
    public static function orderBy(array $array, string $propriedade, string $ordem = 'asc'): array
    {
        usort($array, function($a, $b) use ($propriedade, $ordem) {
            $valorA = $a->$propriedade();
            $valorB = $b->$propriedade();

            // Normalizar para strings para garantir comparação correta
            $valorA = (string) $valorA;
            $valorB = (string) $valorB;

            if ($ordem === 'asc') {
                return strcmp($valorA, $valorB);
            } else {
                return strcmp($valorB, $valorA);
            }
        });

        return $array;
    }
}