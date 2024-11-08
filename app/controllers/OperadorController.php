<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\UsuarioRepository;
use App\Views\ViewController;

class OperadorController
{
    //private UsuarioRepository $usuarioRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        //$this->usuarioRepository = new UsuarioRepository($conn);
        $this->view = new ViewController();
    }

    public function index(array $args = []): void
    {
        $this->view->render('dashboard/acessos/operadores/operadores');
    }

    public function new(array $args = []): void
    {
        //if ($this->usuarioRepository->create($args)) {
            $this->view->render('dashboard/acessos/operadores/novo');
        //}
    }

    public function add(array $args = []): void
    {
        if ($this->usuarioRepository->create($args)) {
            $this->index();
        }
    }

    public function show(array $args = []): void
    {

        $this->view->render('dashboard/acessos/operadores/detalhe');
    }

    public function alter(array $args = []): void
    {
        $usuario = $this->usuarioRepository->find($args["id"]);
        $usuario->setNome($args['nome']);
        $usuario->setUsuario($args['usuario']);
        $usuario->setSenha($args['senha']);
        $usuario->setCodigo($args['codigo']);
        $usuario->setIdCliente($args['id_cliente']);
        $usuario->setAprovador($args['aprovador']);
        $usuario->setFoto($args['foto']);
        $usuario->setLimite($args['limite']);

        if ($this->usuarioRepository->update($usuario)) {
            header("Location: /cadastros-gerais/usuarios");
        }
    }

    public function remove(array $args = []): void
    {
        $usuario = $this->usuarioRepository->find($args["id"]);
        if ($this->usuarioRepository->delete($usuario)) {
            header("Location: /cadastros-gerais/usuarios");
        }
    }

    public function search(array $args = []): void
    {

    }

    public function list(array $args = []): void
    {

    }
}