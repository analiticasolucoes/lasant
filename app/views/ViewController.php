<?php

namespace App\views;

use \Exception;

class ViewController
{
    protected string $viewsDirectory;

    public function __construct()
    {
        // Define o diretório onde as views estão localizadas
        $this->viewsDirectory = __DIR__ ;
    }

    /**
     * Renderiza a página especificada.
     *
     * @param string $view Nome da página (sem extensão) a exibir.
     * @param array $data Dados opcionais a serem passados para a view.
     * @return void
     */
    public function render(string $view, array $data = []): void
    {
        // Gera o caminho completo para o arquivo da view
        $viewFile = $this->viewsDirectory . DIRECTORY_SEPARATOR . $view . '.php';

        // Verifica se o arquivo da view existe e inclui-o
        try {
            if (file_exists($viewFile)) {
                // Extrai os dados passados para a view
                extract($data, EXTR_SKIP);
                ob_start();
                include($viewFile);
                ob_end_flush();
            } else {
                throw new Exception("View {$view} não encontrada!");
            }
        } catch (Exception $e) {
            // Tratar a exceção adequadamente
            echo $e->getMessage();
        }
    }
}