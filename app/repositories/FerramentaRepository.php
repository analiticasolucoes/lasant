<?php

namespace App\Repositories;

use App\Models\Ferramenta;
use PDO;

class FerramentaRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Busca registros de Ferramenta com base em critérios dinâmicos.
     *
     * @param array $criteria Um array associativo onde as chaves são os nomes dos campos e os valores são os critérios de busca.
     * @return Ferramenta[] Retorna um array de objetos Ferramenta que correspondem aos critérios.
     */
    public function findBy(array $criteria): array
    {
        $sql = "SELECT * FROM ta_ferramenta WHERE ";
        $params = [];
        $conditions = [];

        foreach ($criteria as $field => $value) {
            $conditions[] = "$field = :$field";
            $params[":$field"] = $value;
        }

        $sql .= implode(' AND ', $conditions);
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $ferramentaList = [];

        foreach ($results as $row) {
            $ferramenta = new Ferramenta(
                $row['id'],
                $row['id_ferramentaSituacao'],
                $row['nm_ferramenta'],
                $row['ds_ferramenta'],
                $row['serie'],
                $row['nu_patrimonial'],
                $row['voltagem_ferramenta'],
                $row['peso'],
                $row['potencia'],
                $row['valor'],
                new \DateTime($row['dt_aquisicao']),
                $row['foto1'],
                $row['foto2'],
                $row['status'],
                $row['id_profissional']
            );
            $ferramentaList[] = $ferramenta;
        }

        return $ferramentaList;
    }
}