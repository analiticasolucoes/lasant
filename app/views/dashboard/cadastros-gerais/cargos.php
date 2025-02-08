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
            <?php /* if($row_privi['cargo_cadastro'] == '1') { */ ?>
                <form id="cargos-new-form" action="cadastros-gerais/cargos/novo" method="post" enctype="multipart/form-data" target="_self">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Cargo</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao">Cargo</label>
                                        <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Cargo" required="required" />
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
                    <?php /* if($row_privi['cargo_visualizacao'] == '1') { */ ?>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-user-nurse"></i> Cargos</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(sizeof($cargos)):
                                        foreach($cargos as $cargo):
                                    ?>
                                        <tr>
                                            <td><?= $cargo->getDescricao() ?></td>
                                            <td>
                                                <?php /* if($row_privi['cargo_edicao'] == '1') { */ ?>
                                                <a title="Editar" data-toggle="modal" data-target="#modal_plano_<?= $cargo->getId() ?>" class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <?php /* } */ ?>
                                            </td>
                                            <td>
                                                <?php /* if($row_privi['cargo_exclusao'] == '1') { */ ?>
                                                <a title="Excluir" data-toggle="modal" data-target="#modal_delete_<?= $cargo->getId() ?>" class="btn btn-danger">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                                <?php /* } */ ?>
                                            </td>
                                        </tr>
                                        <div class="modal" id="modal_plano_<?= $cargo->getId() ?>">
                                            <form id="cargos-update-form" action="cadastros-gerais/cargos/atualizar" method="post" enctype="multipart/form-data" target="_self">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title">Editar Cargo</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?= $cargo->getId() ?>" />
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="descricao">Cargo</label>
                                                                    <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Cargo" value="<?= $cargo->getDescricao() ?>" required="required"  />
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
                                        <div class="modal" id="modal_delete_<?= $cargo->getId() ?>">
                                            <form id="cargos-delete-form" action="cadastros-gerais/cargos/excluir" method="post" enctype="multipart/form-data" target="_self">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">Excluir Cargo</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?= $cargo->getId() ?>" />
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p>Tem certeza que deseja excluir o Cargo <b><?= $cargo->getDescricao() ?></b> ?</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                                            <input type="submit" value="Sim" class="btn btn-danger" />
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </form>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else:?>
                                    <tr>
                                        <td>Nenhum Cargo Cadastrado</td>
                                    </tr>
                                <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="row">Total Cargos: <?php echo sizeof($cargos) ?? "0"; ?></th>
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