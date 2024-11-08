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
            <?php /* if($row_privi['grupos_material_cadastro'] == '1') { */ ?>
            <form id="classes-material-new-form" action="materiais/classes-material/novo" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Classes de Material</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="grupo">Grupo</label>
                                    <select class="form-control" id="grupo" name="grupo" required>
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($gruposMaterial as $grupoMaterial): ?>
                                            <option value="<?= $grupoMaterial->getId() ?>"><?= $grupoMaterial->getDescricao() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subgrupo">Subgrupo</label>
                                    <select class="form-control" id="subgrupo" name="subgrupo" required disabled>
                                        <option value="" selected>Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input class="form-control" type="text" id="codigo" name="codigo" placeholder="Código" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Classe Material" required />
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
                    <?php /* if($row_privi['grupos_material_visualizacao'] == '1') { */ ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-bars-staggered"></i> Classes de Materiais</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Grupo</th>
                                    <th>Subgrupo</th>
                                    <th>Descrição</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(sizeof($classesMaterial)):
                                    foreach($classesMaterial as $classeMaterial):
                                ?>
                                <tr>
                                    <td><?= $classeMaterial->getCodigo() ?></td>
                                    <td><?= $classeMaterial->getGrupo()->getDescricao() ?></td>
                                    <td><?= $classeMaterial->getSubgrupo()->getDescricao() ?></td>
                                    <td><?= $classeMaterial->getDescricao() ?></td>
                                    <td>
                                        <?php /* if($row_privi['grupos_material_edicao'] == '1') { */ ?>
                                        <a href="javascript:void(0);" title="Editar" data-toggle="modal" data-id="<?= $classeMaterial->getId() ?>" data-descricao="<?= $classeMaterial->getDescricao() ?>" data-codigo="<?= $classeMaterial->getCodigo() ?>" data-id-grupo="<?= $classeMaterial->getGrupo()->getId() ?>" data-id-subgrupo="<?= $classeMaterial->getSubgrupo()->getId() ?>" data-descricao-subgrupo="<?= $classeMaterial->getSubgrupo()->getDescricao() ?>" class="btn btn-primary update-link">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php /* } */ ?>
                                    </td>
                                    <td>
                                        <?php /* if($row_privi['grupos_material_exclusao'] == '1') { */ ?>
                                        <a href="javascript:void(0);" title="Excluir" data-toggle="modal" data-id="<?= $classeMaterial->getId() ?>" data-descricao="<?= $classeMaterial->getDescricao() ?>" class="btn btn-danger delete-link">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <?php /* } */ ?>
                                    </td>
                                </tr>
                                    <?php endforeach; ?>
                                <?php else:?>
                                    <tr>
                                        <td>Nenhuma Classe de Materiais Cadastrada</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="2" scope="row">Total de Classes de Materiais: <?php echo sizeof($classesMaterial) ?? "0"; ?></th>
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
    <form id="classes-material-update-form" action="materiais/classes-material/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Classe de Material</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="grupo-editar">Grupo</label>
                                <select class="form-control" id="grupo-editar" name="grupo-editar" required>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach($gruposMaterial as $grupoMaterial): ?>
                                        <option value="<?= $grupoMaterial->getId()?>">
                                            <?= $grupoMaterial->getDescricao()?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subgrupo-editar">Subgrupo</label>
                                <select class="form-control" id="subgrupo-editar" name="subgrupo-editar" required>
                                    <option value="" selected>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="codigo-editar">Código</label>
                                <input class="form-control" type="text" id="codigo-editar" name="codigo-editar" placeholder="Código" value="" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descricao-editar">Descrição</label>
                                <input class="form-control" type="text" id="descricao-editar" name="descricao-editar" placeholder="Descrição" value="" required/>
                            </div>
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
<!-- Delete Modal -->
<div class="modal fade" id="delete-modal">
    <form id="classes-material-delete-form" action="materiais/classes-material/excluir" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Excluir Classe de Material</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Tem certeza que deseja excluir a Classe de Material <b></b> ?</p>
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
            } else {
                // Caso nenhum grupo seja selecionado, desabilita o campo de subgrupo
                $('#subgrupo').prop('disabled', true);
                $('#subgrupo').empty();
                $('#subgrupo').append('<option value="" selected>Selecione</option>');
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
            } else {
                // Caso nenhum grupo seja selecionado, desabilita o campo de subgrupo
                $('#subgrupo-editar').prop('disabled', true);
                $('#subgrupo-editar').empty();
                $('#subgrupo-editar').append('<option value="" selected>Selecione</option>');
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
            var subgrupoDescricao = $(this).data('descricao-subgrupo');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#update-modal input[name="id"]').val(id);

            $('#update-modal input[name="descricao-editar"]').val(descricao);

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

            $('#subgrupo-editar').empty(); // Limpa o dropdown de subgrupo
            $('#subgrupo-editar').append('<option value="' + subgrupoID + '" selected>' + subgrupoDescricao + '</option>');

            // Exibe o modal
            $('#update-modal').modal('show');
        });
    });
</script>
</html>