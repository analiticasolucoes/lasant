<?php /*
$sql_consult = mysql_query("SELECT * FROM tb_caixinha WHERE id='".$_GET['id']."'") or die (mysql_error());
$row_consult = mysql_fetch_assoc($sql_consult);

$data = date('d/m/Y', strtotime($row_consult['data']));

$sql_user = mysql_query("SELECT * FROM tb_usuario WHERE id='".$row_consult['id_usuario']."'") or die (mysql_error());
$row_user = mysql_fetch_assoc($sql_user);
*/ ?>
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
    <?php /* if($row_consult['id_usuario'] == $_SESSION['usuarioID'] or $row_privi['master'] == '1') { */ ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-cubes"></span> Ficha da Caixinha</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Usuário</label>
                                    <select class="form-control" id="id_usuario" name="id_usuario" disabled>
                                        <option value="<?php /* echo $row_user['id'] */ ?>" selected><?php /* echo $row_user['nome'] */ ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" name="data" class="form-control" placeholder="Data" id="data" value="<?php /* echo $data */ ?>" disabled  />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Valor</label>
                                    <input type="text" name="valor" class="form-control" placeholder="Valor" id="valor" onkeypress="FormataValor(this.id, 10, event)" value="<?php /* echo $row_consult['valor'] */ ?>" disabled />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" placeholder="Título" id="titulo" value="<?php /* echo $row_consult['titulo'] */ ?>" disabled />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Arquivo</label>
                                    <p>
                                        <a href="<?php /* echo $row_consult['arquivo'] */ ?>" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i> Visualizar</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <?php /* if($row_consult['id_usuario'] == $_SESSION['usuarioID']) { */ ?>
                    <form action="add_item_caixinha.php" method="post" enctype="multipart/form-data" target="_self">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-plus"></i> Inserir Item na Caixinha</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <input type="hidden" name="id-caixinha" value="<?php /* echo $_GET['id'] */ ?>" />
                                    <input type="hidden" name="id-usuario" value="<?php /* echo $row_consult['id_usuario'] */ ?>" />
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="data">Data</label>
                                            <input type="date" name="data" class="form-control" placeholder="Data" id="data" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="valor2">Valor</label>
                                            <input type="text" name="valor" class="form-control" placeholder="Valor" id="valor2" onkeypress="FormataValor(this.id, 10, event)" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="observacao">Observação</label>
                                            <textarea class="form-control" id="observacao" name="observacao" placeholder="Observação"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Arquivo</label>
                                            <input type="file" name="arquivo">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                            </div>
                        </div>
                        <!-- /.box -->
                    </form>
                <?php /* } */ ?>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> Itens da Caixinha</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Título</th>
                                    <th>Valor</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php /*
                            $sql_consult2 = mysql_query("SELECT * FROM tb_itens_caixinha WHERE id_caixinha='".$_GET['id']."' ORDER BY id DESC") or die (mysql_error());
                            while ($dados = mysql_fetch_array($sql_consult2)) {
                                $data_item = date('d/m/Y', strtotime($dados['data']));
                                $total += $dados['valor'];
                            */ ?>
                                <tr>
                                    <td><?php /* echo $data_item */ ?></td>
                                    <td><?php /* echo $dados['titulo'] */ ?></td>
                                    <td>R$ <?php /* echo number_format($dados['valor'], 2, ',','.'); */ ?></td>
                                    <td><a data-toggle="modal" data-target="#pop_edita_<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a></td>
                                    <td>
                                    <?php /* if($row_consult['id_usuario'] == $_SESSION['usuarioID']) { */ ?>
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
                                                <h4 class="modal-title">Excluir Item</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Tem certeza que deseja excluir o Item <b><?php /* echo $dados['titulo'] */ ?></b> ?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                                <a href="delete_item_caixinha.php?id=<?php /* echo $dados['id'] */ ?>&id_caixinha=<?php /* echo $_GET['id'] */ ?>" class="btn btn-primary">Sim</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </form>
                                </div>
                                <div class="modal" id="pop_edita_<?php /* echo $dados['id'] */ ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-blue">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Item Caixinha</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Título</label>
                                                            <p><?php /* echo $dados['titulo'] */ ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Data</label>
                                                            <p><?php /* echo $data_item */ ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Valor</label>
                                                            <p>R$ <?php /* echo number_format($dados['valor'], 2, ',','.'); */ ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Observação</label>
                                                            <p><?php /* echo $dados['obs'] */ ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Arquivo</label>
                                                            <p>
                                                                <a href="<?php /* echo $dados['arquivo'] */ ?>" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i> Visualizar</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <?php /* } */ ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Valor Total</th>
                                    <td>R$ <?php /* echo number_format($total, 2, ',','.'); */ ?></td>
                                </tr>
                            </tfoot>
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
</html>