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
            <form action="javascript:pesquisar();" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Solicitações de Compra</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control" id="cliente" name="cliente">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($clientes as $cliente): ?>
                                        <option value="<?= $cliente->getId()?>"><?= $cliente->getNomeEmpresa()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data-inicial">Data Inicial (Data da Solicitação)</label>
                                    <input type="date" id="data-inicial" name="data-inicial" class="form-control" max="<?= date('Y-m-d') ?>" placeholder="Data Inicial (Cadastro)" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data-final">Data Final (Data da Solicitação)</label>
                                    <input type="date" id="data-final" name="data-final" class="form-control" max="<?= date('Y-m-d') ?>" placeholder="Data Final (Data da Solicitação)" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="situacao">Situação</label>
                                    <select class="form-control" id="situacao" name="situacao">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($situacoes as $situacao): ?>
                                        <option value="<?= $situacao->getSituacao()?>"><?= $situacao->getSituacao()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-search mr-2"></span>Pesquisar</button>
                    </div>
                </div>
            </form>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-shopping-cart mr-2"></i>Solicitações de Compra</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="solicitacoes-compra-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Local</th>
                                <th>Operador</th>
                                <th>Prioridade</th>
                                <th>Situação</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $data_inicial = implode("-",array_reverse(explode("/",$_POST['data_inicial'])))." 00:00:00";
                        $data_final = implode("-",array_reverse(explode("/",$_POST['data_final'])))." 23:59:59";

                        if($_POST['data_inicial'] != "" and $_POST['data_final'] != "") { $b1 = "AND dt_solicitacao BETWEEN '$data_inicial' AND '$data_final'"; }
                        if($_POST['id_cliente'] != "") { $b2 = "AND id_cliente='".$_POST['id_cliente']."'"; }
                        if($_POST['id_situacao'] != "") { $b3 = "AND id_situacao='".$_POST['id_situacao']."'"; }

                        $sql_consult2 = mysql_query("SELECT * FROM tb_cotacao WHERE id_situacao!='0' AND tipo='0' $b1 $b2 $b3 ORDER BY id DESC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {

                        $dt_solicitacao = date('d/m/Y H:i:s', strtotime($dados['dt_solicitacao']));

                        $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                        $row_cliente = mysql_fetch_assoc($sql_cliente);

                        $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                        $row_loc = mysql_fetch_assoc($sql_loc);

                        $sql_operador = mysql_query("SELECT * FROM tb_usuario WHERE id='".$dados['id_operador']."'") or die (mysql_error());
                        $row_operador = mysql_fetch_assoc($sql_operador);

                        $sql_situ = mysql_query("SELECT * FROM tb_situacao_cotacao WHERE id='".$dados['id_situacao']."'") or die (mysql_error());
                        $row_situ = mysql_fetch_assoc($sql_situ);

                        $sql_priori = mysql_query("SELECT * FROM tb_prioridade_compra WHERE id='".$dados['id_prioridade']."'") or die (mysql_error());
                        $row_priori = mysql_fetch_assoc($sql_priori);

                        if($dados['id_situacao'] == 1) { $cor_situacao = "#e9e458"; }
                        if($dados['id_situacao'] == 2) { $cor_situacao = "#6acfff"; }
                        if($dados['id_situacao'] == 3) { $cor_situacao = "#26379e"; }
                        if($dados['id_situacao'] == 4) { $cor_situacao = "#2a8819"; }
                        if($dados['id_situacao'] == 5) { $cor_situacao = "#dec047"; }
                        if($dados['id_situacao'] == 6) { $cor_situacao = "#400040"; }
                        if($dados['id_situacao'] == 7) { $cor_situacao = "#1a5c49"; }
                        if($dados['id_situacao'] == 8) { $cor_situacao = "#de5d47"; }
                        */ ?>
                        <?php /* } */ ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <?php /* } */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
<!-- Modals -->
<!-- Alterar Situacao Update Modal -->
<div class="modal fade" id="update-modal-compras-solicitacoes-situacao">
    <form id="compras-solicitacoes-update-form" action="compras/solicitacoes/situacao/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Alterar Situação da Compra</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <select class="form-control" id="situacao" name="situacao">
                                    <option value="" selected>Selecione</option>
                                    <?php foreach($situacoes as $situacao): ?>
                                    <option value="<?= $situacao->getId()?>"><?= $situacao->getSituacao()?></option>
                                    <?php endforeach; ?>
                                </select>
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
</body>
<script>
    let dataTable; // Variável global para armazenar a instância do DataTables

    $(document).ready(function () {
        // Inicializar o DataTables vazio no carregamento da página
        dataTable = $("#solicitacoes-compra-table").DataTable({
            data: [], // Começa vazio
            columns: [
                { data: "numero" },
                { data: "data" },
                { data: "cliente" },
                { data: "local" },
                { data: "operador" },
                { data: "prioridade" },
                {
                    data: null,
                    render: function (data) {
                        const situacao = data.situacao.toLowerCase().replace(/ /g, "-");
                        return `<span class="badge situacao-compra-text situacao-${situacao}">${data.situacao}</span>`;
                    }
                },
                {
                    data: null,
                    render: function (data) {
                        return `
                            <a
                                href="compras/solicitacoes/detalhe?id=${data.numero}"
                                title="Detalhar"
                                class="btn btn-sm btn-primary"
                            >
                                <i class="fa fa-search"></i>
                            </a>
                            <a
                                href="javascript:void(0);"
                                title="Alterar Situação"
                                class="btn btn-sm btn-warning update-link"
                                data-toggle="modal"
                                data-modal="update-modal-compras-solicitacoes-situacao"
                                data-id="${data.numero}"
                                data-situacao="${data.situacao}"
                            >
                                <i class="fa fa-refresh"></i>
                            </a>
                        `;
                    }
                }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            },
            responsive: true,
            destroy: true, // Permite reinicializar o DataTables
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false
        });

        // Delegação de eventos para capturar cliques em links dinâmicos
        $('#solicitacoes-compra-table').on('click', '.update-link', function () {
            var numero = $(this).data('id');
            var situacao = $(this).data('situacao');

            console.log("Número:", numero);
            console.log("Situação:", situacao);

            // Preenche o campo oculto do formulário no modal com os dados
            $('#update-modal-compras-solicitacoes-situacao input[name="id"]').val(numero);
            $('#update-modal-compras-solicitacoes-situacao input[name="situacao"]').val(situacao);

            // Exibe o modal
            $('#update-modal-compras-solicitacoes-situacao').modal('show');
        });
    });

    function pesquisar() {
        // Coletar os valores do formulário
        const cliente = $("#cliente").val();
        const dataInicial = $("#data-inicial").val();
        const dataFinal = $("#data-final").val();
        const situacao = $("#situacao").val();

        // URL da rota de pesquisa
        const url = "/compras/solicitacoes/pesquisa";

        // Selecionar o botão e alterar o estado para "carregando"
        const botaoPesquisar = $(".box-footer button[type='submit']");
        botaoPesquisar
            .prop("disabled", true) // Desativa o botão
            .html('<i class="fa fa-spinner fa-spin"></i> Pesquisando...'); // Muda o conteúdo

        // Requisição AJAX via POST
        $.ajax({
            url: url,
            method: "POST",
            data: {
                cliente: cliente,
                data_inicial: dataInicial,
                data_final: dataFinal,
                situacao: situacao
            },
            dataType: "json",
            success: function (response) {
                // Atualizar os dados da tabela com o retorno
                dataTable.clear().rows.add(response).draw();

                // Restaurar o botão ao estado inicial
                botaoPesquisar
                    .prop("disabled", false) // Reativa o botão
                    .html('<span class="fa fa-search"></span> Pesquisar'); // Restaura o conteúdo original
            },
            error: function (xhr, status, error) {
                // Tratar erros
                console.error("Erro ao pesquisar:", error);
                alert("Ocorreu um erro ao realizar a pesquisa. Tente novamente.");

                // Restaurar o botão ao estado inicial
                botaoPesquisar
                    .prop("disabled", false)
                    .html('<span class="fa fa-search"></span> Pesquisar');
            }
        });
    }
</script>
</html>