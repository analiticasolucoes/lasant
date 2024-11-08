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
            <form action="add_operador.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Operador</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <input type="hidden" name="id_operador" value="" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de Operador</label>
                                    <select class="form-control" id="tipo" name="tipo" required="required">
                                        <option value="1">Simples</option>
                                        <option value="2">Fiscal</option>
                                        <option value="3">Gerente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="nm_operador" class="form-control" placeholder="Nome" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" class="form-control cpf" placeholder="CPF" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Matrícula</label>
                                    <input type="text" name="matricula" class="form-control" placeholder="Matrícula" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ramal</label>
                                    <input type="text" name="ramal" class="form-control" placeholder="Ramal" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" name="email" class="form-control" placeholder="E-mail" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" name="login" class="form-control" placeholder="Login" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" name="psw" class="form-control" placeholder="Senha" value="" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Assinatura</label>
                                    <input type="file" id="arquivo" name="arquivo" />
                                    <input type="hidden" name="assinatura_antiga" value="" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rúbrica</label>
                                    <input type="file" id="arquivo2" name="arquivo2" />
                                    <input type="hidden" name="rubrica_antiga" value="" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status" required="required">
                                        <option value="Ativo">Ativo</option>
                                        <option value="Inativo">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clientes para Acesso</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <?php /*
                                $sql_consult3 = mysql_query("SELECT * FROM ta_cliente_fornecedor ORDER BY id ASC") or die (mysql_error());
                                while ($row = mysql_fetch_array($sql_consult3)) {
                                    */  ?>
                                <div class="col-md-3">
                                    <input type="checkbox" name="id_cliente[]" value="<?php /* echo $row['id'] */  ?>" />  <?php /* echo $row['nome_empresa'] */  ?>
                                </div>
                                <?php /* } */  ?>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Locais para Acesso</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <?php /*
                                $sql_consult3 = mysql_query("SELECT * FROM ta_cliente_local ORDER BY ds_clienteLocal ASC") or die (mysql_error());
                                while ($row = mysql_fetch_array($sql_consult3)) {
                                    */  ?>
                                <div class="col-md-4">
                                    <input type="checkbox" name="locais[]" value="<?php /* echo $row['id'] */  ?>"/> <?php /* echo $row['ds_clienteLocal'] */  ?>
                                </div>
                                <?php /* } */  ?>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Atualizar</button>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</div>
</body>
</html>