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
            <?php /* if($row_privi['resp_tec_cadastro'] == '1') { */ ?>
            <form action="add_responsavel.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Responsável Técnico</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="form-control" type="text" id="nome_rt" name="nome_rt" placeholder="Nome" required="required" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CREA</label>
                                    <input class="form-control" type="text" id="crea" name="crea" placeholder="CREA" required="required" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>UF CREA</label>
                                    <input class="form-control" type="text" id="uf_crea" name="uf_crea" placeholder="UF CREA" required="required" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Emissão</label>
                                    <input class="form-control data" type="text" id="dt_emissao" name="dt_emissao" placeholder="Data Emissão" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título 1</label>
                                    <input class="form-control" type="text" id="titulo1" name="titulo1" placeholder="Título 1" required="required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título 2</label>
                                    <input class="form-control" type="text" id="titulo2" name="titulo2" placeholder="Título 2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título 3</label>
                                    <input class="form-control" type="text" id="titulo3" name="titulo3" placeholder="Título 3" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título 4</label>
                                    <input class="form-control" type="text" id="titulo4" name="titulo4" placeholder="Título 4" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título 5</label>
                                    <input class="form-control" type="text" id="titulo5" name="titulo5" placeholder="Título 5" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone 1</label>
                                    <input class="form-control" type="text" id="telefone1" name="telefone1" placeholder="Telefone 1" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone 2</label>
                                    <input class="form-control" type="text" id="telefone2" name="telefone2" placeholder="Telefone 2" />
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
                    <?php /* if($row_privi['resp_tec_visualizacao'] == '1') { */ ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-plus"></i> Responsável Técnicos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Responsável Técnico</th>
                                    <th>CREA</th>
                                    <th>Telefone</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php /*
                                $sql_faxinas2 = mysql_query("SELECT * FROM ta_rt_obra ORDER BY id DESC") or die (mysql_error());
                                $total_cadastros = mysql_num_rows($sql_faxinas2);
                                while ($dados_fax = mysql_fetch_array($sql_faxinas2)) {
                                */ ?>
                                <tr>
                                    <td><?php /* echo $dados_fax['nome_rt'] */ ?></td>
                                    <td><?php /* echo $dados_fax['crea'] */ ?></td>
                                    <td><?php /* echo $dados_fax['telefone1'] */ ?></td>
                                    <td>
                                        <?php /* if($row_privi['resp_tec_edicao'] == '1') { */ ?>
                                        <a data-toggle="modal" data-target="#modal_plano_<?php /* echo $dados_fax['id'] */ ?>"  class="btn btn-primary"><i class="fa fa-search"></i></a>
                                        <?php /* } */ ?>
                                    </td>
                                    <td>
                                        <?php /* if($row_privi['resp_tec_exclusao'] == '1') { */ ?>
                                        <a data-toggle="modal" data-target="#modal_delete_<?php /* echo $dados_fax['id'] */ ?>"  class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                        <?php /* } */ ?>
                                    </td>
                                </tr>
                                <div class="modal" id="modal_plano_<?php /* echo $dados_fax['id'] */ ?>">
                                    <form action="atualizar_responsavel.php" method="post" enctype="multipart/form-data" target="_self">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Editar Responsável</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_responsavel" value="<?php /* echo $dados_fax['id'] */ ?>" />
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nome</label>
                                                            <input class="form-control" type="text" id="nome_rt" name="nome_rt" placeholder="Nome" required="required" value="<?php /* echo $dados_fax['nome_rt'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>CREA</label>
                                                            <input class="form-control" type="text" id="crea" name="crea" placeholder="CREA" required="required" value="<?php /* echo $dados_fax['crea'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>UF CREA</label>
                                                            <input class="form-control" type="text" id="uf_crea" name="uf_crea" placeholder="UF CREA" required="required" value="<?php /* echo $dados_fax['uf_crea'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Data Emissão</label>
                                                            <input class="form-control data" type="text" id="dt_emissao" name="dt_emissao" placeholder="Data Emissão" value="<?php /* echo $dados_fax['dt_emissao'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Título 1</label>
                                                            <input class="form-control" type="text" id="titulo1" name="titulo1" placeholder="Título 1" required="required" value="<?php /* echo $dados_fax['titulo1'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Título 2</label>
                                                            <input class="form-control" type="text" id="titulo2" name="titulo2" placeholder="Título 2" value="<?php /* echo $dados_fax['titulo2'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Título 3</label>
                                                            <input class="form-control" type="text" id="titulo3" name="titulo3" placeholder="Título 3" value="<?php /* echo $dados_fax['titulo3'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Título 4</label>
                                                            <input class="form-control" type="text" id="titulo4" name="titulo4" placeholder="Título 4" value="<?php /* echo $dados_fax['titulo4'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Título 5</label>
                                                            <input class="form-control" type="text" id="titulo5" name="titulo5" placeholder="Título 5" value="<?php /* echo $dados_fax['titulo5'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Telefone 1</label>
                                                            <input class="form-control" type="text" id="telefone1" name="telefone1" placeholder="Telefone 1" required="required" value="<?php /* echo $dados_fax['telefone1'] */ ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Telefone 2</label>
                                                            <input class="form-control" type="text" id="telefone2" name="telefone2" placeholder="Telefone 2" value="<?php /* echo $dados_fax['telefone2'] */ ?>" />
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
                                                <h4 class="modal-title">Excluir Responsável</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Tem certeza que deseja excluir o Responsável Técnico <b><?php /* echo $dados_fax['nome_rt'] */ ?></b> ?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                                <a href="delete_responsavel_tecnico.php?id=<?php /* echo $dados_fax['id'] */ ?>" class="btn btn-primary">Sim</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </form>
                                </div>
                                <?php /* } */ ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total de Responsáveis Técnicos</td>
                                    </tr>
                                    <tr>
                                        <td><?php /* echo $total_cadastros */ ?></td>
                                    </tr>
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
</div>
</body>
</html>