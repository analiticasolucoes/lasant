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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="assets/datatables/2.1.8/datatables.css">
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
            <form action="equipamentos.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Equipamentos</h3>
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
                                    <select class="form-control" id="id_cliente" name="id_cliente" required="required">
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
                                    <label>Local</label>
                                    <select class="form-control" id="id_clienteLocal" name="id_clienteLocal">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pavimento</label>
                                    <select class="form-control" id="id_clientePavimento" name="id_clientePavimento">
                                        <option value="" selected>Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Setor</label>
                                    <select class="form-control" id="id_clienteSetor" name="id_clienteSetor">
                                        <option value="" selected>Selecione</option>
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
                    <h3 class="box-title"><i class="fa fa-wrench"></i> Equipamentos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="equipamentos-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Equipamento</th>
                            <th>Cliente</th>
                            <th>Local</th>
                            <th>Pavimento</th>
                            <th>Setor</th>
                            <th>Grupo</th>
                            <th>Subgrupo</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        if($_POST['id_clienteLocal'] != "") { $b1 = "AND id_clienteLocal='".$_POST['id_clienteLocal']."'"; }
                        if($_POST['id_clientePavimento'] != "") { $b2 = "AND id_clientePavimento='".$_POST['id_clientePavimento']."'"; }
                        if($_POST['id_clienteSetor'] != "") { $b3 = "AND id_clienteSetor='".$_POST['id_clienteSetor']."'"; }
                        if($_POST['id_cliente'] != "") { $b4 = "AND id_cliente='".$_POST['id_cliente']."'"; }

                        $sql_consult2 = mysql_query("SELECT * FROM tb_equipamento WHERE id!='' $b1 $b2 $b3 $b4 ORDER BY nm_equipamento ASC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {
                        $id_pet = $dados['id'];

                        $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                        $row_cliente = mysql_fetch_assoc($sql_cliente);


                        $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                        $row_loc = mysql_fetch_assoc($sql_loc);

                        $sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
                        $row_pav = mysql_fetch_assoc($sql_pav);

                        $sql_set = mysql_query("SELECT * FROM ta_cliente_setor WHERE id='".$dados['id_clienteSetor']."'") or die (mysql_error());
                        $row_set = mysql_fetch_assoc($sql_set);

                        $sql_cat2 = mysql_query("SELECT * FROM ta_equip_subgrupo_manutencao WHERE id='".$dados['id_equipSubGrupoManutencao']."'") or die (mysql_error());
                        $row_cat2 = mysql_fetch_assoc($sql_cat2);

                        $sql_cat3 = mysql_query("SELECT * FROM ta_equip_grupo_manutencao WHERE id='".$dados['id_equipGrupoManutencao']."'") or die (mysql_error());
                        $row_cat3 = mysql_fetch_assoc($sql_cat3);
                        */ ?>
                        <tr>
                            <td><?php /* echo $dados['nm_equipamento'] */ ?></td>
                            <td><?php /* echo $row_cliente['nome_empresa'] */ ?></td>
                            <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                            <td><?php /* echo $row_pav['ds_clientePavimento'] */ ?></td>
                            <td><?php /* echo $row_set['ds_clienteSetor'] */ ?></td>
                            <td><?php /* echo $row_cat3['ds_equipGrupoManutencao'] */ ?></td>
                            <td><?php /* echo $row_cat2['ds_equipSubgrupoManutencao'] */ ?></td>
                            <td>
                                <?php /* if($row_privi['equipamento_edicao'] == '1') { */ ?>
                                <a href="ficha_equipamento.php?id=<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a>
                                <?php /* } */ ?>
                            </td>
                            <td>
                                <?php /* if($row_privi['equipamento_exclusao'] == '1') { */ ?>
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
                                        <h4 class="modal-title">Excluir Equipamento</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Tem certeza que deseja excluir o Equipamento <b><?php /* echo $dados['nm_equipamento'] */ ?></b> ?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                        <a href="delete_equipamento.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-primary">Sim</a>
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
            <?php /* } */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_cliente').change(function() {
            var id_cliente = $(this).val();
            $('#id_clienteLocal').load('listar_locais.php?id_cliente='+id_cliente);
        });
        $('#id_clienteLocal').change(function() {
            var id_local = $(this).val();
            $('#id_clientePavimento').load('listar_pavimentos.php?id_local='+id_local);
        });
        $('#id_clientePavimento').change(function() {
            var id_pavimento = $(this).val();
            $('#id_clienteSetor').load('listar_setores.php?id_pavimento='+id_pavimento);
        });
        $("#equipamentos-table").DataTable({
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
