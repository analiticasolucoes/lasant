<?php

namespace App\Routes;

use \ReflectionClass;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->loadRoutes();
    }

    private function loadRoutes()
    {
        $directory = __DIR__ . DIRECTORY_SEPARATOR . 'entities';
        $files = glob($directory . DIRECTORY_SEPARATOR. '*.php');

        foreach ($files as $file) {
            $className = basename($file, '.php');
            $className = 'App\\Routes\\Entities\\' . $className;

            if (class_exists($className)) {
                $class = new ReflectionClass($className);
                if ($class->hasMethod('load') && $class->getMethod('load')->isStatic()) {
                    $instance = $class->newInstance(); // Instancia um objeto da classe
                    $this->routes = array_merge($this->routes, $instance->load());
                }
            }
        }
    }

    public function dispatch($requestUri)
    {   
        if($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
            $posicao = strpos($requestUri, "?");
            if ($posicao !== false) {
                $requestUri = substr($requestUri, 0, $posicao);
            }
        }

        foreach ($this->routes as $route => $routeInfo) {
            // Verifica se a rota atual corresponde à requisição
            if ($route === $requestUri) {
                // Retorna a ação do controlador correspondente
                return $routeInfo;
            }
        }

        return null;
    }
    
    public function getController($action) {
        if (array_key_exists($action, $this->routes)) {
            return $this->routes[$action]['controller'];
        }
        return null;
    }

    public function getAction($action) {
        if (array_key_exists($action, $this->routes)) {
            return $this->routes[$action]['action'];
        }
        return null;
    }
}