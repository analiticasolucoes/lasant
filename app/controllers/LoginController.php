<?php

namespace App\Controllers;

use App\Database\Database;
use App\Models\Endereco;
use App\Models\Teste;
use App\Repositories\Repository;
use App\Repositories\RepositoryTest;
use App\Repositories\UsuarioRepository;
use App\Services\Session;
use App\Views\ViewController;

class LoginController {
    private UsuarioRepository $userRepository;
    private ViewController $view;
    private Database $conn;
    /**
     * Construtor da classe LoginController.
     * Inicializa o repositório de usuários utilizando a conexão fornecida.
     * Instancia um objeto do tipo ViewController para renderizar as views.
     * @param \PDO $conn Conexão com o banco de dados.
     */
    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->userRepository = new UsuarioRepository($conn);
        $this->view = new ViewController();
    }

    /**
     * Exibe a página de login.
     * Renderiza a view da página de login.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render('login');
    }

    /**
     * Processa o login de um usuário.
     *
     * Este metodo recebe os dados de um formulário, sanitiza e valida o email e a senha,
     * autentica o usuário e, em caso de sucesso, configura as sessões e redireciona o usuário
     * para a página correspondente ao seu perfil. Se a autenticação falhar, o usuário é redirecionado
     * para a página inicial.
     *
     * @param array $form Dados do formulário de login, contendo os campos 'email' e 'senha'.
     *
     * @return void
     */
    public function login(array $args): void
    {
        $test = new RepositoryTest($this->conn);

        // Executar os testes
        $test->testCreate();
        $test->testUpdate();
        $test->testDelete();
        $test->testAll();
        $test->testFind();
        $test->testFindBy();
        exit();

        $usuario = $this->userRepository->find(1);
        $_SESSION['usuario']['login'] = $usuario->getUsuario();
        $_SESSION['usuario']['nome'] = $usuario->getNome();
        $_SESSION['usuario']['id'] = $usuario->getId();
        $_SESSION['usuario']['foto'] = $usuario->getFoto();
        $_SESSION['usuario']['clientes'] = $usuario->getClientes();
        $_SESSION['usuario']['fornecedores'] = $usuario->getFornecedores();
        header("Location: /dashboard");
        exit;
        // Sanitiza e valida o email
        $email = filter_var($args['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /");
            exit;
        }

        // Sanitiza a senha (apenas remove espaços em branco)
        $password = trim($args['senha']);

        // Busca o usuário pelo email
        $user = $this->userRepository->findBy("email", $email);

        // Verifica se o usuário existe e se a senha é válida
        if ($user && password_verify($password, $user->getSenha())) {

            // Configura as sessões com base nos dados do usuário
            Session::set("username", htmlspecialchars($user->getNome(), ENT_QUOTES, 'UTF-8'));
            Session::set("user_id", $user->getId());
            Session::set("perfil", htmlspecialchars($user->getPerfil(), ENT_QUOTES, 'UTF-8'));

            // Gera um token seguro
            $token = bin2hex(random_bytes(32));

            // Atualiza o token do usuário no banco de dados
            $this->userRepository->updateToken($user, $token);

            // Armazena o token na sessão
            Session::set("token", $token);

            // Redireciona o usuário com base no perfil e status
            if ($user->getAtivo()) {
                if ($user->getPerfil() === "cliente")
                    header("Location: /cliente/home");
                else if ($user->getPerfil() === "admin")
                    header("Location: /admin/home");
            } else {
                header("Location: /usuario/inativo");
            }
        } else {
            // Se a autenticação falhar, redireciona para a página inicial
            header("Location: /");
        }
    }

    /**
     * Verifica se o usuário está autorizado.
     *
     * Verifica se o usuário está logado e se o token da sessão corresponde ao token armazenado
     * no banco de dados. Caso o usuário não esteja autorizado, ele é redirecionado para a página de login.
     *
     * @return bool Retorna true se o usuário estiver autorizado, false caso contrário.
     */
    public function authorize(): bool
    {
        /*
         * Verifica se existe uma id de usuário salva na sessao: Session::get('user_id')
         * e verifica se essa sessao é valida: Sessio::get('token')
         */
        if (!Session::get('user_id') && !Session::get('token')) return false;
        
        $user = $this->userRepository->find(Session::get('user_id'));

        /*
         * Verifica se o token salvo na sessao (Session::get('token'))
         * é o mesmo pertencente ao usuario recuperado do banco de dados ($user->getToken())
         */
        if (Session::get('token') !== $user->getToken()) return false;
        
        return true;
    }

    /**
     * Efetua o logout do usuário.
     *
     * Destrói a sessão do usuário e redireciona para a página inicial.
     *
     * @return void
     */
    public function logout(): void
    {
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    }
}