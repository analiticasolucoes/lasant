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
            <?php /* if($row_privi['cad_rel_cadastro'] == '1') { */ ?>
            <form id="relatorio-new-form" action="cadastros-gerais/relatorios/novo" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Relatório</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Nome Relatório</label>
                                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome Relatório" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo">Tipo Relatório</label>
                                    <select class="form-control" id="tipo" name="tipo" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Administração</option>
                                        <option value="2">Engenharia</option>
                                        <option value="3">Faturamento</option>
                                        <option value="4">Cliente</option>
                                        <option value="5">Refrigeração</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="caminho">Caminho Relatório</label>
                                    <input class="form-control" type="text" id="caminho" name="caminho" placeholder="Caminho Relatório" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p1">Parâmetro 1</label>
                                    <input class="form-control" type="text" id="p1" name="p1" placeholder="Parâmetro 1" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo1">Tipo Parâmetro 1</label>
                                    <select class="form-control" id="tipo1" name="tipo1" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Campo Livre</option>
                                        <option value="2">Data</option>
                                        <option value="3">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tabela1">Tabela do Parâmetro 1</label>
                                    <input class="form-control" type="text" id="tabela1" name="tabela1" placeholder="Tabela do Parâmetro 1" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coluna1">Coluna do Parâmetro 1</label>
                                    <input class="form-control" type="text" id="coluna1" name="coluna1" placeholder="Coluna do Parâmetro 1" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome1">Coluna Exibição 1</label>
                                    <input class="form-control" type="text" id="nome1" name="nome1" placeholder="Coluna Exibição 1" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p2">Parâmetro 2</label>
                                    <input class="form-control" type="text" id="p2" name="p2" placeholder="Parâmetro 2" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo2">Tipo Parâmetro 2</label>
                                    <select class="form-control" id="tipo2" name="tipo2" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Campo Livre</option>
                                        <option value="2">Data</option>
                                        <option value="3">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tabela2">Tabela do Parâmetro 2</label>
                                    <input class="form-control" type="text" id="tabela2" name="tabela2" placeholder="Tabela do Parâmetro 2" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coluna2">Coluna do Parâmetro 2</label>
                                    <input class="form-control" type="text" id="coluna2" name="coluna2" placeholder="Coluna do Parâmetro 2" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome2">Coluna Exibição 2</label>
                                    <input class="form-control" type="text" id="nome2" name="nome2" placeholder="Coluna Exibição 2" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p3">Parâmetro 3</label>
                                    <input class="form-control" type="text" id="p3" name="p3" placeholder="Parâmetro 3" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo3">Tipo Parâmetro 3</label>
                                    <select class="form-control" id="tipo3" name="tipo3" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Campo Livre</option>
                                        <option value="2">Data</option>
                                        <option value="3">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tabela3">Tabela do Parâmetro 3</label>
                                    <input class="form-control" type="text" id="tabela3" name="tabela3" placeholder="Tabela do Parâmetro 3" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coluna3">Coluna do Parâmetro 3</label>
                                    <input class="form-control" type="text" id="coluna3" name="coluna3" placeholder="Coluna do Parâmetro 3" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome3">Coluna Exibição 3</label>
                                    <input class="form-control" type="text" id="nome3" name="nome3" placeholder="Coluna Exibição 3" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p4">Parâmetro 4</label>
                                    <input class="form-control" type="text" id="p4" name="p4" placeholder="Parâmetro 4" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo4">Tipo Parâmetro 4</label>
                                    <select class="form-control" id="tipo4" name="tipo4" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Campo Livre</option>
                                        <option value="2">Data</option>
                                        <option value="3">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tabela4">Tabela do Parâmetro 4</label>
                                    <input class="form-control" type="text" id="tabela4" name="tabela4" placeholder="Tabela do Parâmetro 4" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coluna4">Coluna do Parâmetro 4</label>
                                    <input class="form-control" type="text" id="coluna4" name="coluna4" placeholder="Coluna do Parâmetro 4" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome4">Coluna Exibição 4</label>
                                    <input class="form-control" type="text" id="nome4" name="nome4" placeholder="Coluna Exibição 4" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p5">Parâmetro 5</label>
                                    <input class="form-control" type="text" id="p5" name="p5" placeholder="Parâmetro 5" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo5">Tipo Parâmetro 5</label>
                                    <select class="form-control" id="tipo5" name="tipo5" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Campo Livre</option>
                                        <option value="2">Data</option>
                                        <option value="3">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tabela5">Tabela do Parâmetro 5</label>
                                    <input class="form-control" type="text" id="tabela5" name="tabela5" placeholder="Tabela do Parâmetro 5" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coluna5">Coluna do Parâmetro 5</label>
                                    <input class="form-control" type="text" id="coluna5" name="coluna5" placeholder="Coluna do Parâmetro 5" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome5">Coluna Exibição 5</label>
                                    <input class="form-control" type="text" id="nome5" name="nome5" placeholder="Coluna Exibição 5" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p6">Parâmetro 6</label>
                                    <input class="form-control" type="text" id="p6" name="p6" placeholder="Parâmetro 6" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo6">Tipo Parâmetro 6</label>
                                    <select class="form-control" id="tipo6" name="tipo6" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Campo Livre</option>
                                        <option value="2">Data</option>
                                        <option value="3">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tabela6">Tabela do Parâmetro 6</label>
                                    <input class="form-control" type="text" id="tabela6" name="tabela6" placeholder="Tabela do Parâmetro 6" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coluna6">Coluna do Parâmetro 6</label>
                                    <input class="form-control" type="text" id="coluna6" name="coluna6" placeholder="Coluna do Parâmetro 6" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome6">Coluna Exibição 6</label>
                                    <input class="form-control" type="text" id="nome6" name="nome6" placeholder="Coluna Exibição 6" />
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
            </form>
            <?php /* } */ ?>
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <?php /* if($row_privi['cad_rel_visualizacao'] == '1') { */ ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-file-lines"></i> Relatórios Criados</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Caminho</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(sizeof($relatorios)):
                                    foreach($relatorios as $relatorio):
                                ?>
                                <tr>
                                    <td><?= $relatorio->getNome() ?></td>
                                    <td><?= $relatorio->getDescricaoTipo($relatorio->getTipo()) ?></td>
                                    <td><?= $relatorio->getCaminho() ?></td>
                                    <td>
                                        <?php /* if($row_privi['cad_rel_edicao'] == '1') { */ ?>
                                        <a title="Editar" data-toggle="modal" data-target="#modal_plano_<?= $relatorio->getId() ?>"  class="btn btn-primary">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php /* } */ ?>
                                    </td>
                                    <td>
                                        <?php /* if($row_privi['cad_rel_exclusao'] == '1') { */ ?>
                                        <a title="Excluir" data-toggle="modal" data-target="#modal_delete_<?= $relatorio->getId() ?>"  class="btn btn-danger">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                        <?php /* } */ ?>
                                    </td>
                                </tr>
                                <div class="modal" id="modal_delete_<?= $relatorio->getId() ?>">
                                    <form id="relatorio-delete-form" action="cadastros-gerais/relatorios/excluir" method="post" enctype="multipart/form-data" target="_self">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <input type="hidden" name="id" value="<?= $relatorio->getId() ?>" />
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Excluir Relatório</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>Tem certeza que deseja excluir o Relatório <b><?= $relatorio->getNome() ?></b> ?</p>
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
                                        <td>Nenhum Relatório Cadastrado</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th scope="row">Total de Relatórios Cadastrados: <?php echo sizeof($relatorios) ?? "0"; ?></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php /* } */ ?>
                </div>
            </div>
            <?php
            if(sizeof($relatorios)):
                foreach($relatorios as $relatorio):
            ?>
            <div class="modal" id="modal_plano_<?= $relatorio->getId() ?>">
                <form id="relatorio-update-form" action="cadastros-gerais/relatorios/atualizar" method="post" enctype="multipart/form-data" target="_self">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Editar Relatório</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $relatorio->getId() ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nome Relatório</label>
                                        <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome Relatório" required value="<?= $relatorio->getNome() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tipo Relatório</label>
                                        <select class="form-control" id="tipo" name="tipo" required>
                                            <option value="1" <?php if($relatorio->getTipo() === 1) echo "selected"; ?>>Administração</option>
                                            <option value="2" <?php if($relatorio->getTipo() === 2) echo "selected"; ?>>Engenharia</option>
                                            <option value="3" <?php if($relatorio->getTipo() === 3) echo "selected"; ?>>Faturamento</option>
                                            <option value="4" <?php if($relatorio->getTipo() === 4) echo "selected"; ?>>Cliente</option>
                                            <option value="5" <?php if($relatorio->getTipo() === 5) echo "selected"; ?>>Refrigeração</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Caminho Relatório</label>
                                        <input class="form-control" type="text" id="caminho" name="caminho" placeholder="Caminho Relatório" required value="<?= $relatorio->getCaminho() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parâmetro 1</label>
                                        <input class="form-control" type="text" id="p1" name="p1" placeholder="Parâmetro 1" value="<?= $relatorio->getP1() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo Parâmetro 1</label>
                                        <select class="form-control" id="tipo1" name="tipo1">
                                            <option value="1" <?php if($relatorio->getTipo1() === 1) echo "selected"; ?>>Campo Livre</option>
                                            <option value="2" <?php if($relatorio->getTipo1() === 2) echo "selected"; ?>>Data</option>
                                            <option value="3" <?php if($relatorio->getTipo1() === 3) echo "selected"; ?>>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tabela do Parâmetro 1</label>
                                        <input class="form-control" type="text" id="tabela1" name="tabela1" placeholder="Tabela do Parâmetro 1" value="<?= $relatorio->getTabela1() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna do Parâmetro 1</label>
                                        <input class="form-control" type="text" id="coluna1" name="coluna1" placeholder="Coluna do Parâmetro 1" value="<?= $relatorio->getColuna1() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna Exibição 1</label>
                                        <input class="form-control" type="text" id="nome1" name="nome1" placeholder="Coluna Exibição 1" value="<?= $relatorio->getNome1() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parâmetro 2</label>
                                        <input class="form-control" type="text" id="p2" name="p2" placeholder="Parâmetro 2" value="<?= $relatorio->getP2() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo Parâmetro 2</label>
                                        <select class="form-control" id="tipo2" name="tipo2">
                                            <option value="1" <?php if($relatorio->getTipo2() === 1) echo "selected"; ?>>Campo Livre</option>
                                            <option value="2" <?php if($relatorio->getTipo2() === 2) echo "selected"; ?>>Data</option>
                                            <option value="3" <?php if($relatorio->getTipo2() === 3) echo "selected"; ?>>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tabela do Parâmetro 2</label>
                                        <input class="form-control" type="text" id="tabela2" name="tabela2" placeholder="Tabela do Parâmetro 2" value="<?= $relatorio->getTabela2() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna do Parâmetro 2</label>
                                        <input class="form-control" type="text" id="coluna2" name="coluna2" placeholder="Coluna do Parâmetro 2" value="<?= $relatorio->getColuna2() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna Exibição 2</label>
                                        <input class="form-control" type="text" id="nome2" name="nome2" placeholder="Coluna Exibição 2" value="<?= $relatorio->getNome2() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parâmetro 3</label>
                                        <input class="form-control" type="text" id="p3" name="p3" placeholder="Parâmetro 3" value="<?= $relatorio->getP2() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo Parâmetro 3</label>
                                        <select class="form-control" id="tipo3" name="tipo3">
                                            <option value="1" <?php if($relatorio->getTipo3() === 1) echo "selected"; ?>>Campo Livre</option>
                                            <option value="2" <?php if($relatorio->getTipo3() === 2) echo "selected"; ?>>Data</option>
                                            <option value="3" <?php if($relatorio->getTipo3() === 3) echo "selected"; ?>>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tabela do Parâmetro 3</label>
                                        <input class="form-control" type="text" id="tabela3" name="tabela3" placeholder="Tabela do Parâmetro 3" value="<?= $relatorio->getTabela3() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna do Parâmetro 3</label>
                                        <input class="form-control" type="text" id="coluna3" name="coluna3" placeholder="Coluna do Parâmetro 3" value="<?= $relatorio->getColuna3() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna Exibição 3</label>
                                        <input class="form-control" type="text" id="nome3" name="nome3" placeholder="Coluna Exibição 3" value="<?= $relatorio->getNome3() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parâmetro 4</label>
                                        <input class="form-control" type="text" id="p4" name="p4" placeholder="Parâmetro 4" value="<?= $relatorio->getP3() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo Parâmetro 4</label>
                                        <select class="form-control" id="tipo4" name="tipo4">
                                            <option value="1" <?php if($relatorio->getTipo4() === 1) echo "selected"; ?>>Campo Livre</option>
                                            <option value="2" <?php if($relatorio->getTipo4() === 2) echo "selected"; ?>>Data</option>
                                            <option value="3" <?php if($relatorio->getTipo4() === 3) echo "selected"; ?>>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tabela do Parâmetro 4</label>
                                        <input class="form-control" type="text" id="tabela4" name="tabela4" placeholder="Tabela do Parâmetro 4" value="<?= $relatorio->getTabela4() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna do Parâmetro 4</label>
                                        <input class="form-control" type="text" id="coluna4" name="coluna4" placeholder="Coluna do Parâmetro 4" value="<?= $relatorio->getColuna4() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna Exibição 4</label>
                                        <input class="form-control" type="text" id="nome4" name="nome4" placeholder="Coluna Exibição 4" value="<?= $relatorio->getNome4() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parâmetro 5</label>
                                        <input class="form-control" type="text" id="p5" name="p5" placeholder="Parâmetro 5" value="<?= $relatorio->getP5() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo Parâmetro 5</label>
                                        <select class="form-control" id="tipo5" name="tipo5">
                                            <option value="1" <?php if($relatorio->getTipo5() === 1) echo "selected"; ?>>Campo Livre</option>
                                            <option value="2" <?php if($relatorio->getTipo5() === 2) echo "selected"; ?>>Data</option>
                                            <option value="3" <?php if($relatorio->getTipo5() === 3) echo "selected"; ?>>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tabela do Parâmetro 5</label>
                                        <input class="form-control" type="text" id="tabela5" name="tabela5" placeholder="Tabela do Parâmetro 5" value="<?= $relatorio->getTabela5() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna do Parâmetro 5</label>
                                        <input class="form-control" type="text" id="coluna5" name="coluna5" placeholder="Coluna do Parâmetro 5" value="<?= $relatorio->getColuna5() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna Exibição 5</label>
                                        <input class="form-control" type="text" id="nome5" name="nome5" placeholder="Coluna Exibição 5" value="<?= $relatorio->getNome5() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parâmetro 6</label>
                                        <input class="form-control" type="text" id="p6" name="p6" placeholder="Parâmetro 6" value="<?= $relatorio->getP6() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo Parâmetro 6</label>
                                        <select class="form-control" id="tipo6" name="tipo6">
                                            <option value="1" <?php if($relatorio->getTipo6() === 1) echo "selected"; ?>>Campo Livre</option>
                                            <option value="2" <?php if($relatorio->getTipo6() === 2) echo "selected"; ?>>Data</option>
                                            <option value="3" <?php if($relatorio->getTipo6() === 3) echo "selected"; ?>>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tabela do Parâmetro 6</label>
                                        <input class="form-control" type="text" id="tabela6" name="tabela6" placeholder="Tabela do Parâmetro 6" value="<?= $relatorio->getTabela6() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna do Parâmetro 6</label>
                                        <input class="form-control" type="text" id="coluna6" name="coluna6" placeholder="Coluna do Parâmetro 6" value="<?= $relatorio->getColuna6() ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coluna Exibição 6</label>
                                        <input class="form-control" type="text" id="nome6" name="nome6" placeholder="Coluna Exibição 6" value="<?= $relatorio->getNome6() ?>" />
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
            <?php
                endforeach;
            endif;
            ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /.content-wrapper -->
<?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
</html>