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
            <form id="compras-material-add-form" action="/compras/incluir" method="post" enctype="multipart/form-data">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-cart-plus"></i> Cadastro Solicitação Compra</h3>
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
                                    <select class="form-control" id="cliente" name="cliente" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($clientes as $cliente): ?>
                                        <option value="<?= $cliente->getId()?>"><?= $cliente->getNomeEmpresa()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="local">Local</label>
                                    <select class="form-control" id="local" name="local" required disabled>
                                        <option value="" selected>Selecione</option>
                                    </select>
                                </div>
                            </div>
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
                                    <label for="prioridade">Prioridade</label>
                                    <select class="form-control" id="prioridade" name="prioridade" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($prioridades as $prioridade): ?>
                                        <option value="<?= $prioridade->getId() ?>"><?= $prioridade->getPrioridade() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observacoes">Observações</label>
                                    <textarea name="observacoes" class="form-control" rows="4" id="observacoes" placeholder="Observações"></textarea>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" id="adicionar-materiais-button" class="btn btn-primary pull-right ml-2" disabled><i class="fa fa-plus mr-1"></i> Adicionar Materiais</button>
                    </div>
                </div>
                <!-- /.box -->
                <!-- <div class="box box-default collapsed-box hidden"> -->
                <div id="compra-solicitacao-materiais-box" class="box box-default hidden">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-trowel-bricks"></i> Materiais</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <input type="hidden" id="material-id" name="material-id" value="" />
                            <input type="hidden" id="material-classe" name="material-classe" value="" />
                            <input type="hidden" id="material-unidade" name="material-unidade" value="" />
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <a class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-material-search">Pesquisar Material<i class="fa fa-search ml-2"></i></a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="material-codigo">Código SCO</label>
                                <div class="input-group">
                                    <input type="text" id="material-codigo" name="material-codigo" class="form-control pull-left" placeholder="Ex.: 01-01-001-001" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="material-descricao">Material</label>
                                <div class="form-group">
                                    <input type="text" id="material-descricao" name="material-descricao" class="form-control pull-left" placeholder="Descrição do material" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="material-marca">Marca</label>
                                <div class="form-group">
                                    <select id="material-marca" name="material-marca" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="material-quantidade">Quantidade</label>
                                    <input type="number" id="material-quantidade" name="material-quantidade" class="form-control" placeholder="Ex.: 50" min="0" step="0.1" disabled/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="material-observacao-solicitante">Observações (Máximo 30 caracteres)</label>
                                    <input type="text" id="material-observacao-solicitante" name="material-observacao-solicitante" class="form-control" placeholder="Inclua observações sobre o material aqui, caso necessário." maxlength="30" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="material-foto">Foto do material</label>
                                    <input type="file" id="material-foto" name="material-foto" accept=".jpg, .jpeg, .png, .gif" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label></label>
                                    <button type="button" id="adicionar-material-button" name="adicionar-material-button" class="btn btn-primary pull-right" onclick="adicionarMaterial()" disabled>Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2" id="compra-solicitacao-materiais-box">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table id="compra-solicitacao-materiais-table" class="table">
                                        <thead>
                                            <tr>
                                                <th class="hidden"></th>
                                                <th width="10%">Cód.</th>
                                                <th width="45%">Material / Serviço</th>
                                                <th width="10%">Classe</th>
                                                <th width="10%">Marca</th>
                                                <th width="10%">Un.</th>
                                                <th width="10%">Qtd.</th>
                                                <th width="10%">Foto</th>
                                                <th width="5%"></th>
                                                <th class="hidden"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="cadastrar-solicitacao-button" class="btn btn-success pull-right" disabled><i class="fa fa-floppy-disk mr-1"></i> Cadastrar Solicitação</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
<!-- Modal's -->
<div class="modal" id="modal-material-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Excluir Material</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>Tem certeza que deseja <strong>Excluir</strong> este Material?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary pull-right" onclick="excluirMaterial()">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Search Material Modal -->
<div class="modal modal-default" id="modal-material-search">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-search mr-2"></i>Pesquisar Material</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="material-codigo-sco">Código</label>
                            <input type="text" id="material-codigo-sco" name="material-codigo-sco" class="form-control" placeholder="Código SCO" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="material-descricao-pesquisa">Nome do Material / Produto</label>
                        <div class="input-group">
                            <input type="text" id="material-descricao-pesquisa" name="material-descricao-pesquisa" class="form-control pull-left" placeholder="Descrição" />
                            <span class="input-group-btn">
                                <button type="button" id="pesquisar-material-button" class="btn btn-primary pull-right" onclick="pesquisarMaterial()"><i class="fa fa-search mr-2"></i>Pesquisar</button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 table-responsive" id="material-table">
                        <table id="material-lista-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="15%">Cód.</th>
                                    <th width="30%">Material / Serviço</th>
                                    <th width="10%">Classe</th>
                                    <th width="10%">Marca</th>
                                    <th width="10%">UN.</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
<script>
    let dataTableMaterial; // Variável global para armazenar a instância do DataTables
    let materiais = []; // Lista global para armazenar materiais e fotos

    $(document).ready(function() {
        $('#material-codigo, #material-descricao, #material-quantidade').on('input change', verificarCamposMaterial);

        $('#cliente').change(function() {
            var clienteId = $(this).val();

            // Verifica se algum cliente foi selecionado
            if (clienteId) {
                // Faz a requisição Ajax para obter os locais
                $.ajax({
                    url: '/clientes/locais/by-cliente', // URL da rota que retorna os locais por cliente
                    type: 'POST',
                    data: { cliente: clienteId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function(response) {
                        // Habilita o campo de local
                        $('#local').prop('disabled', false);
                        $('#local').empty(); // Limpa o dropdown de local
                        $('#local').append('<option value="" selected>Selecione</option>');

                        // Popula o dropdown com os locais retornados
                        $.each(response, function(index, local) {
                            $('#local').append('<option value="' + local.id + '">' + local.descricao + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao buscar locais: " + error);
                        $('#local').prop('disabled', true); // Desabilita caso haja erro
                    }
                });
            } else {
                // Caso nenhum cliente seja selecionado, desabilita o campo de local
                $('#local').prop('disabled', true);
                $('#local').empty();
                $('#local').append('<option value="" selected>Selecione</option>');
            }
        });

        $('#grupo').change(function () {
            var grupoId = $(this).val(); // Obtém o valor do grupo selecionado

            // Verifica se algum grupo foi selecionado
            if (grupoId) {
                // Faz a requisição Ajax para obter as marcas
                $.ajax({
                    url: '/materiais/marcas-material/by-grupo', // URL da rota que retorna as marcas por grupo
                    type: 'POST',
                    data: { grupo: grupoId }, // Envia o ID do grupo selecionado
                    dataType: 'json',
                    success: function (response) {
                        // Habilita o campo de marca
                        $('#material-marca').prop('disabled', false);
                        $('#material-marca').empty(); // Limpa o dropdown de marcas

                        // Popula o dropdown com as marcas retornadas
                        $.each(response, function (index, marca) {
                            $('#material-marca').append('<option value="' + marca.id + '">' + marca.descricao + '</option>');
                        });
                        $('#material-marca').append('<option value="0">SEM MARCA</option>');
                    },
                    error: function (xhr, status, error) {
                        console.error("Erro ao buscar marcas: " + error);

                        // Desabilita o campo e exibe uma mensagem caso haja erro
                        $('#material-marca').prop('disabled', true);
                        $('#material-marca').empty();
                        $('#material-marca').append('<option value="" selected>Erro ao carregar marcas</option>');
                    }
                });
            } else {
                // Caso nenhum grupo seja selecionado, desabilita o campo de marca
                $('#material-marca').prop('disabled', true);
                $('#material-marca').empty();
                $('#material-marca').append('<option value="" selected>Selecione</option>');
            }
        });

        $('#pesquisar-material-button').click(function () {
            // Obtém os valores dos campos de entrada
            var codigo = $('#material-codigo-sco').val().trim();
            var descricao = $('#material-descricao-pesquisa').val().trim();
            var grupo = $('#grupo').val(); // Lê o valor do grupo selecionado

            // Verifica se o grupo foi selecionado
            if (!grupo) {
                alert("Por favor, selecione um grupo antes de pesquisar materiais.");
                return;
            }

            // Verifica se pelo menos um dos campos (código ou descrição) foi preenchido
            if (!codigo && !descricao) {
                alert("Por favor, preencha pelo menos um dos campos: Código ou Nome do Material/Produto para realizar a pesquisa.");
                return;
            }

            // Seleciona o botão e altera seu estado para "carregando"
            const botaoPesquisar = $('#pesquisar-material-button');
            botaoPesquisar
                .prop("disabled", true) // Desativa o botão
                .html('<i class="fa fa-spinner fa-spin mr-1"></i> Pesquisando...'); // Muda o conteúdo para exibir o spinner

            // Faz a requisição AJAX
            $.ajax({
                url: '/materiais/pesquisar', // URL da rota para pesquisar materiais
                type: 'POST',
                data: {
                    codigo: codigo,
                    descricao: descricao,
                    grupo: grupo // Adiciona o parâmetro grupo
                },
                dataType: 'json',
                success: function (response) {
                    // Verifica se há resultados
                    if (response.length === 0) {
                        alert("Nenhum material encontrado.");
                        // Restaura o botão ao estado inicial
                        botaoPesquisar
                            .prop("disabled", false)
                            .html('<i class="fa fa-search mr-1"></i> Pesquisar');
                        return;
                    }

                    // Atualiza a tabela usando DataTables
                    const dataTableMaterial = $('#material-lista-table').DataTable({
                        data: response, // Dados recebidos
                        columns: [
                            { data: 'codigo' },
                            { data: 'descricao' },
                            { data: 'classe' },
                            { data: 'marca' },
                            { data: 'unidade' },
                            {
                                data: null,
                                render: function (data) {
                                    return `
                                <button type="button" class="btn btn-success btn-sm"
                                    onclick="selecionarMaterial('${data.id}', '${data.codigo}', '${data.descricao}', '${data.classe}', '${data.unidade}')">
                                    <i class="fa fa-check mr-1"></i> Selecionar
                                </button>
                            `;
                                }
                            }
                        ],
                        destroy: true, // Permite reinicializar a tabela
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                        },
                        responsive: true,
                        paging: true,
                        lengthChange: true,
                        searching: true,
                        ordering: true,
                        info: true,
                        autoWidth: false
                    });

                    // Restaura o botão ao estado inicial
                    botaoPesquisar
                        .prop("disabled", false)
                        .html('<i class="fa fa-search mr-1"></i> Pesquisar');
                },
                error: function (xhr, status, error) {
                    console.error("Erro ao buscar materiais: " + error);

                    // Exibe uma mensagem de erro para o usuário
                    alert("Erro ao buscar materiais. Tente novamente mais tarde.");

                    // Restaura o botão ao estado inicial
                    botaoPesquisar
                        .prop("disabled", false)
                        .html('<i class="fa fa-search mr-1"></i> Pesquisar');
                }
            });
        });

        // Função para verificar se há linhas na tabela e habilitar o botão Cadastrar Solicitação
        function verificarTabelaMateriais() {
            var linhasTabela = $('#compra-solicitacao-materiais-table tbody tr');
            if (linhasTabela.length > 0) {
                $('#cadastrar-solicitacao-button').prop('disabled', false);
            } else {
                $('#cadastrar-solicitacao-button').prop('disabled', true);
            }
        }

        // Inicializa o MutationObserver para monitorar alterações no tbody da tabela
        var tabelaObserver = new MutationObserver(function (mutationsList) {
            verificarTabelaMateriais();
        });

        // Configura o observer para o tbody da tabela
        var tabelaTbody = document.querySelector('#compra-solicitacao-materiais-table tbody');
        tabelaObserver.observe(tabelaTbody, { childList: true });

        $('#cadastrar-solicitacao-button').on('click', function (e) {
            e.preventDefault();

            // Cria um objeto FormData
            let formData = new FormData();

            // Adiciona os campos gerais do formulário (input, select, textarea)
            $('#compras-material-add-form').find('input, select, textarea').each(function () {
                let name = $(this).attr('name');
                let value = $(this).val();
                if (name) {
                    formData.append(name, value);
                }
            });

            // Itera sobre o objeto global materiais
            materiais.forEach(function (material, index) {
                // Adiciona os dados do material no FormData
                formData.append(`materiais[${index}][id]`, material.id);
                formData.append(`materiais[${index}][codigo]`, material.codigo);
                formData.append(`materiais[${index}][descricao]`, material.descricao);
                formData.append(`materiais[${index}][classe]`, material.classe);
                formData.append(`materiais[${index}][marca]`, material.marca);
                formData.append(`materiais[${index}][unidade]`, material.unidade);
                formData.append(`materiais[${index}][quantidade]`, material.quantidade);

                // Adiciona o arquivo de foto, se houver
                if (material.foto) {
                    formData.append(`fotos[${index}]`, material.foto);
                }
            });

            // Envia os dados via AJAX
            $.ajax({
                url: '/compras/incluir',
                type: 'POST',
                data: formData,
                processData: false, // Necessário para enviar arquivos
                contentType: false, // Necessário para enviar arquivos
                success: function (response) {
                    alert("Solicitação de compra cadastrada com sucesso!");
                    window.location.href = '/compras/solicitacoes/detalhe?id=' + response.id;
                },
                error: function (xhr, status, error) {
                    console.error("Erro ao cadastrar solicitação de compra: " + error);
                    alert("Ocorreu um erro ao cadastrar a solicitação. Tente novamente.");
                }
            });
        });

        // Inicializa verificando a tabela ao carregar a página
        verificarTabelaMateriais();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Seleciona os elementos necessários
        const cliente = document.getElementById("cliente");
        const local = document.getElementById("local");
        const grupo = document.getElementById("grupo");
        const prioridade = document.getElementById("prioridade");
        const botaoAdicionar = document.getElementById("adicionar-materiais-button");
        const divMateriais = document.getElementById("compra-solicitacao-materiais-box"); // Div dos materiais
        const tabelaMateriais = document.getElementById("compra-solicitacao-materiais-table"); // Tabela de materiais
        const tabelaBody = tabelaMateriais.querySelector("tbody");

        // Função que verifica se todos os campos obrigatórios estão preenchidos
        function verificarCamposObrigatorios() {
            botaoAdicionar.disabled = !(cliente.value &&
                local.value &&
                grupo.value &&
                prioridade.value);
        }

        // Função para exibir a div de materiais
        function exibirDivMateriais(event) {
            event.preventDefault(); // Evita o recarregamento da página
            if (divMateriais) {
                divMateriais.classList.remove("hidden"); // Remove a classe `hidden`
            }
        }

        // Função que verifica o conteúdo da tabela e ajusta o campo grupo
        function verificarTabelaMateriais() {
            const tabelaVisivel = !divMateriais.classList.contains("hidden"); // Verifica se a tabela está visível
            if (tabelaVisivel && tabelaBody.children.length > 0) {
                // Caso a tabela esteja visível e tenha linhas
                grupo.disabled = true; // Torna o campo somente leitura
                grupo.title = "Para alterar o grupo da solicitação, é preciso primeiro excluir os materiais selecionados na tabela abaixo.";
            } else {
                // Caso a tabela esteja oculta ou não tenha linhas
                grupo.disabled = false; // Habilita o campo
                grupo.title = ""; // Remove a mensagem de título
            }
        }

        // Adiciona os event listeners para os campos obrigatórios
        cliente.addEventListener("change", verificarCamposObrigatorios);
        local.addEventListener("change", verificarCamposObrigatorios);
        grupo.addEventListener("change", verificarCamposObrigatorios);
        prioridade.addEventListener("change", verificarCamposObrigatorios);

        // Adiciona o evento de clique ao botão "Adicionar Materiais"
        botaoAdicionar.addEventListener("click", exibirDivMateriais);

        // Chama a função para verificar a tabela ao carregar a página
        verificarTabelaMateriais();

        // Adiciona um MutationObserver para monitorar mudanças no conteúdo do <tbody>
        const observer = new MutationObserver(() => {
            verificarTabelaMateriais(); // Atualiza o estado do campo grupo
        });

        // Configura o observer para observar alterações nos filhos do <tbody>
        observer.observe(tabelaBody, { childList: true });
    });

    // Função chamada ao clicar no botão "Selecionar" de um material
    function selecionarMaterial(id, codigo, descricao, classe, unidade) {
        // Preenche os campos do formulário principal
        $('#material-id').val(id);
        $('#material-codigo').val(codigo);
        $('#material-descricao').val(descricao);
        $('#material-classe').val(classe);
        $('#material-unidade').val(unidade);

        // Habilita o campo de quantidade
        $('#material-quantidade').prop('disabled', false);

        // Fecha o modal
        $('#modal-material-search').modal('hide');

        // Restaura o modal para seu estado original
        resetModalMaterialSearch();
    }

    // Função para restaurar o estado original do modal de pesquisa de materiais
    function resetModalMaterialSearch() {
        // Limpa os campos de pesquisa
        $('#material-codigo-sco').val('');
        $('#material-descricao-pesquisa').val('');

        // Limpa a tabela de resultados
        //$('#material-lista-table tbody').empty();

        // Restaura o botão "Pesquisar" ao estado original
        $('#pesquisar-material-button').prop('disabled', false).html('<i class="fa fa-search mr-2"></i>Pesquisar');
    }

    function verificarCamposMaterial() {
        const codigo = $('#material-codigo').val().trim();
        const descricao = $('#material-descricao').val().trim();
        const quantidade = $('#material-quantidade').val().trim();

        // Verifica se todos os campos estão preenchidos
        if (codigo && descricao && quantidade) {
            $('#adicionar-material-button').prop('disabled', false); // Habilita o botão
        } else {
            $('#adicionar-material-button').prop('disabled', true); // Desabilita o botão
        }
    }

    function adicionarMaterial() {
        // Captura os valores dos campos do formulário
        var materialId = $('#material-id').val();
        var materialCodigo = $('#material-codigo').val();
        var materialDescricao = $('#material-descricao').val();
        var materialClasse = $('#material-classe').val();
        var materialMarca = $('#material-marca option:selected').text();
        var materialUnidade = $('#material-unidade').val();
        var materialQuantidade = $('#material-quantidade').val();
        var materialObservacao = $('#material-observacao-solicitante').val();
        var materialFoto = $('#material-foto')[0]?.files[0];

        // Valida se os campos obrigatórios estão preenchidos
        if (!materialCodigo || !materialDescricao || !materialQuantidade) {
            alert("Preencha todos os campos obrigatórios antes de adicionar o material.");
            return;
        }

        // Adiciona o material ao objeto global
        materiais.push({
            id: materialId,
            codigo: materialCodigo,
            descricao: materialDescricao,
            classe: materialClasse,
            marca: materialMarca,
            unidade: materialUnidade,
            quantidade: materialQuantidade,
            observacao: materialObservacao,
            foto: materialFoto || null,
        });

        // Prepara o valor da coluna Foto
        var materialFotoHtml = "";
        if (materialFoto) {
            var fotoNome = materialFoto.name;
            materialFotoHtml = `<a href="javascript:void(0);" title="Ver foto" onclick="exibirFoto('${fotoNome}')"><i class="fa fa-image"></i></a>`;
        }

        // Cria a nova linha da tabela
        var novaLinha = `
        <tr>
            <td class="hidden">${materialId}</td>
            <td>${materialCodigo}</td>
            <td>${materialDescricao}</td>
            <td>${materialClasse}</td>
            <td>${materialMarca}</td>
            <td>${materialUnidade}</td>
            <td>${materialQuantidade}</td>
            <td>${materialFotoHtml}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removerMaterial(this, '${materialId}')">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <td class="hidden">${materialObservacao}</td>
        </tr>
        `;

        // Adiciona a nova linha na tabela
        $('#compra-solicitacao-materiais-table tbody').append(novaLinha);

        // Limpa os campos do formulário
        limparFormularioMaterial();
    }

    // Função para limpar os campos do formulário após inclusão
    function limparFormularioMaterial() {
        $('#material-id').val('');
        $('#material-codigo').val('');
        $('#material-descricao').val('');
        $('#material-classe').val('');
        $('#material-marca').val('').prop('selected', false);
        $('#material-unidade').val('');
        $('#material-quantidade').val('').prop('disabled', true);
        $('#material-observacao-solicitante').val('');
        $('#material-foto').val('');
        $('#adicionar-material-button').prop('disabled', true);
    }

    // Função para remover uma linha da tabela
    function removerMaterial(botao, materialId) {
        // Remove o material do objeto global
        materiais = materiais.filter(material => material.id !== materialId);

        // Remove a linha da tabela
        $(botao).closest('tr').remove();
    }

    // Função para exibir a foto do material adicionado à solicitacao de compra
    function exibirFoto(nomeFoto) {
        alert(`Visualizar foto: ${nomeFoto}`); // Ajuste para exibir a foto real
    }
</script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('material-lista-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/pt-BR.json',
            }
        });
    });
</script>
</html>