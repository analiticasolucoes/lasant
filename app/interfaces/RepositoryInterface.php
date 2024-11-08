<?php

namespace App\Interfaces;

use App\Database\Database;

interface RepositoryInterface
{
    /**
     * Metodo construtor que recebe uma instancia estatica
     * de conexao com o banco de dados
     * @param Database $db
     * @return void
     */
    public function __construct(Database $db);

    /**
     * Cria um novo registro no banco de dados.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * Atualiza um registro existente identificado pelo ID.
     *
     * @param mixed $object
     * @return bool
     */
    public function update($object): bool;

    /**
     * Deleta um registro do banco de dados pelo ID.
     *
     * @param mixed $object
     * @return bool
     */
    public function delete($object): bool;

    /**
     * Retorna um registro pelo seu ID.
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * Retorna registros que correspondem a uma determinada condição.
     *
     * @param string $column
     * @param mixed $value
     * @return mixed
     */
    public function findBy(string $column, $value);

    /**
     * Retorna todos os registros do modelo.
     *
     * @return mixed
     */
    public function all();
}