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
        <!--<section class="content-header"></section>-->
        <!-- Main content -->
        <section class="content">
            <?php
            function porcentagem_nx ( $parcial, $total ) {
                return ( $parcial * 100 ) / $total;
            }

            /*$sql_os_todas = mysql_query("SELECT * FROM tb_ordem_servico");
            $todas_os = mysql_num_rows($sql_os_todas);

            $sql_os_abertas = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_situacao='1'");
            $abertas = mysql_num_rows($sql_os_abertas);

            $sql_os_finalizadas = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_situacao='2'");
            $finalizadas = mysql_num_rows($sql_os_finalizadas);

            $sql_os_canceladas = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_situacao='3'");
            $canceladas = mysql_num_rows($sql_os_canceladas);

            $sql_os_validadas = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_situacao='6'");
            $validadas = mysql_num_rows($sql_os_validadas);

            $sql_os_faturadas = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_situacao='4'");
            $faturadas = mysql_num_rows($sql_os_faturadas);

            $sql_os_servico = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_situacao='7'");
            $servico = mysql_num_rows($sql_os_servico);*/

            $todas_os = 100;
            $abertas = 1;
            $finalizadas = 1;
            $canceladas = 1;
            $validadas = 1;
            $faturadas = 1;
            $servico = 1;
            ?>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Abertas</span>
                            <span class="info-box-number"><?php echo $abertas ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo round(porcentagem_nx($abertas, $todas_os),1) ?>%"></div>
                            </div>
                            <span class="progress-description"> <?php echo round(porcentagem_nx($abertas, $todas_os),1) ?>% de <?php echo $todas_os ?> OS </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Finalizadas</span>
                            <span class="info-box-number"><?php echo $finalizadas ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo round(porcentagem_nx($finalizadas, $todas_os),1) ?>%"></div>
                            </div>
                            <span class="progress-description"> <?php echo round(porcentagem_nx($finalizadas, $todas_os),1) ?>% de <?php echo $todas_os ?> OS </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-ban"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Canceladas</span>
                            <span class="info-box-number"><?php echo $canceladas ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo round(porcentagem_nx($canceladas, $todas_os),1) ?>%"></div>
                            </div>
                            <span class="progress-description"> <?php echo round(porcentagem_nx($canceladas, $todas_os),1) ?>% de <?php echo $todas_os ?> OS </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- /.info-box -->
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Validadas</span>
                            <span class="info-box-number"><?php echo $validadas ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo round(porcentagem_nx($validadas, $todas_os),1) ?>%"></div>
                            </div>
                            <span class="progress-description"> <?php echo round(porcentagem_nx($validadas, $todas_os),1) ?>% de <?php echo $todas_os ?> OS </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4">
                    <!-- /.info-box -->
                    <div class="info-box bg-navy">
                        <span class="info-box-icon"><i class="fa fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Faturadas</span>
                            <span class="info-box-number"><?php echo $faturadas ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo round(porcentagem_nx($faturadas, $todas_os),1) ?>%"></div>
                            </div>
                            <span class="progress-description"><?php echo round(porcentagem_nx($faturadas, $todas_os),1) ?>% de <?php echo $todas_os ?> OS</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4">
                    <!-- /.info-box -->
                    <div class="info-box bg-gray">
                        <span class="info-box-icon"><i class="fa fa-wrench"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Serviços Confirmados</span>
                            <span class="info-box-number"><?php echo $servico ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo round(porcentagem_nx($servico, $todas_os),1) ?>%"></div>
                            </div>
                            <span class="progress-description"><?php echo round(porcentagem_nx($servico, $todas_os),1) ?>% de <?php echo $todas_os ?> OS</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
</html>