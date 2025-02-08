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
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
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
    <?php include __DIR__ . '/../../../templates/header.php'; ?>
    <?php include __DIR__ . '/../../../templates/aside.php'; ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <form id="compras-add-form" action="compras/levantamentos/incluir" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-legal"></i> Cadastro Levantamento</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control" id="cliente" name="cliente" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($clientes as $cliente): ?>
                                        <option value="<?= $cliente->getId()?>"><?= $cliente->getNomeEmpresa()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="local">Local</label>
                                    <select class="form-control" id="local" name="local" required disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prioridade">Prioridade</label>
                                    <select class="form-control" id="prioridade" name="prioridade" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($prioridades as $prioridade): ?>
                                        <option value="<?= $prioridade->getId() ?>"><?= $prioridade->getPrioridade() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observacoes">Observações</label>
                                    <textarea name="observacoes" class="form-control" rows="4" id="observacoes" placeholder="Observações"></textarea>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                    </div>
                </div>
                <!-- /.box -->
            </form>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</div>
</body>
<script>
    $(document).ready(function() {
        $('#cliente').change(function() {
            var clienteId = $(this).val();

            // Verifica se algum cliente foi selecionado
            if (clienteId) {
                // Faz a requisição Ajax para obter os locais
                $.ajax({
                    url: '/clientes/locais/by-cliente', // URL da rota que vai retornar os locais
                    type: 'POST',
                    data: { cliente: clienteId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de local
                        $('#local').prop('disabled', false);
                        $('#local').empty(); // Limpa o dropdown de local
                        $('#local').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com os locais retornados
                        $.each(response, function(index, local) {
                            $('#local').append('<option value="' + local.id + '">' + local.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar locais: " + error);
                        $('#local').prop('disabled', true); // Desabilita caso haja erro
                    }
                });
            } else {
                // Caso nenhum cliente seja selecionado, desabilita o campo de local
                $('#local').prop('disabled', true);
                $('#local').empty();
                $('#local').append('<option value="" selected>Selecione</option>');
            }
        });
    });
</script>
</html>