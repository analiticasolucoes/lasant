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
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-screwdriver-wrench"></i> Ferramentas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="ferramentas-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Ferramenta</th>
                            <th>Nº Patrimonial</th>
                            <th>Valor</th>
                            <th>Situação</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $sql_consult2 = mysql_query("SELECT * FROM ta_ferramenta ORDER BY nm_ferramenta ASC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {
                            $id_pet = $dados['id'];

                            $sql_situacao = mysql_query("SELECT * FROM ta_equipamento_situacao WHERE id='".$dados['id_ferramentaSituacao']."'") or die (mysql_error());
                            $row_situacao = mysql_fetch_assoc($sql_situacao);

                            if($dados['status'] == 0) { $status = "Livre"; }
                            if($dados['status'] == 1) { $status = "Ocupada"; }

                            $sql_pav = mysql_query("SELECT * FROM ta_profissional WHERE id='".$dados['id_profissional']."'") or die (mysql_error());
                            $row_pav = mysql_fetch_assoc($sql_pav);
                            $nome_profissional = $row_pav['nm_profissional'];
				        */ ?>
                        <tr>
                            <td><?php /* echo $dados['nm_ferramenta'] */ ?></td>
                            <td><?php /* echo $dados['nu_patrimonial'] */ ?></td>
                            <td><?php /* echo $dados['valor'] */ ?></td>
                            <td><?php /* echo $row_situacao['ds_equipamentoSituacao'] */ ?></td>
                            <td><?php /* echo $status */ ?></td>
                            <td>
                                <?php /* if($row_privi['profissional_edicao'] == '1') { */ ?>
                                <a data-toggle="modal" data-target="#modal_refresh_<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-danger"><span class="fa fa-refresh"></span> Atualizar Status</button></a>
                                <?php /* } */ ?>
                            </td>
                            <td>
                                <?php /* if($row_privi['profissional_edicao'] == '1') { */ ?>
                                <a href="assets/ficha_ferramenta.php?id=<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a>
                                <?php /* } */ ?>
                            </td>
                            <td>
                                <?php /* if($row_privi['profissional_exclusao'] == '1') { */ ?>
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
                                        <h4 class="modal-title">Excluir Ferramenta</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Tem certeza que deseja excluir a Ferramenta <b><?php /* echo $dados['nm_ferramenta'] */ ?></b> ?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                        <a href="assets/delete_ferramenta.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-primary">Sim</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="modal" id="modal_refresh_<?php /* echo $dados['id'] */ ?>">
                            <form action="atualizar_status_ferramenta.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Atualizar Status</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_ferramenta" value="<?php /* echo $dados['id'] */ ?>" />
                                            <?php /* if($dados['status'] == 0) { */ ?>
                                            <input type="hidden" name="tipo" value="1" />
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Selecione o Profissional</label>
                                                    <select class="form-control" id="id_profissional" name="id_profissional" required="required">
                                                        <option value="" selected>Selecione</option>
                                                        <?php /*
                                                        $sql_grupo = mysql_query("SELECT * FROM ta_profissional WHERE status='Ativo' ORDER BY nm_profissional") or die (mysql_error());
                                                        while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                                        */ ?>
                                                        <option value="<?php /* echo $row_grupo['id'] */ ?>"><?php /* echo $row_grupo['nm_profissional'] */ ?></option>
                                                        <?php /* } */ ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php /* } */ ?>
                                            <?php /* if($dados['status'] == 1) { */ ?>
                                            <input type="hidden" name="tipo" value="2" />
                                            <input type="hidden" name="id_profissional" value="<?php /* echo $dados['id_profissional'] */ ?>" />
                                            <p>Receber a Ferramenta de <?php /* echo $nome_profissional */ ?>?</p>
                                            <?php /* } */ ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                            <input type="submit" value="Sim" class="btn btn-primary" />
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
<script>
    $(document).ready(function() {
        dataTableInit("ferramentas-table");
    });
</script>
</html>