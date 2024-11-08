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
            <form action="add_entrada.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-legal"></span> Entrada de Estoque</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <select class="form-control" id="id_cliente" name="id_cliente">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        $sql_grupo = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE tipo='1' ORDER BY nome_fantasia") or die (mysql_error());
                                        while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                        */ ?>
                                        <option value="<?php /* echo $row_grupo['id'] */ ?>"><?php /* echo $row_grupo['nome_fantasia'] */ ?></option>
                                        <?php /*
                                        }
                                        */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fornecedor</label>
                                    <select class="form-control" id="CODCFO" name="CODCFO">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        $sql_grupo = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE tipo='2' ORDER BY nome_fantasia") or die (mysql_error());
                                        while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                        */ ?>
                                        <option value="<?php /* echo $row_grupo['id'] */ ?>"><?php /* echo $row_grupo['nome_fantasia'] */ ?></option>
                                        <?php /*
                                        }
                                        */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Série</label>
                                    <input type="text" name="nu_serie" class="form-control" placeholder="Série" id="nu_serie" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nº da NF</label>
                                    <input type="text" name="nu_notaFiscal" class="form-control" placeholder="Nº da NF" id="nu_notaFiscal" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data de Emissão</label>
                                    <input type="text" name="dt_notaFiscal" class="form-control data" placeholder="Data de Emissão" id="dt_notaFiscal" />
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-mail-forward"></span> Prosseguir</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</div>
</body>
</html>