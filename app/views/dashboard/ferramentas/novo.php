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
            <form action="add_ferramenta.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Ferramenta</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situação</label>
                                    <select class="form-control" name="id_ferramentaSituacao" id="id_ferramentaSituacao" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        $sql_cat = mysql_query("SELECT * FROM ta_equipamento_situacao ORDER BY ds_equipamentoSituacao ASC") or die (mysql_error());
                                        while($row_cat = mysql_fetch_array($sql_cat)) {
                                            */ ?>
                                            <option value="<?php /* echo $row_cat['id'] */ ?>"><?php /* echo $row_cat['ds_equipamentoSituacao'] */ ?></option>
                                            <?php /*
                                        }
                                        */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome Ferramenta</label>
                                    <input class="form-control" type="text" id="nm_ferramenta" name="nm_ferramenta" placeholder="Nome Ferramenta" required="required" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="ds_ferramenta" id="ds_ferramenta" placeholder="Descrição"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Série</label>
                                    <input class="form-control" type="text" id="serie" name="serie" placeholder="Série" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nº Patrimonial</label>
                                    <input class="form-control" type="text" id="nu_patrimonial" name="nu_patrimonial" placeholder="Nº Patrimonial" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Peso</label>
                                    <input class="form-control" type="text" id="peso" name="peso" placeholder="Peso" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voltagem Ferramenta</label>
                                    <input class="form-control" type="text" id="voltagem_ferramenta" name="voltagem_ferramenta" placeholder="Voltagem Ferramenta" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Potência</label>
                                    <input class="form-control" type="text" id="potencia" name="potencia" placeholder="Potência" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Valor</label>
                                    <input class="form-control" type="text" id="valor" name="valor" placeholder="Valor" onkeypress="FormataValor(this.id, 10, event)" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Aquisição</label>
                                    <input class="form-control data" type="text" id="dt_aquisicao" name="dt_aquisicao" placeholder="Data Aquisição" required="required" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto 1</label>
                                    <input type="file" name="arquivo" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto 2</label>
                                    <input type="file" name="arquivo2" />
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
<!-- ./wrapper -->
</body>
<script>
    $(document).ready(function() {
        $('#id_equipGrupoManutencao').change(function() {
            var id_equipGrupoManutencao = $(this).val();
            $('#id_equipSubgrupoManutencao').load('listar_subgrupos.php?id_equipGrupoManutencao='+id_equipGrupoManutencao);
            $('#id_marca_equipamento').load('listar_marcas.php?id_equipGrupoManutencao='+id_equipGrupoManutencao);
        });

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

        $('#id_marca_equipamento').change(function() {
            var id_marca_equipamento = $(this).val();
            $('#id_modelo_equipamento').load('listar_modelos.php?id_equipMarca='+id_marca_equipamento);
        });
    });
</script>
</html>
