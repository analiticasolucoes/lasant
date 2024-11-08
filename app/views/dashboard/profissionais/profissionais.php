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
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-user-tie"></i> Profissionais</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Cargo</th>
                            <th>Nascimento</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($profissionais)):
                            foreach($profissionais as $profissional):
                        ?>
                            <tr>
                                <td><?= $profissional->getNome() /* echo $dados['nome'] */ ?></td>
                                <td><?= $profissional->getCPF() /* echo $dados['cpf'] */ ?></td>
                                <td><?= $profissional->getTelefone() /* echo $dados['telefone'] */ ?></td>
                                <td><?= $profissional->getCargo()->getDescricao() /* echo $cargo */ ?></td>
                                <td><?= DateTime::createFromFormat('Y-m-d', $profissional->getDtNascimento())->format("d/m/Y") /* echo $dt-nascimento */ ?></td>
                                <td>
                                    <?php /* if($row_privi['profissional_edicao'] == '1') { */ ?>
                                    <a
                                        href="javascript:void(0);"
                                        title="Editar"
                                        data-toggle="modal"
                                        data-id="<?= $profissional->getId() ?>"
                                        data-nome="<?= $profissional->getNome() ?>"
                                        data-cpf="<?= $profissional->getCPF() ?>"
                                        data-id-cargo="<?= $profissional->getCargo()->getId() ?>"
                                        data-cargo="<?= $profissional->getCargo()->getDescricao() ?>"
                                        data-dt-nascimento="<?= $profissional->getDtNascimento() ?>"
                                        data-telefone="<?= $profissional->getTelefone() ?>"
                                        data-tamanho-calcado="<?= $profissional->getTamanhoCalcado() ?>"
                                        data-tamanho-calca="<?= $profissional->getTamanhoCalca() ?>"
                                        data-tamanho-camisa="<?= $profissional->getTamanhoCamisa() ?>"
                                        data-valor-passagem="<?= $profissional->getValorPassagem() ?>"
                                        data-qtd-passagem="<?= $profissional->getQtdPassagem() ?>"
                                        data-valor-passagem1="<?= $profissional->getValorPassagem1() ?>"
                                        data-qtd-passagem1="<?= $profissional->getQtdPassagem1() ?>"
                                        data-valor-passagem2="<?= $profissional->getValorPassagem2() ?>"
                                        data-qtd-passagem2="<?= $profissional->getQtdPassagem2() ?>"
                                        data-valor-passagem3="<?= $profissional->getValorPassagem3() ?>"
                                        data-qtd-passagem3="<?= $profissional->getQtdPassagem3() ?>"
                                        class="btn btn-primary update-link">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <?php /* } */ ?>
                                </td>
                                <td>
                                    <?php /* if($row_privi['profissional_exclusao'] == '1') { */ ?>
                                    <a
                                        href="javascript:void(0);"
                                        title="Excluir"
                                        data-toggle="modal"
                                        data-id="<?= $profissional->getId() ?>"
                                        data-nome="<?= $profissional->getNome() ?>"
                                        class="btn btn-danger delete-link">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <?php /* } */ ?>
                                </td>
                            </tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="5">Nenhum resultado a exibir.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
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
    <form id="profissionais-update-form" action="profissionais/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Ficha do Profissional</h4>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <legend><h4>Informações Pessoais</h4></legend>
                        <input type="hidden" name="id" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o Nome" required value="<?php /* echo $row_profissional['nome'] */ ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF" value="<?php /* echo $row_profissional['cpf'] */ ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <select class="form-control" id="cargo" name="cargo" required>
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($cargos as $cargo): ?>
                                            <option value="<?= $cargo->getId()?>"><?= $cargo->getDescricao() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dt-nascimento">Data de Nascimento</label>
                                    <input class="form-control" type="date" id="dt-nascimento" name="dt-nascimento" value="<?php /* echo $dt-nascimento */ ?>" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="tel" name="telefone" class="form-control" placeholder="Digite o telefone" id="telefone" value="<?php /* echo $row_profissional['telefone'] */ ?>" pattern="[0-9]{10,15}" />
                                </div>
                            </div>
                            <!-- Tamanho -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tamanho-pe">Tamanho do Calçado</label>
                                    <input type="text" name="tamanho-calcado" class="form-control" placeholder="Tamanho do Calçado" id="tamanho-calcado" value="<?php /* echo $row_profissional['tamanho-pe'] */ ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tamanho-calca">Tamanho da Calça</label>
                                    <input type="text" name="tamanho-calca" class="form-control" placeholder="Tamanho da Calça" id="tamanho-calca" value="<?php /* echo $row_profissional['tamanho-calca'] */ ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tamanho-camisa">Tamanho da Camisa</label>
                                    <input type="text" name="tamanho-camisa" class="form-control" placeholder="Tamanho da Camisa" id="tamanho-camisa" value="<?php /* echo $row_profissional['tamanho-camisa'] */ ?>" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><h4>Informações Financeiras</h4></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-passagem">Valor da Passagem (1)</label>
                                    <input type="text" name="valor-passagem" class="form-control" placeholder="R$ 0,00" id="valor-passagem" value="<?php /* echo $row_profissional['valor-passagem'] */ ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qtd-passagem">Qtd Passagem (1)</label>
                                    <input type="number" name="qtd-passagem" class="form-control" placeholder="0" id="qtd-passagem" value="<?php /* echo $row_profissional['qtd-passagem'] */ ?>" min="0" />
                                </div>
                            </div>
                            <!-- Campos de valor e quantidade de passagens -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-passagem1">Valor da Passagem (2)</label>
                                    <input type="text" name="valor-passagem1" class="form-control" placeholder="R$ 0,00" id="valor-passagem1" value="<?php /* echo $row_profissional['valor-passagem1'] */ ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qtd-passagem1">Qtd Passagem (2)</label>
                                    <input type="number" name="qtd-passagem1" class="form-control" placeholder="0" id="qtd-passagem1" value="<?php /* echo $row_profissional['qtd-passagem1'] */ ?>" min="0" />
                                </div>
                            </div>
                            <!-- Replicar para Passagem 2 e Passagem 3 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-passagem2">Valor da Passagem (3)</label>
                                    <input type="text" name="valor-passagem2" class="form-control" placeholder="R$ 0,00" id="valor-passagem2" value="<?php /* echo $row_profissional['valor-passagem2'] */ ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qtd-passagem2">Qtd Passagem (3)</label>
                                    <input type="number" name="qtd-passagem2" class="form-control" placeholder="0" id="qtd-passagem2" value="<?php /* echo $row_profissional['qtd-passagem2'] */ ?>" min="0" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-passagem3">Valor da Passagem (4)</label>
                                    <input type="text" name="valor-passagem3" class="form-control" placeholder="R$ 0,00" id="valor-passagem3" value="<?php /* echo $row_profissional['valor-passagem3'] */ ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qtd-passagem3">Qtd Passagem (4)</label>
                                    <input type="number" name="qtd-passagem3" class="form-control" placeholder="0" id="qtd-passagem3" value="<?php /* echo $row_profissional['qtd-passagem3'] */ ?>" min="0" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total das Passagens</label>
                                    <p id="total-passagens" style="font-size:22px; font-weight:bold;"></p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete-modal">
    <form id="profissionais-delete-form" action="profissionais/excluir" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Excluir Profissional</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Tem certeza que deseja excluir o Profissional <b></b> ?</p>
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
        // Quando o link de exclusão for clicado
        $('.delete-link').on('click', function() {
            var id = $(this).data('id');  // Captura o ID do item
            var nome = $(this).data('nome');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#delete-modal input[name="id"]').val(id);

            // Opcional: Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#delete-modal .modal-body p b').text(nome);

            // Exibe o modal
            $('#delete-modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Quando o link de edição for clicado
        $('.update-link').on('click', function() {
            var id = $(this).data('id');
            var nome = $(this).data('nome');
            var cpf = $(this).data('cpf');
            var cargoID = $(this).data('id-cargo');
            var cargoDescricao = $(this).data('cargo');
            var dtNascimento = $(this).data('dt-nascimento');
            var telefone = $(this).data('telefone');
            var tamanhoCalcado = $(this).data('tamanho-calcado');
            var tamanhoCalca = $(this).data('tamanho-calca');
            var tamanhoCamisa = $(this).data('tamanho-camisa');
            var valorPassagem = $(this).data('valor-passagem');
            var qtdPassagem = $(this).data('qtd-passagem');
            var valorPassagem1 = $(this).data('valor-passagem1');
            var qtdPassagem1 = $(this).data('qtd-passagem1');
            var valorPassagem2 = $(this).data('valor-passagem2');
            var qtdPassagem2 = $(this).data('qtd-passagem2');
            var valorPassagem3 = $(this).data('valor-passagem3');
            var qtdPassagem3 = $(this).data('qtd-passagem3');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#update-modal input[name="id"]').val(id);
            $('#update-modal input[name="nome"]').val(nome);
            $('#update-modal input[name="cpf"]').val(cpf);
            $('#update-modal input[name="dt-nascimento"]').val(dtNascimento);
            $('#update-modal input[name="telefone"]').val(telefone);
            $('#update-modal input[name="tamanho-calcado"]').val(tamanhoCalcado);
            $('#update-modal input[name="tamanho-calca"]').val(tamanhoCalca);
            $('#update-modal input[name="tamanho-camisa"]').val(tamanhoCamisa);
            $('#update-modal input[name="valor-passagem"]').val(valorPassagem);
            $('#update-modal input[name="qtd-passagem"]').val(qtdPassagem);
            $('#update-modal input[name="valor-passagem1"]').val(valorPassagem1);
            $('#update-modal input[name="qtd-passagem1"]').val(qtdPassagem1);
            $('#update-modal input[name="valor-passagem2"]').val(valorPassagem2);
            $('#update-modal input[name="qtd-passagem2"]').val(qtdPassagem2);
            $('#update-modal input[name="valor-passagem3"]').val(valorPassagem3);
            $('#update-modal input[name="qtd-passagem3"]').val(qtdPassagem3);

            $('#cargo option').each(function() {
                if (parseInt($(this).val()) === cargoID) {
                    // Define o option como selected
                    $(this).prop('selected', true);
                } else {
                    // Desmarca outros options
                    $(this).prop('selected', false);
                }
            });

            $('#cargo').empty(); // Limpa o dropdown de subgrupo
            $('#cargo').append('<option value="' + cargoID + '" selected>' + cargoDescricao + '</option>');

            // Exibe o modal
            $('#update-modal').modal('show');
        });
    });
</script>
<script>
    // Função para ajuste decimal
    (function(){
        function decimalAdjust(type, value, exp) {
            if (typeof exp === 'undefined' || +exp === 0) {
                return Math[type](value);
            }
            value = +value;
            exp = +exp;
            if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
                return NaN;
            }
            value = value.toString().split('e');
            value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
            value = value.toString().split('e');
            return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
        }
        if (!Math.round10) {
            Math.round10 = function(value, exp) {
                return decimalAdjust('round', value, exp);
            };
        }
    })();

    // Função para formatar valores em moeda
    function formatarMoeda(valor) {
        valor = valor.replace(/\D/g, ""); // Remove caracteres não numéricos
        valor = (valor / 100).toFixed(2); // Converte para número e divide por 100
        let partes = valor.split(".");
        let inteiro = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        let decimal = partes.length > 1 ? "." + partes[1] : "";
        return "R$ " + inteiro + decimal; // Adiciona o símbolo de moeda
    }

    // Adiciona a funcionalidade ao carregar a página
    $(document).ready(function() {
        // Aplica a formatação ao campo de entrada de cada valor de passagem
        for (let i = 0; i <= 3; i++) {
            $(`#valor-passagem${i === 0 ? '' : i}`).on("input", function() {
                let valorFormatado = formatarMoeda($(this).val());
                $(this).val(valorFormatado);
                calcularTotalPassagens(); // Recalcula total ao formatar
            });
            $(`#qtd-passagem${i === 0 ? '' : i}`).on("input", calcularTotalPassagens); // Recalcula total ao alterar quantidade
        }

        // Função para calcular o total das passagens
        function calcularTotalPassagens() {
            let total = 0;
            for (let i = 0; i <= 3; i++) {
                const valor = parseFloat($(`#valor-passagem${i === 0 ? '' : i}`).val().replace("R$ ", "").replace(",", ".").replace(/\./g, "")) / 100 || 0;
                const quantidade = parseInt($(`#qtd-passagem${i === 0 ? '' : i}`).val()) || 0;
                total += valor * quantidade;
            }
            const totalArredondado = Math.round10(total, -2);
            const totalFormatado = "R$ " + (totalArredondado).toFixed(2).replace(".", ",").replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Formata o total
            $('#total-passagens').text(totalFormatado);
        }

        // Cálculo inicial
        calcularTotalPassagens();
    });
</script>
<script>
    const today = new Date();
    const maxDate = today.toISOString().split("T")[0]; // Formata a data no formato YYYY-MM-DD
    document.getElementById("dt-nascimento").setAttribute("max", maxDate);
</script>
</html>