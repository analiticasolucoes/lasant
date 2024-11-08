<?php

namespace App\Controllers;

use App\Database\Database;
use App\interfaces\ControllerInterface;
use App\Repositories\UsuarioRepository;
use App\Views\ViewController;

class UsuarioController implements ControllerInterface
{
    private UsuarioRepository $usuarioRepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->usuarioRepository = new UsuarioRepository($conn);
        $this->view = new ViewController();
    }

    public function index(array $args = []): void
    {
        $usuarios = $this->usuarioRepository->all();
        $this->view->render('dashboard/acessos/usuarios/usuarios', ['usuarios' => $usuarios]);
    }

    public function new(array $args = []): void
    {
        $this->view->render('dashboard/acessos/usuarios/novo');
    }


    /**
     * Metodo que processa a requisicao de formulario para adicionar nova entidade
     * @param array $args Contem os dados do formulario enviado
     * @return void
     */
    public function add(array $args = []): void
    {
        if ($this->usuarioRepository->create($args)) {
            $this->index();
        }
    }

    public function show(array $args = []): void
    {
        $usuario = $this->usuarioRepository->find($args['id']);
        $this->view->render('dashboard/acessos/usuarios/detalhes', ['usuario' => $usuario]);
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
            $this->show(['id' => $usuario->getId()]);
        }
    }

    public function remove(array $args = []): void
    {
        $usuario = $this->usuarioRepository->find($args["id"]);
        if ($this->usuarioRepository->delete($usuario)) {
            $this->index();
        }
    }

    public function search(array $args = []): void
    {
        // TODO: Implement search() method.
    }

    public function list(array $args = []): void
    {
        // TODO: Implement list() method.
    }
}