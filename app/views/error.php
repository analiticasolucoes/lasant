<?php http_response_code($httpResponseCode); ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Lasant Construções">
    <meta name="author" content="Leandro Souza Ferreira">
    <title><?= $title ?></title>
    <base href="<?= BASE_URL ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- Bootstrap 3.3.5 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pv7dWjjeG1JrWeTA8Z5JqjUoZW5PIx3chVhuIlfhht7n/6WoR47HkvXw3cXHIIjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
</head>
<body class="text-center">
<main class="container text-center" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="display-1">Erro HTTP: <?= $httpResponseCode ?></h1>
            <p class="mb-4">Desculpe, algo deu errado no servidor...</p>
            <p class="lead"><?= $message ?></p>
            <a href="/" class="btn btn-default" role="button"><strong>Voltar para página principal</strong></a>
        </div>
    </div>
</main>
<!-- Bootstrap 3.3.5 JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha384-pqD68NxtAdMgALhJubUjqSByc7G0C+9nE2pzh/hP1eQoqm+zIBd6P4lkDRAwj9Ph3" crossorigin="anonymous"></script>
</body>
</html>