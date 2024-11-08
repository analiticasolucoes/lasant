<?php

namespace App\Core;

use App\Database\Database;
use App\Routes\Router;
use App\Controllers\LoginController;
use App\Services\Session;
use App\Views\ViewController;

class App
{
    private Database $conn;

    public function __construct()
    {
        $this->load();
        $this->conn = $this->connect();
        Session::start();
    }

    private function load(): void
    {
        $pathEnv = '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'load_env.php';
        require_once($pathEnv);
        loadEnv(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '.env');
        $this->init();
    }

    public function init(): void
    {
        // Define variaveis globais
        define("BASE_URL", getenv('HTTP_PROTOCOL') . '://' . getenv('BASE_URL'));
        define("SYSTEM_NAME", str_replace("\"", "", getenv('SYSTEM_NAME')));
    }

    private function connect(): Database
    {
        require_once '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_connect.php';
        return dbConnect();
    }

    public function run(): void
    {
        $router = new Router();

        $requestUri = $_SERVER['REQUEST_URI'];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $pos = strpos($_SERVER['REQUEST_URI'], '?');

            if ($pos !== false) {
                $requestUri = substr($_SERVER['REQUEST_URI'], 0, $pos);
            }
        }
        //var_dump($requestUri);
        // Verificar a rota e chamar o controlador apropriado
        $routeInfo = $router->dispatch($requestUri);
        //echo"<pre>";var_dump($routeInfo);
        if (is_array($routeInfo) && isset($routeInfo['controller']) && isset($routeInfo['method'])) {
            $classControllerPath = '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $routeInfo['controller'] . '.php';
            $classController = "App\\Controllers\\" . $routeInfo['controller'];
            $methodName = $routeInfo['method'];
            $isPublic = $routeInfo['public'] ?? false;

            // Se a rota não for pública, verificar se o usuário está autorizado
            if (!$isPublic) {
                $loginController = new LoginController($this->conn);
                if (!$loginController->authorize()) {
                    // Usuário não está autorizado, redirecionar para a página de login
                    header('Location: /');
                    exit;
                }
                $loginController = null;
            }

            // Verificar se a classe do controlador existe
            if (file_exists($classControllerPath)) {
                include_once $classControllerPath;
                $controller = new $classController($this->conn);
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->$methodName($_POST);
                }

                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if (!empty($_GET)) {
                        $controller->$methodName($_GET);
                    } else {
                        $controller->$methodName();
                    }
                }
            }
        } else {
            // Se a rota não for encontrada ou não for válida, exibir uma página de erro 404
            $view = new ViewController();
            $view->render("404");
        }
    }
}