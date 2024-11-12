<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Lasant - Administrativo</title>
    <base href="<?= BASE_URL ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- Font Awesome -->
    <script defer src="assets/fontawesome/js/brands.js"></script>
    <script defer src="assets/fontawesome/js/solid.js"></script>
    <script defer src="assets/fontawesome/js/fontawesome.js"></script>
    <!-- jQuery 3.7.1 -->
    <script src="assets/jquery/3.7.1/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <script src="assets/dist/js/valor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include __DIR__ . '/../../templates/header.php'; ?>
    <?php include __DIR__ . '/../../templates/aside.php'; ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-user-circle"></i> Meu Perfil
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-label="Minimizar">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form id="perfil-foto-update-form" action="perfil/alterar" method="post" enctype="multipart/form-data" target="_self" onsubmit="return validar()">
                    <div class="box-body">
                        <div class="row">
                            <!-- Informação do Nome -->
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <label>Usuário:</label>
                                    <span class="perfil-usuario"><?= $_SESSION['usuarioLogin'] ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <span class="perfil-nome">Leandro Souza Ferreira</span>
                                </div>
                            </div>

                            <!-- Foto de Perfil -->
                            <div class="col-md-12 text-center">
                                <img src="<?= $foto ?>" alt="Foto do Perfil" id="perfil-foto" class="img-thumbnail img-circle img-responsive perfil-foto" width="128" height="128">
                                <div class="form-group upload-foto mt-2">
                                    <label for="foto-upload" class="btn btn-secondary btn-sm mt-2">
                                        <i class="fa fa-image"></i> Alterar Foto
                                    </label>
                                    <input type="file" id="foto-upload" name="foto" accept=".png, .jpg, .bmp, .jpeg, .gif" style="display: none;" onchange="mostrarImagem(event)">
                                </div>
                            </div>

                            <!-- Botão para Alterar Senha -->
                            <div class="col-md-12 text-center mt-4">
                                <button type="button" class="btn btn-warning" onclick="mostrarCamposSenha()"><i class="fa fa-key"></i> Alterar Senha</button>
                            </div>

                            <!-- Campos de Alteração de Senha (inicialmente ocultos) -->
                            <div id="campos-senha" class="col-md-4 col-md-offset-4 mt-4" style="display: none;">
                                <div class="form-group">
                                    <label for="nova-senha">Nova Senha</label>
                                    <input type="password" id="nova-senha" name="nova-senha" class="form-control" placeholder="Digite a nova senha">
                                </div>
                                <div class="form-group">
                                    <label for="confirma-senha">Confirme a Nova Senha</label>
                                    <input type="password" id="confirma-senha" name="confirma-senha" class="form-control" placeholder="Confirme a nova senha">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Salvar</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
<script>
    function validar() {
        const camposSenha = document.getElementById("campos-senha");

        // Verifica se os campos de senha estão visíveis
        if (camposSenha.style.display === "none") {
            return true; // Permite o envio do formulário se os campos de senha estão ocultos
        }

        const novaSenha = document.getElementById("nova-senha").value;
        const confirmaSenha = document.getElementById("confirma-senha").value;

        // Validação se os campos estão preenchidos
        if (!novaSenha || !confirmaSenha) {
            alert("Por favor, preencha todos os campos de senha.");
            return false; // Impede o envio do formulário
        }

        // Validação se as senhas coincidem
        if (novaSenha !== confirmaSenha) {
            alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
            return false; // Impede o envio do formulário
        }

        return true; // Permite o envio do formulário
    }

    function mostrarImagem(event) {
        const foto = document.getElementById('perfil-foto');
        const input = event.target;

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                    // Calcula as dimensões mantendo a proporção 4:3 e limita a largura e altura
                    let width = img.width;
                    let height = img.height;
                    const maxWidth = 128;
                    const maxHeight = 96;

                    if (width / height > 4 / 3) {
                        // Se a imagem é mais larga que a proporção 4:3
                        width = maxWidth;
                        height = maxWidth * 3 / 4;
                    } else {
                        // Se a imagem é mais alta que a proporção 4:3
                        height = maxHeight;
                        width = maxHeight * 4 / 3;
                    }

                    // Cria um canvas para redimensionar a imagem
                    const canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    // Atualiza a imagem de perfil com o conteúdo do canvas redimensionado
                    foto.src = canvas.toDataURL();
                };
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function mostrarCamposSenha() {
        const camposSenha = document.getElementById("campos-senha");
        camposSenha.style.display = "block"; // Exibe os campos de senha

        // Adiciona o atributo required nos campos de senha agora que eles estão visíveis
        document.getElementById("nova-senha").setAttribute("required", "required");
        document.getElementById("confirma-senha").setAttribute("required", "required");
    }
</script>
</html>