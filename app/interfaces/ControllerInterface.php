<?php

namespace App\Interfaces;

interface ControllerInterface
{

    /**
     * Metodo que processa a requisicao inicial e exibe a pagina de listagem da entidade
     * @param array $args
     * @return void
     */
    public function index(array $args = []): void;

    /**
     * Metodo que exibe o formulario para adicionar uma nova entidade
     * @param array $args
     * @return void
     */
    public function new(array $args = []): void;

    /**
     * Metodo que processa a requisicao de formulario para adicionar nova entidade
     * @param array $args Contem os dados do formulario enviado
     * @return void
     */
    public function add(array $args = []): void;

    /**
     * Metodo que exibe a pagina com os detalhes de uma entidade
     * @param array $args
     * @return void
     */
    public function show(array $args = []): void;

    /**
     * Metodo que processa a requisicao para atualizacao de dados de uma entidade
     * @param array $args
     * @return void
     */
    public function alter(array $args = []): void;

    /**
     * Metodo que processa a requisicao para remover uma entidade
     * @param array $args
     * @return void
     */
    public function remove(array $args = []): void;

    /**
     * Metodo que exibe uma pagina de pesquisa
     * @param array $args
     * @return void
     */
    public function search(array $args = []): void;

    /**
     * Metodo que processa uma requisicao de pesquisa e evoca a view de resultados
     * @param array $args
     * @return void
     */
    public function list(array $args = []): void;
}