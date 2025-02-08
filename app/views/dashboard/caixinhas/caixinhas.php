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
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-piggy-bank"></i> Caixinhas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Usuário</th>
                            <th>Título</th>
                            <th>Valor</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        if($row_privi['master'] == '1') { $b1 = ""; }
                        if($row_privi['master'] == '0') { $b1 = "AND id_usuario='".$_SESSION['usuarioID']."'"; }

                        $sql_consult2 = mysql_query("SELECT * FROM tb_caixinha WHERE id!='' $b1 ORDER BY id DESC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {
                            $data = date('d/m/Y', strtotime($dados['data']));
                            $sql_user = mysql_query("SELECT * FROM tb_usuario WHERE id='".$dados['id_usuario']."'") or die (mysql_error());
                            $row_user = mysql_fetch_assoc($sql_user);
                        */ ?>
                        <tr>
                            <td><?php /* echo $data */ ?></td>
                            <td><?php /* echo $row_user['nome'] */ ?></td>
                            <td><?php /* echo $dados['titulo'] */ ?></td>
                            <td>R$ <?php /* echo number_format($dados['valor'], 2, ',','.'); */ ?></td>
                            <td>
                                <a href="caixinhas/detalhe?id=1<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a>
                            </td>
                            <td>
                                <?php /* if($row_privi['master'] == '1') { */ ?>
                                <a data-toggle="modal" data-target="#modal_delete_<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button></a>
                                <?php /* } */ ?>
                            </td>
                        </tr>
                        <div class="modal" id="modal_delete_<?php /* echo $dados['id'] */ ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Excluir Caixinha</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Tem certeza que deseja excluir a Caixinha do <b><?php /* echo $row_user['nome'] */ ?></b> ?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                        <a href="delete_caixinha.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-primary">Sim</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <?php /* } */ ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
</html>