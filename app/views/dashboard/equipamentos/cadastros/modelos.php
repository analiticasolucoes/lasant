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
            <?php /* if($row_privi['modelos_equipamento_cadastro'] == '1') { */ ?>
            <form action="add_modelo_equipamento.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Modelo de Equipamento</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Grupo</label>
                                    <select class="form-control" name="id_equipGrupoManutencao" id="id_equipGrupoManutencao" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        $sql_cat = mysql_query("SELECT * FROM ta_equip_grupo_manutencao ORDER BY ds_equipGrupoManutencao ASC") or die (mysql_error());
                                        while($row_cat = mysql_fetch_array($sql_cat)) {
                                        */ ?>
                                        <option value="<?php /* echo $row_cat['id'] */ ?>"><?php /* echo $row_cat['ds_equipGrupoManutencao'] */ ?></option>
                                        <?php /*
                                        }
                                        */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select class="form-control" name="id_equipMarca" id="id_equipMarca" required="required">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <input class="form-control" type="text" id="ds_modelo" name="ds_modelo" placeholder="Modelo" required="required" />
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
            <?php /* } */ ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <?php /* if($row_privi['modelos_equipamento_visualizacao'] == '1') { */ ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-plus"></i> Modelos de Equipamento</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Grupo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php /*
                                $sql_faxinas2 = mysql_query("SELECT * FROM ta_equip_modelo ORDER BY ds_modelo ASC") or die (mysql_error());
                                $total_cadastros = mysql_num_rows($sql_faxinas2);
                                while ($dados_fax = mysql_fetch_array($sql_faxinas2)) {

                                $sql_cat2 = mysql_query("SELECT * FROM ta_equip_marcas WHERE id='".$dados_fax['id_equipMarca']."'") or die (mysql_error());
                                $row_cat2 = mysql_fetch_assoc($sql_cat2);

                                $sql_cat3 = mysql_query("SELECT * FROM ta_equip_grupo_manutencao WHERE id='".$dados_fax['id_equipGrupoManutencao']."'") or die (mysql_error());
                                $row_cat3 = mysql_fetch_assoc($sql_cat3);
                                */ ?>
                                <tr>
                                    <td><?php /* echo $row_cat3['ds_equipGrupoManutencao'] */ ?></td>
                                    <td><?php /* echo $row_cat2['ds_marca'] */ ?></td>
                                    <td><?php /* echo $dados_fax['ds_modelo'] */ ?></td>
                                    <td>
                                        <?php /* if($row_privi['modelos_equipamento_edicao'] == '1') { */ ?>
                                        <a data-toggle="modal" data-target="#modal_plano_<?php /* echo $dados_fax['id'] */ ?>"  class="btn btn-primary"><i class="fa fa-search"></i></a>
                                        <?php /* } */ ?>
                                    </td>
                                    <td>
                                        <?php /* if($row_privi['modelos_equipamento_exclusao'] == '1') { */ ?>
                                        <a data-toggle="modal" data-target="#modal_delete_<?php /* echo $dados_fax['id'] */ ?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                        <?php /* } */ ?>
                                    </td>
                                </tr>
                                <div class="modal" id="modal_plano_<?php /* echo $dados_fax['id'] */ ?>">
                                    <form action="atualizar_modelo_equipamento.php" method="post" enctype="multipart/form-data" target="_self">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Editar Modelo de Equipamento</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_modelo" value="<?php /* echo $dados_fax['id'] */ ?>" />
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Grupo</label>
                                                            <select class="form-control" name="id_equipGrupoManutencao" id="id_equipGrupoManutencao_<?php /* echo $dados_fax['id'] */ ?>" required="required">
                                                                <option value="<?php /* echo $dados_fax['id_equipGrupoManutencao'] */ ?>" selected><?php /* echo $row_cat3['ds_equipGrupoManutencao'] */ ?></option>
                                                                <?php /*
                                                                $sql_cat = mysql_query("SELECT * FROM ta_equip_grupo_manutencao ORDER BY ds_equipGrupoManutencao ASC") or die (mysql_error());
                                                                while($row_cat = mysql_fetch_array($sql_cat)) {
                                                                */ ?>
                                                                <option value="<?php /* echo $row_cat['id'] */ ?>"><?php /* echo $row_cat['ds_equipGrupoManutencao'] */ ?></option>
                                                                <?php /*
                                                                }
                                                                */ ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Marca</label>
                                                            <select class="form-control" name="id_equipMarca" id="id_equipMarca_<?php /* echo $dados_fax['id'] */ ?>" required="required">
                                                                <option value="<?php /* echo $dados_fax['id_equipMarca'] */ ?>" selected><?php /* echo $row_cat2['ds_marca'] */ ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Modelo</label>
                                                            <input class="form-control" type="text" id="ds_modelo" name="ds_modelo" placeholder="Modelo" required="required" value="<?php /* echo $dados_fax['ds_modelo'] */ ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                                    <input type="submit" value="Atualizar" class="btn btn-primary" />
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </form>
                                </div>
                                <div class="modal" id="modal_delete_<?php /* echo $dados_fax['id'] */ ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Excluir Modelo de Equipamento</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Tem certeza que deseja excluir o Modelo <b><?php /* echo $dados_fax['ds_modelo'] */ ?></b> ?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                                <a href="delete_modelo_equipamento.php?id=<?php /* echo $dados_fax['id'] */ ?>" class="btn btn-primary">Sim</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </form>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#id_equipGrupoManutencao_<?php /* echo $dados_fax['id'] */ ?>').change(function() {
                                            var id_equipGrupoManutencao = $(this).val();
                                            $('#id_equipMarca_<?php /* echo $dados_fax['id'] */ ?>').load('listar_marcas.php?id_equipGrupoManutencao='+id_equipGrupoManutencao);
                                        });
                                    });
                                </script>
                                <?php /*
				}
				*/ ?>
                                </tbody>
                                <tfoot>
                                <th>Total Modelos</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th><?php /* echo $total_cadastros */ ?></th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php /* } */ ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
<script>
    $(document).ready(function() {
        $('#id_equipGrupoManutencao').change(function() {
            var id_equipGrupoManutencao = $(this).val();
            $('#id_equipMarca').load('listar_marcas.php?id_equipGrupoManutencao='+id_equipGrupoManutencao);
        });
    });
</script>
</html>
