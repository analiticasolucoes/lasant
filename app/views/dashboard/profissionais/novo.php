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
            <form id="profissionais-new-form" action="profissionais/novo" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user-tie"></i> Cadastro Profissional</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="Ativo" selected>Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- /.col -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                    </div>
                </div>
                <!-- /.box -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
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