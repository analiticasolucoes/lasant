<?php

require_once '../vendor/autoload.php';

use App\Core\App;

// Exibe todos os tipos de erros
error_reporting(E_ALL);
// Ativa a exibição dos erros no navegador
ini_set('display_errors', 1);

$app = new App();
$app->run();