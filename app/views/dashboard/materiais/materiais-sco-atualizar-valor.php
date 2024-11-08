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
            <form action="materiais/materiais-sco/valor/atualizar" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Materiais SCO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cod-referencia">Código</label>
                                    <input type="text" name="cod-referencia" id="cod-referencia" class="form-control" placeholder="Código" />
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="descricao">Nome Material / Produto</label>
                                    <input type="text" name="descricao" class="form-control" placeholder="Descrição" id="descricao" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="mes">Mês</label>
                                    <select class="form-control" id="mes" name="mes" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="ano">Ano</label>
                                    <input class="form-control" type="number" id="ano" name="ano" min="1900" max="2100" step="1" placeholder="1900" required>
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
                    <h3 class="box-title"><i class="fa fa-repeat"></i> Atualizar Valor Materiais SCO</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Material/Serviço</th>
                                <th>Unidade</th>
                                <th>Mês/Ano</th>
                                <th>Valor Unitário</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($acao === "resultado"):
                            if(!empty($materiaisSCO)):
                                foreach($materiaisSCO as $materialSCO):
                                    ?>
                                    <tr>
                                        <td><?= $materialSCO->getCodSCO() ?></td>
                                        <td><?= $materialSCO->getDescricaoSCO() ?></td>
                                        <td><?= $materialSCO->getUnidade() ?></td>
                                        <td><?= $materialSCO->getI0SCO()[0]->getMes() . "/" . $materialSCO->getI0SCO()[0]->getAno() ?></td>
                                        <td><?= "R$ " . number_format($materialSCO->getI0SCO()[0]->getValor(), 2, ",", ".") ?></td>
                                        <td>
                                            <a href="javascript:void(0);"
                                               title="Editar"
                                               data-toggle="modal"
                                               data-cod-sco="<?= $materialSCO->getCodSCO() ?>"
                                               data-mes="<?= $materialSCO->getI0SCO()[0]->getMes() ?>"
                                               data-ano="<?= $materialSCO->getI0SCO()[0]->getAno() ?>"
                                               data-valor="<?= number_format($materialSCO->getI0SCO()[0]->getValor(), 2, ",", ".") ?>"
                                               class="btn btn-primary update-link">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            endif;
                        elseif($acao === "pesquisa"):
                            ?>
                            <tr>
                                <td colspan="6">Nenhum resultado a exibir.</td>
                            </tr>
                        <?php endif; ?>
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
<!-- Modal's -->
<!-- Editar -->
<div class="modal" id="update-modal">
    <form id="materiais-sco-atualizar-update-form" action="materiais/materiais-sco/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Atualizar Valor</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="cod-sco" name="cod-sco"/>
                    <input type="hidden" id="mes" name="mes"/>
                    <input type="hidden" id="ano" name="ano"/>
                    <input type="hidden" id="page-search" name="page-search" value=""/>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="valor">Valor (R$)</label>
                            <input class="form-control" type="text" id="valor" name="valor" value="" placeholder="Valor" required/>
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
</body>
<script>
    $(document).ready(function() {
        // Quando o link de edição for clicado
        $('.update-link').on('click', function() {
            var codigo = $(this).data('cod-sco');
            var mes = parseInt($(this).data('mes'));
            var ano = $(this).data('ano');
            var valor = $(this).data('valor');
            console.log(valor);
            // Preenche o campo oculto do formulário no modal com o ID
            $('#update-modal input[name="cod-sco"]').val(codigo);

            $('#update-modal input[name="mes"]').val(mes);

            $('#update-modal input[name="ano"]').val(ano);

            $('#update-modal input[name="valor"]').val(valor);

            // Exibe o modal
            $('#update-modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Obtém o ano atual e define no campo de entrada
        $('#ano').val(new Date().getFullYear());
    });
</script>
<script>
    $(document).ready(function() {
        // Aplica a formatação ao campo de entrada
        $("#valor").on("input", function() {
            let valorFormatado = formatarMoeda($(this).val());
            $(this).val(valorFormatado);
        });
    });
</script>
</html>