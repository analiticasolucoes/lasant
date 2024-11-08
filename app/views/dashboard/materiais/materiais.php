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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="assets/datatables/2.1.8/datatables.css">
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
            <?php /* if($row_privi['material_cadastro'] == '1') { */ ?>
            <form id="materiais-new-form" action="materiais/materiais/novo" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Material</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="grupo">Grupo</label>
                                    <select class="form-control" id="grupo" name="grupo" required>
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($gruposMaterial as $grupoMaterial): ?>
                                            <option value="<?= $grupoMaterial->getId()?>"><?= $grupoMaterial->getDescricao()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subgrupo">Subgrupo</label>
                                    <select class="form-control" id="subgrupo" name="subgrupo" required disabled>
                                        <option value="" selected>Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="classe">Classe</label>
                                    <select class="form-control" id="classe" name="classe" required disabled>
                                        <option value="" selected>Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input class="form-control" type="text" id="codigo" name="codigo" placeholder="Código" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                    <select class="form-control" id="marca" name="marca"  required disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unidade">Unidade</label>
                                    <select class="form-control" id="unidade" name="unidade" required>
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($unidades as $unidade): ?>
                                            <option value="<?= $unidade->getId()?>"><?= $unidade->getDescricao()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input class="form-control" type="text" id="valor" name="valor" placeholder="Valor" onkeyup="formataValor(this.id, 10, event)" required/>
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
                    <?php /* if($row_privi['material_visualizacao'] == '1') { */ ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-trowel-bricks"></i> Materiais</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table id="materiais-table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Grupo</th>
                                    <th>Subgrupo</th>
                                    <th>Classe</th>
                                    <th>Marca</th>
                                    <th>Unidade</th>
                                    <th>Valor</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(sizeof($materiais)):
                                foreach($materiais as $material):
                                ?>
                                    <tr>
                                        <td><?= $material->getCodigo() ?></td>
                                        <td><?= $material->getDescricao() ?></td>
                                        <td><?php if(!is_null($material->getGrupo())) echo $material->getGrupo()->getDescricao(); ?></td>
                                        <td><?php if(!is_null($material->getSubgrupo())) echo $material->getSubgrupo()->getDescricao(); ?></td>
                                        <td><?php if(!is_null($material->getClasse())) echo $material->getClasse()->getDescricao(); ?></td>
                                        <td><?php if(!is_null($material->getMarca())) echo $material->getMarca()->getDescricao(); ?></td>
                                        <td><?php if(!is_null($material->getUnidade())) echo $material->getUnidade()->getDescricao(); ?></td>
                                        <td><?= $material->getValor() ?></td>
                                        <td>
                                            <?php /* if($row_privi['grupos_material_edicao'] == '1') { */ ?>
                                            <a href="javascript:void(0);"
                                               title="Editar"
                                               data-toggle="modal"
                                               data-id="<?= $material->getId() ?>"
                                               data-descricao="<?= $material->getDescricao() ?>"
                                               data-codigo="<?= $material->getCodigo() ?>"
                                               data-valor="<?= $material->getValor() ?>"
                                               data-id-grupo="<?php echo (is_null($material->getGrupo())) ? "" : $material->getGrupo()->getId(); ?>"
                                               data-id-subgrupo="<?php echo (is_null($material->getSubgrupo())) ? "" : $material->getSubgrupo()->getId(); ?>"
                                               data-descricao-subgrupo="<?php echo (is_null($material->getSubgrupo())) ? "" : $material->getSubgrupo()->getDescricao(); ?>"
                                               data-id-classe="<?php echo (is_null($material->getClasse())) ? "" : $material->getClasse()->getId(); ?>"
                                               data-descricao-classe="<?php echo (is_null($material->getClasse())) ? "" : $material->getClasse()->getDescricao(); ?>"
                                               data-id-marca="<?php echo (is_null($material->getMarca())) ? "" : $material->getMarca()->getId(); ?>"
                                               data-descricao-marca="<?php echo (is_null($material->getMarca())) ? "" : $material->getMarca()->getDescricao(); ?>"
                                               data-id-unidade="<?php echo (is_null($material->getUnidade())) ? "" : $material->getUnidade()->getId(); ?>"
                                               data-descricao-unidade="<?php echo (is_null($material->getUnidade())) ? "" : $material->getUnidade()->getDescricao(); ?>"
                                               class="btn btn-primary update-link">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <?php /* } */ ?>
                                        </td>
                                        <td>
                                            <?php /* if($row_privi['grupos_material_exclusao'] == '1') { */ ?>
                                            <a href="javascript:void(0);" title="Excluir" data-toggle="modal" data-id="<?= $material->getId() ?>" data-descricao="<?= $material->getDescricao() ?>" class="btn btn-danger delete-link">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <?php /* } */ ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <tr>
                                        <td>Nenhum Material Cadastrado</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" scope="row">Total de Materiais: <?php echo sizeof($materiais) ?? "0"; ?></th>
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
<!-- Modal's -->
<!-- Update Modal -->
<div class="modal" id="update-modal">
    <form id="materiais-update-form" action="materiais/materiais/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Material</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="grupo-editar">Grupo</label>
                                <select class="form-control" id="grupo-editar" name="grupo-editar" required>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach($gruposMaterial as $grupoMaterial): ?>
                                        <option value="<?= $grupoMaterial->getId()?>"><?= $grupoMaterial->getDescricao()?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subgrupo-editar">Subgrupo</label>
                                <select class="form-control" id="subgrupo-editar" name="subgrupo-editar" required>
                                    <option value="" selected>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="classe-editar">Classe</label>
                                <select class="form-control" id="classe-editar" name="classe-editar" required>
                                    <option value="" selected>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo-editar">Código</label>
                                <input class="form-control" type="text" id="codigo-editar" name="codigo-editar" placeholder="Código" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao-editar">Descrição</label>
                                <input class="form-control" type="text" id="descricao-editar" name="descricao-editar" placeholder="Descrição" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marca-editar">Marca</label>
                                <select class="form-control" id="marca-editar" name="marca-editar" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unidade-editar">Unidade</label>
                                <select class="form-control" id="unidade-editar" name="unidade-editar" required>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach($unidades as $unidade): ?>
                                        <option value="<?= $unidade->getId()?>"><?= $unidade->getDescricao()?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="valor-editar">Valor</label>
                                <input class="form-control" type="text" id="valor-editar" name="valor-editar" placeholder="Valor" onkeyup="formataValor(this.id, 10, event)" required/>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
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
<!-- Delete Modal -->
<div class="modal fade" id="delete-modal">
    <form id="materiais-delete-form" action="materiais/materiais/excluir" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Excluir Material</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Tem certeza que deseja excluir o Material <b></b> ?</p>
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
</body>
<script>
    $(document).ready(function() {
        dataTableInit("materiais-table", {
            searching: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#grupo').change(function() {
            var grupoId = $(this).val();

            // Verifica se algum grupo foi selecionado
            if (grupoId) {
                // Faz a requisição Ajax para obter os subgrupos
                $.ajax({
                    url: '/materiais/subgrupos-material/by-grupo', // URL da rota que vai retornar os subgrupos
                    type: 'POST',
                    data: { grupo: grupoId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de subgrupo
                        $('#subgrupo').prop('disabled', false);
                        $('#subgrupo').empty(); // Limpa o dropdown de subgrupo
                        $('#subgrupo').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com os subgrupos retornados
                        $.each(response, function(index, subgrupo) {
                            $('#subgrupo').append('<option value="' + subgrupo.id + '">' + subgrupo.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar subgrupos: " + error);
                        $('#subgrupo').prop('disabled', true); // Desabilita caso haja erro
                    }
                });

                // Faz a requisição Ajax para obter as marcas
                $.ajax({
                    url: '/materiais/marcas-material/by-grupo', // URL da rota que vai retornar as marcas
                    type: 'POST',
                    data: { grupo: grupoId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de marca
                        $('#marca').prop('disabled', false);
                        $('#marca').empty(); // Limpa o dropdown de marca
                        $('#marca').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com as marcas retornadas
                        $.each(response, function(index, marca) {
                            $('#marca').append('<option value="' + marca.id + '">' + marca.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar marcas: " + error);
                        $('#marca').prop('disabled', true); // Desabilita caso haja erro
                    }
                });
            } else {
                // Caso nenhum grupo seja selecionado, desabilita o campo de subgrupo
                $('#subgrupo').prop('disabled', true);
                $('#subgrupo').empty();
                $('#subgrupo').append('<option value="" selected>Selecione</option>');

                // Caso nenhum grupo seja selecionado, desabilita o campo de classe
                $('#classe').prop('disabled', true);
                $('#classe').empty();
                $('#classe').append('<option value="" selected>Selecione</option>');

                // Caso nenhum grupo seja selecionado, desabilita o campo de classe
                $('#marca').prop('disabled', true);
                $('#marca').empty();
                $('#marca').append('<option value="" selected>Selecione</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#subgrupo').change(function() {
            var subgrupoID = $(this).val();

            // Verifica se algum subgrupo foi selecionado
            if (subgrupoID) {
                // Faz a requisição Ajax para obter as classes
                $.ajax({
                    url: '/materiais/classes-material/by-subgrupo', // URL da rota que vai retornar as classes
                    type: 'POST',
                    data: { subgrupo: subgrupoID }, // Envia o ID do subgrupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de classe
                        $('#classe').prop('disabled', false);
                        $('#classe').empty(); // Limpa o dropdown de classe
                        $('#classe').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com as classes retornadas
                        $.each(response, function(index, classe) {
                            $('#classe').append('<option value="' + classe.id + '">' + classe.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar classes: " + error);
                        $('#classe').prop('disabled', true); // Desabilita caso haja erro
                    }
                });
            } else {
                // Caso nenhum subgrupo seja selecionado, desabilita o campo de classe
                $('#classe').prop('disabled', true);
                $('#classe').empty();
                $('#classe').append('<option value="" selected>Selecione</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#grupo-editar').change(function() {
            var grupoId = $(this).val();

            // Verifica se algum grupo foi selecionado
            if (grupoId) {
                // Faz a requisição Ajax para obter os subgrupos
                $.ajax({
                    url: '/materiais/subgrupos-material/by-grupo', // URL da rota que vai retornar os subgrupos
                    type: 'POST',
                    data: { grupo: grupoId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de subgrupo
                        $('#subgrupo-editar').prop('disabled', false);
                        $('#subgrupo-editar').empty(); // Limpa o dropdown de subgrupo
                        $('#subgrupo-editar').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com os subgrupos retornados
                        $.each(response, function(index, subgrupo) {
                            $('#subgrupo-editar').append('<option value="' + subgrupo.id + '">' + subgrupo.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar subgrupos: " + error);
                        $('#subgrupo-editar').prop('disabled', true); // Desabilita caso haja erro
                    }
                });

                // Faz a requisição Ajax para obter as marcas
                $.ajax({
                    url: '/materiais/marcas-material/by-grupo', // URL da rota que vai retornar as marcas
                    type: 'POST',
                    data: { grupo: grupoId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de marca
                        $('#marca-editar').prop('disabled', false);
                        $('#marca-editar').empty(); // Limpa o dropdown de marca
                        $('#marca-editar').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com as marcas retornadas
                        $.each(response, function(index, marca) {
                            $('#marca-editar').append('<option value="' + marca.id + '">' + marca.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar marcas: " + error);
                        $('#marca-editar').prop('disabled', true); // Desabilita caso haja erro
                    }
                });
            } else {
                // Caso nenhum grupo seja selecionado, desabilita o campo de subgrupo
                $('#subgrupo-editar').prop('disabled', true);
                $('#subgrupo-editar').empty();
                $('#subgrupo-editar').append('<option value="" selected>Selecione</option>');

                // Caso nenhum grupo seja selecionado, desabilita o campo de classe
                $('#classe-editar').prop('disabled', true);
                $('#classe-editar').empty();
                $('#classe-editar').append('<option value="" selected>Selecione</option>');

                // Caso nenhum grupo seja selecionado, desabilita o campo de classe
                $('#marca-editar').prop('disabled', true);
                $('#marca-editar').empty();
                $('#marca-editar').append('<option value="" selected>Selecione</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#subgrupo-editar').change(function() {
            var subgrupoID = $(this).val();

            // Verifica se algum subgrupo foi selecionado
            if (subgrupoID) {
                // Faz a requisição Ajax para obter as classes
                $.ajax({
                    url: '/materiais/classes-material/by-subgrupo', // URL da rota que vai retornar as classes
                    type: 'POST',
                    data: { subgrupo: subgrupoID }, // Envia o ID do subgrupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de classe
                        $('#classe-editar').prop('disabled', false);
                        $('#classe-editar').empty(); // Limpa o dropdown de classe
                        $('#classe-editar').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com as classes retornadas
                        $.each(response, function(index, classe) {
                            $('#classe-editar').append('<option value="' + classe.id + '">' + classe.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar classes: " + error);
                        $('#classe-editar').prop('disabled', true); // Desabilita caso haja erro
                    }
                });
            } else {
                // Caso nenhum subgrupo seja selecionado, desabilita o campo de classe
                $('#classe-editar').prop('disabled', true);
                $('#classe-editar').empty();
                $('#classe-editar').append('<option value="" selected>Selecione</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Quando o link de exclusão for clicado
        $('.delete-link').on('click', function() {
            var itemId = $(this).data('id');  // Captura o ID do item
            var itemDescricao = $(this).data('descricao');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#delete-modal input[name="id"]').val(itemId);

            // Opcional: Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#delete-modal .modal-body p b').text(itemDescricao);

            // Exibe o modal
            $('#delete-modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Quando o link de edição for clicado
        $('.update-link').on('click', function() {
            var id = $(this).data('id');  // Captura o ID do item
            var descricao = $(this).data('descricao');
            var codigo = $(this).data('codigo');
            var grupoID = parseInt($(this).data('id-grupo'));
            var subgrupoID = $(this).data('id-subgrupo');
            var classeID = $(this).data('id-classe');
            var marcaID = $(this).data('id-marca');
            var unidadeID = $(this).data('id-unidade');
            var subgrupoDescricao = $(this).data('descricao-subgrupo');
            var classeDescricao = $(this).data('descricao-classe');
            var marcaDescricao = $(this).data('descricao-marca');
            var unidadeDescricao = $(this).data('descricao-unidade');
            var valor = $(this).data('valor');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#update-modal input[name="id"]').val(id);

            $('#update-modal input[name="descricao-editar"]').val(descricao);

            $('#update-modal input[name="valor-editar"]').val(valor);

            $('#update-modal input[name="codigo-editar"]').val(codigo);

            // Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#update-modal .modal-body p b').text(descricao);

            $('#grupo-editar option').each(function() {
                if (parseInt($(this).val()) === grupoID) {
                    // Define o option como selected
                    $(this).prop('selected', true);
                } else {
                    // Desmarca outros options
                    $(this).prop('selected', false);
                }
            });

            $('#unidade-editar option').each(function() {
                if (parseInt($(this).val()) === unidadeID) {
                    // Define o option como selected
                    $(this).prop('selected', true);
                } else {
                    // Desmarca outros options
                    $(this).prop('selected', false);
                }
            });

            $('#subgrupo-editar').empty(); // Limpa o dropdown de subgrupo
            $('#subgrupo-editar').append('<option value="' + subgrupoID + '" selected>' + subgrupoDescricao + '</option>');

            $('#classe-editar').empty(); // Limpa o dropdown de subgrupo
            $('#classe-editar').append('<option value="' + classeID + '" selected>' + classeDescricao + '</option>');

            $('#marca-editar').empty(); // Limpa o dropdown de subgrupo
            $('#marca-editar').append('<option value="' + marcaID + '" selected>' + marcaDescricao + '</option>');

            // Exibe o modal
            $('#update-modal').modal('show');
        });
    });
</script>
</html>