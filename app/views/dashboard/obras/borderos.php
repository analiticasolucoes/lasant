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
            <form action="borderos.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Borderôs</h3>
                        <div class="box-tools pull-right">
                            <?php /* if($row_privi['bordero_cadastro'] == '1') { */ ?>
                            <a href="cadastro_bordero.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Borderô</a>
                            <?php /* } */ ?>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Obra</label>
                                    <select class="form-control" id="id_obra" name="id_obra" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        $sql_cliente = mysql_query("SELECT * FROM ta_obras ORDER BY id DESC") or die (mysql_error());
                                        while($row_cliente = mysql_fetch_assoc($sql_cliente)) {
                                        */ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>"><?php /* echo $row_cliente['nome_obra'] */ ?></option>
                                        <?php /*
                                        }
                                        */ ?>
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
                    <h3 class="box-title"><i class="fa fa-file-contract"></i> Borderôs</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nº</th>
                            <th>Data</th>
                            <th>Obra</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $sql_consult2 = mysql_query("SELECT * FROM tb_bordero WHERE id_obra='".$_POST['id_obra']."' ORDER BY id DESC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {

                        $data = date('d/m/Y', strtotime($dados['data']));
                        $ano = date('Y', strtotime($dados['data']));

                        $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                        $row_cliente = mysql_fetch_assoc($sql_cliente);

                        $sql_obra = mysql_query("SELECT * FROM ta_obras WHERE id='".$dados['id_obra']."'") or die (mysql_error());
                        $row_obra = mysql_fetch_assoc($sql_obra);


                        */ ?>
                        <tr>
                            <td><?php /* echo $dados['numero'] */ ?></td>
                            <td><?php /* echo $dados['numero'] */ ?>/<?php /* echo $ano */ ?></td>
                            <td><?php /* echo $data */ ?></td>
                            <td><?php /* echo $row_obra['nome_obra'] */ ?></td>
                            <td><?php /* echo $row_cliente['nome_empresa'] */ ?></td>
                            <td>
                                <a href="impressao_bordero.php?id=<?php /* echo $dados['id'] */ ?>" target="_blank"><button class="btn btn-sm btn-primary"><span class="fa fa-file-text-o"></span></button></a>
                            </td>
                            <td>
                                <?php /* if($row_privi['bordero_edicao'] == '1') { */ ?>
                                <a href="ficha_bordero.php?id=<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a>
                                <?php /* } */ ?>
                            </td>
                            <td>
                                <?php /* if($row_privi['bordero_exclusao'] == '1') { */ ?>
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
                                        <h4 class="modal-title">Excluir Borderô</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Tem certeza que deseja excluir o Borderô <b><?php /* echo $dados['numero'] */ ?>/<?php /* echo $ano */ ?></b> ?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                        <a href="delete_bordero.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-primary">Sim</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
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
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                }
            ],
            "order": [[ 0, "desc" ]]
        });
    });
</script>
</html>