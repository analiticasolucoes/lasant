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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="assets/datatables/2.1.8/datatables.css">
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
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-legal"></i> Levantamentos Realizados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="levantamentos-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Local</th>
                            <th>Operador</th>
                            <th>Prioridade</th>
                            <th>Situação</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $sql_consult2 = mysql_query("SELECT * FROM tb_cotacao WHERE id_situacao!='0' AND tipo='1' ORDER BY id DESC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {

                            $dt_solicitacao = date('d/m/Y H:i:s', strtotime($dados['dt_solicitacao']));

                            $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                            $row_cliente = mysql_fetch_assoc($sql_cliente);

                            $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                            $row_loc = mysql_fetch_assoc($sql_loc);

                            $sql_operador = mysql_query("SELECT * FROM tb_usuario WHERE id='".$dados['id_operador']."'") or die (mysql_error());
                            $row_operador = mysql_fetch_assoc($sql_operador);

                            $sql_situ = mysql_query("SELECT * FROM tb_situacao_cotacao WHERE id='".$dados['id_situacao']."'") or die (mysql_error());
                            $row_situ = mysql_fetch_assoc($sql_situ);

                            $sql_priori = mysql_query("SELECT * FROM tb_prioridade_compra WHERE id='".$dados['id_prioridade']."'") or die (mysql_error());
                            $row_priori = mysql_fetch_assoc($sql_priori);
                            
                            if($dados['id_situacao'] == 1) { $cor_situacao = "#e9e458"; }
                            if($dados['id_situacao'] == 2) { $cor_situacao = "#6acfff"; }
                            if($dados['id_situacao'] == 3) { $cor_situacao = "#26379e"; }
                            if($dados['id_situacao'] == 4) { $cor_situacao = "#2a8819"; }
                            if($dados['id_situacao'] == 5) { $cor_situacao = "#dec047"; }
                            if($dados['id_situacao'] == 6) { $cor_situacao = "#400040"; }
                            if($dados['id_situacao'] == 7) { $cor_situacao = "#1a5c49"; }
                            if($dados['id_situacao'] == 8) { $cor_situacao = "#de5d47"; }
                            */ ?>
                            <tr>
                                <td><?php /* echo $dt_solicitacao */ ?></td>
                                <td><?php /* echo $row_cliente['nome_empresa'] */ ?></td>
                                <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                                <td><?php /* echo $row_operador['nome'] */ ?></td>
                                <td><?php /* echo $row_priori['prioridade'] */ ?></td>
                                <td><span class="badge" style="background:<?php /* echo $cor_situacao */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situ['situacao'] */ ?></span></td>
                                <td>
                                    <?php /* if($row_privi['compras_edicao'] == '1') { */ ?>
                                        <a href="assets/ficha_solicitacao.php?id=<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a>
                                    <?php /* } */ ?>
                                </td>
                            </tr>
                            <?php /*
                        }
                        */ ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</div>
</body><!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#levantamentos-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/pt-BR.json',
            }
        });
    });
</script>
</html>