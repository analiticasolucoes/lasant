<?php

namespace App\Controllers;

use App\Database\Database;
use App\interfaces\ControllerInterface;
use App\Models\PrivilegioAcesso;
use App\Models\Usuario;
use App\Repositories\ClienteRepository;
use App\Repositories\FornecedorRepository;
use App\Repositories\UsuarioRepository;
use App\Services\UploadArquivos;
use App\Views\ViewController;
use Exception;

class UsuarioController implements ControllerInterface
{
    const FOTOS_FOLDER = DIRECTORY_SEPARATOR . "storage" . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "photo";
    private UsuarioRepository $usuarioRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->usuarioRepository = new UsuarioRepository($conn);
        $this->view = new ViewController();
        $this->conn = $conn;
    }

    public function index(array $args = []): void
    {
        $usuarios = $this->usuarioRepository->all();
        $this->view->render('dashboard/acessos/usuarios/usuarios', ['usuarios' => $usuarios]);
    }

    public function new(array $args = []): void
    {
        $clienteRepository = new ClienteRepository($this->conn);
        $clientes = $clienteRepository->all();

        $fornecedorRepository = new FornecedorRepository($this->conn);
        $fornecedores = $fornecedorRepository->all();

        $this->view->render('dashboard/acessos/usuarios/novo', [
            'clientes' => $clientes,
            'fornecedores' => $fornecedores
        ]);
    }


    /**
     * Metodo que processa a requisicao de formulario para adicionar nova entidade
     * @param array $args Contem os dados do formulario enviado
     * @return void
     */
    public function add(array $args = []): void
    {
        $novoUsuario = new Usuario();

        $novoUsuario->setNome($args['nome']);
        $novoUsuario->setSenha($args['senha']);
        $novoUsuario->setUsuario($args['usuario']);
        $novoUsuario->setClientes($args['clientes']);
        $novoUsuario->setFornecedores($args['fornecedores']);

        // upload foto de perfil
        if(isset($_FILES) && $_FILES['foto']['error'] !== 4) {
            try {
                $caminhoArquivo = UploadArquivos::processarUpload(
                    $_FILES['foto'],
                    dirname(__DIR__, 2) . self::FOTOS_FOLDER,
                    null
                );
                $novoUsuario->setFoto(basename($caminhoArquivo));
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        //privilegios de acesso
        $privilegios = new PrivilegioAcesso();



        echo"<pre>";var_dump($args['privilegios'],$novoUsuario);echo"</pre>";die;
        if ($this->usuarioRepository->create($novoUsuario)) {
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
        $usuario->setClientes($args['id_cliente']);
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