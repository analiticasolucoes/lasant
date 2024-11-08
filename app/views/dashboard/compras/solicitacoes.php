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
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- Font Awesome -->
    <script defer src="assets/fontawesome/js/brands.js"></script>
    <script defer src="assets/fontawesome/js/solid.js"></script>
    <script defer src="assets/fontawesome/js/fontawesome.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="assets/datatables/2.1.8/datatables.css">
    <!-- jQuery 3.7.1 -->
    <script src="assets/jquery/3.7.1/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <script src="assets/dist/js/valor.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <!-- JS Scripts -->
    <script src="assets/js/script.js"></script>
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
            <form action="solicitacoes.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Ordens de Serviço</h3>
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
		foreach($clientes_listagem as $value) {
		$sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value' AND tipo='1'") or die (mysql_error());
		$row_cliente = mysql_fetch_assoc($sql_cliente);
		if($row_cliente['id'] != '' and $row_cliente['tipo'] == '1'){
		*/ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>"><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
                                        <?php /*
		}
		}
		*/ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Inicial (Data da Solicitação)</label>
                                    <input type="date" class="form-control" placeholder="Data Inicial (Cadastro)" name="data_inicial" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Final (Data da Solicitação)</label>
                                    <input type="date" class="form-control" placeholder="Data Final (Data da Solicitação)" name="data_final" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Situação</label>
                                    <select class="form-control" id="id_situacao" name="id_situacao">
                                        <option value="" selected>Selecione</option>
                                    <?php /*
                                    $sql_situacao = mysql_query("SELECT * FROM tb_situacao_cotacao ORDER BY id ASC") or die (mysql_error());
                                    while ($row_situacao = mysql_fetch_assoc($sql_situacao)) {
                                        */ ?>
                                        <option value="<?php /* echo $row_situacao['id'] */ ?>"><?php /* echo $row_situacao['situacao'] */ ?></option>
                                    <?php /* } */ ?>
                                    </select>
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
                    <h3 class="box-title"><i class="fa fa-legal"></i> Solicitações de Compra</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="solicitacoes-compra-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Número</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Local</th>
                            <th>Operador</th>
                            <th>Prioridade</th>
                            <th>Situação</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
				
$data_inicial = implode("-",array_reverse(explode("/",$_POST['data_inicial'])))." 00:00:00";
				$data_final = implode("-",array_reverse(explode("/",$_POST['data_final'])))." 23:59:59";

if($_POST['data_inicial'] != "" and $_POST['data_final'] != "") { $b1 = "AND dt_solicitacao BETWEEN '$data_inicial' AND '$data_final'"; } 
if($_POST['id_cliente'] != "") { $b2 = "AND id_cliente='".$_POST['id_cliente']."'"; } 
if($_POST['id_situacao'] != "") { $b3 = "AND id_situacao='".$_POST['id_situacao']."'"; } 
				
				$sql_consult2 = mysql_query("SELECT * FROM tb_cotacao WHERE id_situacao!='0' AND tipo='0' $b1 $b2 $b3 ORDER BY id DESC") or die (mysql_error());
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
                            <td><?php /* echo $dados['id']."/".date("Y") */ ?></td>
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
                            <td>
                                <?php /*
		    if($row_privi['status_compra'] == 1) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_status_com_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-warning" title="Alterar Situação"><i class="fa fa-refresh"></i></a>
                                <?php /*
		    }
		    */ ?>
                            </td>
                        </tr>
                        <div class="modal" id="modal_status_com_<?php /* echo $dados['id'] */ ?>">
                            <form action="alterar_situacao_compra.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-red">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Alterar Situação da Compra Nº <?php /* echo $dados['id'] */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_compra" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Situação</label>
                                                        <select name="id_situacao" class="form-control" id="id_situacao">
                                                            <option selected="selected" value="">Selecione</option>
                                                        <?php /*
                                                        $consulta = mysql_query("SELECT * FROM tb_situacao_cotacao ORDER BY situacao ASC");
                                                        while( $row = mysql_fetch_assoc($consulta) )
                                                        {
                                                            echo "<option value=\"{$row['id']}\">{$row['situacao']}</option>\n";
                                                        }
                                                        */ ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                            <input type="submit" value="Alterar" class="btn btn-primary" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
                        </div>
                        <?php /* } */ ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <?php /* } */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
<script>
    $(document).ready(function() {
        dataTableInit("solicitacoes-compra-table");
    });
</script>
</html>