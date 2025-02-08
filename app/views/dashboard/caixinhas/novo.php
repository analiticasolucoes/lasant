<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistema Lasant - Administrativo</title>
    <base href="<?= BASE_URL ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <!-- Bootstrap 3.3.5 CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- jQuery 3.7.1 -->
    <script src="assets/jquery/3.7.1/jquery-3.7.1.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- Font Awesome -->
    <script defer src="assets/fontawesome/js/brands.js"></script>
    <script defer src="assets/fontawesome/js/solid.js"></script>
    <script defer src="assets/fontawesome/js/fontawesome.js"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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
            <form action="add_caixinha.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-piggy-bank"></span> Cadastrar Caixinha</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Usuário</label>
                                    <select class="form-control" id="id_usuario" name="id_usuario">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        $sql_grupo = mysql_query("SELECT * FROM tb_usuario ORDER BY nome ASC") or die (mysql_error());
                                        while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                            $sql_privi_user = mysql_query("SELECT * FROM tb_privilegios WHERE id_usuario='".$row_grupo['id']."'") or die (mysql_error());
                                            $row_privi_user = mysql_fetch_assoc($sql_privi_user);
                                            if($row_privi_user['master'] == '0') {
                                                */ ?>
                                                <option value="<?php /* echo $row_grupo['id'] */ ?>"><?php /* echo $row_grupo['nome'] */ ?></option>
                                                <?php /*
                                            }
                                        }
                                        */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" name="data" class="form-control data" placeholder="Data" id="data" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Valor (R$)</label>
                                    <input type="text" name="valor" class="form-control" placeholder="Valor" id="valor" onkeypress="FormataValor(this.id, 10, event)" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" placeholder="Título" id="titulo" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Arquivo</label>
                                    <input type="file" name="arquivo">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-mail-forward"></span> Inserir</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
</html>