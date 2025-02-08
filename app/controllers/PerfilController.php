<?php

namespace App\Controllers;

use App\Database\Database;
use App\Interfaces\ControllerInterface;
use App\Repositories\UsuarioRepository;
use App\views\ViewController;

class PerfilController implements ControllerInterface
{
    const FOTOS_FOLDER = DIRECTORY_SEPARATOR . "storage" . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . "photo" . DIRECTORY_SEPARATOR;
    private Database $conn;

    private ViewController $view;
    private UsuarioRepository $usuarioRepository;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
    }

    /**
     * @inheritDoc
     */
    public function index(array $args = []): void
    {
        // TODO: Implement index() method.
    }

    /**
     * @inheritDoc
     */
    public function new(array $args = []): void
    {
        // TODO: Implement new() method.
    }

    /**
     * @inheritDoc
     */
    public function add(array $args = []): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    public function show(array $args = []): void
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function alter(array $args = []): void
    {
        if (!empty($_FILES) && $_FILES['foto']['error'] === 0) {
            $newFileName = $this->generateFileName($_FILES['foto']['name']);

            if (!move_uploaded_file($_FILES['foto']['tmp_name'], ".." . $newFileName)) {
                $this->view->render('error', [
                    "httpResponseCode" => 500,
                    "title" => "Erro: Atualizar Perfil",
                    "message" => "Erro ao atualizar a foto de perfil! Não foi possível mover o arquivo."
                ]);
            } else {
                $this->usuarioRepository = new UsuarioRepository($this->conn);
                $usuario = $this->usuarioRepository->find((int)$_SESSION["usuarioID"]);
                if (!$usuario) {
                    $this->view->render('error', [
                        "httpResponseCode" => 500,
                        "title" => "Erro: Atualizar Perfil",
                        "message" => "Erro ao atualizar a foto de perfil! Usuário não encontrado."
                    ]);
                }
                $usuario->setFoto(basename($newFileName));
                if(!$this->usuarioRepository->update($usuario)) {
                    $this->view->render('error', [
                        "httpResponseCode" => 500,
                        "title" => "Erro: Atualizar Perfil",
                        "message" => "Erro ao atualizar a foto de perfil! Falha ao atualizar dados do usuário."
                    ]);
                }
            }
        }
        if(!empty($args) && $args['nova-senha'] !== "" && $args['confirma-senha'] !== "") {
            $this->usuarioRepository = new UsuarioRepository($this->conn);
            $usuario = $this->usuarioRepository->find((int)$_SESSION["usuarioID"]);
            if (!$usuario) {
                $this->view->render('error', [
                    "httpResponseCode" => 500,
                    "title" => "Erro: Atualizar Perfil",
                    "message" => "Erro ao atualizar a senha! Usuário não encontrado."
                ]);
            }
            $usuario->setSenha($args['nova-senha']);
            if(!$this->usuarioRepository->update($usuario)) {
                $this->view->render('error', [
                    "httpResponseCode" => 500,
                    "title" => "Erro: Atualizar Perfil",
                    "message" => "Erro ao atualizar a senha! Usuário não encontrado."
                ]);
            }
            $_SESSION['senha'] = $usuario->getSenha();
        }
        header("Location: /perfil");
        exit;
    }

    /**
     * @inheritDoc
     */
    public function remove(array $args = []): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function search(array $args = []): void
    {
        // TODO: Implement search() method.
    }

    /**
     * @inheritDoc
     */
    public function list(array $args = []): void
    {
        // TODO: Implement list() method.
    }

    public function getPhoto(array $args = []): void
    {
        // Caminho físico do diretório onde estão as imagens de perfil
        $caminhoImagem = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . self::FOTOS_FOLDER . basename($args['file']);
        if (!file_exists($caminhoImagem)) {
            $caminhoImagem = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "public_html" . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "dist" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "avatar.png";
        }
        // Define o cabeçalho de conteúdo para imagem e lê o arquivo
        header("Content-Type: image/jpeg"); // Ou ajuste para o tipo correto
        readfile($caminhoImagem);
        exit;
    }

    private function generateFileName(string $fileName): string
    {
        $temp = substr(md5(uniqid(time())), 0, 10);
        $array = explode('.', $fileName);
        $extensao = strtolower(end($array));
        $cod = self::FOTOS_FOLDER . date('dmy') . '-' . $temp . '.' . $extensao;
        return self::FOTOS_FOLDER . basename($cod);
    }
}