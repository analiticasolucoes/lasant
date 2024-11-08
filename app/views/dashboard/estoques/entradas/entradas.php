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
            <form action="entradas.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Entradas de Estoque</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
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
                                    <label>Data Inicial (Data da Entrada de Estoque)</label>
                                    <input type="text" class="form-control data" placeholder="Data Inicial (Data da Entrada de Estoque)" name="data_inicial" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Final (Data da Entrada de Estoque)</label>
                                    <input type="text" class="form-control data" placeholder="Data Final (Data da Entrada de Estoque)" name="data_final" >
                                </div>
                            </div>
                            <input name="acao" type="hidden" id="acao" value="pesquisa" />
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-search"></span> Pesquisar</button>
                    </div>
                </div>
            </form>
            <?php /* if ($_POST['acao'] == "pesquisa") { */ ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-legal"></i> Entradas de Estoque</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nº Entrada</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Fornecedor</th>
                            <th>Nº da NF</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $data_inicial = implode("-",array_reverse(explode("/",$_POST['data_inicial'])))." 00:00:00";
                        $data_final = implode("-",array_reverse(explode("/",$_POST['data_final'])))." 23:59:59";
                        
                        if($_POST['data_inicial'] != "" and $_POST['data_final'] != "") { $b1 = "AND dt_inseriu BETWEEN '$data_inicial' AND '$data_final'"; } 
                        if($_POST['id_cliente'] != "") { $b2 = "AND id_cliente='".$_POST['id_cliente']."'"; } 
                        
                        $sql_consult2 = mysql_query("SELECT * FROM tb_almrecebimentonf WHERE id!='' $b1 $b2 ORDER BY id DESC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {
                        
                        $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                        $row_cliente = mysql_fetch_assoc($sql_cliente);
                        $nome_cliente = $row_cliente['nome_fantasia'];
                        
                        $sql_fornecedor = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['CODCFO']."'") or die (mysql_error());
                        $row_fornecedor = mysql_fetch_assoc($sql_fornecedor);
                        $nome_fornecedor = $row_fornecedor['nome_fantasia'];
                        
                        $dt_notaFiscal = date('d/m/Y', strtotime($dados['dt_notaFiscal']));
                        */ ?>
                        <tr>
                            <td><?php /* echo $dados['id'] */ ?></td>
                            <td><?php /* echo $dt_notaFiscal */ ?></td>
                            <td><?php /* echo $nome_cliente */ ?></td>
                            <td><?php /* echo $nome_fornecedor */ ?></td>
                            <td><?php /* echo $dados['nu_notaFiscal'] */ ?></td>
                            <td>
                                <a href="cadastro_entrada2.php?id_entrada=<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Visualizar Entrada"><i class="fa fa-search"></i></a>
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
            <?php /*
		    }
		    */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</div>
</body>
</html>