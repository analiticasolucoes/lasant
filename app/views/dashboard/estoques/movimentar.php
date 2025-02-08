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
            <form action="add_movimentacao.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-boxes-packing"></i> Movimentar Material</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cliente Estoque Origem</label>
                                    <select class="form-control" id="id_cliente" name="id_cliente">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        foreach($clientes_listagem as $value) {
                                        $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysql_error());
                                        $row_cliente = mysql_fetch_assoc($sql_cliente);
                                        */ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>"><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
                                        <?php /* } */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cliente Estoque Destino</label>
                                    <select class="form-control" id="id_cliente_dest" name="id_cliente_dest">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        foreach($clientes_listagem as $value) {
                                        $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysql_error());
                                        $row_cliente = mysql_fetch_assoc($sql_cliente);
                                        */ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>"><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
                                        <?php /* } */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Código</label>
                                        <div class="input-group">
                                            <input type="text" name="referencia" class="form-control pull-left" placeholder="Código" id="referencia_est" />
                                            <span class="input-group-btn">
                                                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#pop_produto_est"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Qtd</label>
                                            <input type="text" name="qtd" class="form-control" placeholder="Qtd" id="qtd_est" onkeypress="FormataValor(this.id, 10, event)" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                    </div>
                </div>
                <!-- /.box -->
                <input type="hidden" value="pesquisar" name="pesquisar" />
            </form>
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-truck-arrow-right"></i> Movimentações Feitas</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Unidade Origem</th>
                                        <th>Unidade Destino</th>
                                        <th>IDPRD</th>
                                        <th>Material</th>
                                        <th>Quantidade</th>
                                        <th>NF</th>
                                        <th>Valor Unit.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php /*
                                $sql_faxinas2 = mysql_query("SELECT * FROM ta_esfera ORDER BY id DESC") or die (mysql_error());
                                $total_cadastros = mysql_num_rows($sql_faxinas2);
                                while ($dados_fax = mysql_fetch_array($sql_faxinas2)) {
                                */ ?>
                                <tr>
                                    <td><?php /* echo $dados_fax['ds_esfera'] */ ?></td>
                                    <td><?php /* echo $dados_fax['form_os'] */ ?></td>
                                </tr>
                                <?php /* } */ ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total Movimentações: 0<?php /* echo $total_cadastros */ ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="modal modal-default" id="pop_produto_est">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-navy">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Pesquisar Material Estoque</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!--                <input name="id_cliente" type="hidden" id="id_cliente" value="<?php /* //echo $row_cliente['id'] */ ?>" />-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <input type="text" name="referencia_busca" id="referencia_busca_est" class="form-control" placeholder="Código" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Nome Material / Produto</label>
                                    <div class="input-group">
                                        <input type="text" name="descricao_busca" class="form-control pull-left" placeholder="Descrição" id="descricao_busca_est" />
                                        <span class="input-group-btn">
                                            <a class="btn btn-primary pull-right" onClick="pesquisar_produto_est()"><i class="fa fa-search"></i> Pesquisar</a>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-12 table-responsive" id="resultado_produtos_est"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
<script>
    function pesquisar_produto_est() {
        $("#resultado_produtos_est").html('<div align="center"><img src="dist/img/load.gif"</div>');

        var descricao_busca = $("#descricao_busca_est").val();
        var referencia_busca = $("#referencia_busca_est").val();
        var id_cliente = $("#id_cliente").val();
        var url = 'busca_produtos_estoque.php?&descricao_busca=' + descricao_busca + '&referencia_busca=' + referencia_busca + '&id_cliente=' + id_cliente;

        $('#resultado_produtos_est').load(url , function(){ $('#resultado_produtos_est').trigger('create'); });
    }

    function SelecionaProdutoEst(valor) {
        $("#referencia_est").val(valor);
        $('#resultado_produtos_est').empty();
        $(".modal").modal('hide');
        $("#qtd_est").val("1");
        $("#qtd_est").focus();
    }
</script>
</html>
