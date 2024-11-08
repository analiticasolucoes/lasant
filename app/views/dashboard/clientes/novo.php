<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistema Lasant - Administrativo</title>
    <base href="<?= BASE_URL ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <!-- Bootstrap 3.3.5 CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- jQuery 3.7.1 -->
    <script src="assets/jquery/3.7.1/jquery-3.7.1.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- Font Awesome -->
    <script defer src="assets/fontawesome/js/brands.js"></script>
    <script defer src="assets/fontawesome/js/solid.js"></script>
    <script defer src="assets/fontawesome/js/fontawesome.js"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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
            <form id="clientes-new-form" action="clientes/incluir" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user"></i> Cadastro Cliente</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 box-title">
                                <h4 class="text-bold">Dados da Empresa:</h4><hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome-empresa">Nome Empresa <sup>*</sup></label>
                                    <input type="text" id="nome-empresa" name="nome-empresa" class="form-control" placeholder="Nome Empresa" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome-fantasia">Nome Fantasia</label>
                                    <input type="text" id="nome-fantasia" name="nome-fantasia" class="form-control" placeholder="Nome Fantasia" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ <sup>*</sup></label>
                                    <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="Ex.: 12.345.678/0001-00" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inscricao-estadual">Inscrição Estadual</label>
                                    <input type="text" name="inscricao-estadual" class="form-control" placeholder="Inscrição Estadual" id="inscricao-estadual" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inscricao-municipal">Inscrição Municipal</label>
                                    <input type="text" name="inscricao-municipal" class="form-control" placeholder="Inscrição Municipal" id="inscricao-municipal" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipo">Tipo de Cliente <sup>*</sup></label>
                                    <select class="form-control" id="tipo" name="tipo" required="required">
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Cliente</option>
                                        <option value="2">Fornecedor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="modelo-os">Modelo de OS <sup>*</sup></label>
                                    <select class="form-control" id="modelo-os" name="modelo-os" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($modelosImpressaoOS as $modelo): ?>
                                        <option value="<?= $modelo->getId()?>"><?= $modelo->getTitulo()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="esfera">Esfera</label>
                                    <select class="form-control" id="esfera" name="esfera">
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($esferas as $esfera): ?>
                                            <option value="<?= $esfera->getId()?>"><?= $esfera->getDescricao()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data-inicio-contrato">Data de Início do Contrato</label>
                                    <input class="form-control" type="date" id="data-inicio-contrato" name="data-inicio-contrato" placeholder="Data de Início do Contrato"  />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea rows="5" id="descricao" name="descricao" class="form-control" placeholder="Escreva uma breve descrição do cliente aqui."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 box-title">
                                <h4 class="text-bold">Contatos:</h4><hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-engenharia">E-mail Engenharia</label>
                                    <input type="text" name="email-engenharia" id="email-engenharia" class="form-control" placeholder="Ex.: engenharia@email.com"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-compras">E-mail Compras</label>
                                    <input type="text" name="email-compras" id="email-compras" class="form-control" placeholder="Ex.: compras@email.com"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-os-cc">E-mail OS CC <sup>(Com Cópia)</sup></label>
                                    <input type="text" name="email-os-cc" id="email-os-cc" class="form-control" placeholder="Ex.: ordem.servico@email.com"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-os-bcc">E-mail OS BCC <sup>(Com Cópia Oculta)</sup></label>
                                    <input type="text" name="email-os-bcc" id="email-os-bcc" class="form-control" placeholder="Ex.: ordem.servico@email.com"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-ss-cc">E-mail SS CC <sup>(Com Cópia)</sup></label>
                                    <input type="text" name="email-ss-cc" id="email-ss-cc" class="form-control" placeholder="Ex.: solicitacao.servico@email.com"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-ss-bcc">E-mail SS BCC <sup>(Com Cópia Oculta)</sup></label>
                                    <input type="text" name="email-ss-bcc" id="email-ss-bcc" class="form-control" placeholder="Ex.: solicitacao.servico@email.com"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone1">Telefone <sup>1</sup></label>
                                    <input type="text" name="telefone1" class="form-control" placeholder="XX 12345678" id="telefone1" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone2">Telefone <sup>2</sup></label>
                                    <input type="text" name="telefone2" class="form-control" placeholder="XX 1234-5678" id="telefone2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone3">Telefone <sup>3</sup></label>
                                    <input type="text" name="telefone3" class="form-control" placeholder="XX 1234-5678" id="telefone3" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone-celular">Telefone Celular</label>
                                    <input type="text" name="telefone-celular" class="form-control" placeholder="XX 98765-4321" id="telefone-celular" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telefone-whatsapp">WhatsApp <sup>Separe os números usando virgula (,)</sup></label>
                                    <input type="text" name="telefone-whatsapp" class="form-control" placeholder="Ex.: XX98765-4321,XX98765-4321" id="telefone-whatsapp"  />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="celulares">Celulares <sup>Separe os números usando virgula (,)</label>
                                    <input type="text" name="celulares" id="celulares" class="form-control" placeholder="Ex.: XX98765-4321,XX98765-4321"  />
                                </div>
                            </div>
                            <div class="col-md-12 box-title">
                                <h4 class="text-bold">Endereço:</h4><hr>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP <sup>*</sup></label>
                                    <input type="text" name="cep" class="form-control" placeholder="12345-678" id="cep" required/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="logradouro">Logradouro <sup>*</sup></label>
                                    <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Ex.: Avenida Delfim Moreira" required/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero">Nº <sup>*</sup></label>
                                    <input type="text" name="numero" id="numero" class="form-control" placeholder="Ex.: 101A" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input type="text" name="complemento-endereco" id="complemento-endereco" class="form-control" placeholder="Ex.: Apartamento 201" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="bairro">Bairro <sup>*</sup></label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Ex.: Leblon" required />
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="cidade">Cidade <sup>*</sup></label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex.: Rio de Janeiro" required/>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="uf">UF <sup>*</sup></label>
                                    <select name="uf" class="form-control" id="uf" required>
                                        <option selected="selected" value="">UF</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="RS">RS</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logotipo">Logotipo</label>
                                    <input class="form-control" type="file" id="logotipo" name="logotipo" />
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <p class="text-bold"><sup>*</sup> Item de preenchimento obrigatório.</p>
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
</body>
<script>
    function formatarCampo(input) {
        $(input).on('input', function() {
            // Permite apenas números, hífen e vírgula
            this.value = this.value.replace(/[^0-9\-,\.]/g, '');
        });
    }
    function formatarCelular(input) {
        $(input).keyup(function() {
            var celular = $(this).val().replace(/\D/g, '');

            // Formata o telefone para 11 dígitos (DDD + 9 dígitos)
            celular = celular.replace(/(\d{2})(\d{5})(\d{4})/, "$1 $2-$3");

            // Atualiza o valor do campo
            $(this).val(celular);
        });
    }
    function formatarTelefone(input) {
        $(input).keyup(function() {
            var telefone = $(this).val().replace(/\D/g, '');

            // Formata o telefone para 11 dígitos (DDD + 9 dígitos)
            telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, "$1 $2-$3");

            // Atualiza o valor do campo
            $(this).val(telefone);
        });
    }
    function formatarCEP(input) {
        $(input).keyup(function() {
            var cep = $(this).val().replace(/\D/g, ''); // Remove todos os caracteres não numéricos

            // Formata o CEP para 8 dígitos com hífen
            cep = cep.replace(/(\d{5})(\d{3})/, '$1-$2');

            // Atualiza o valor do campo
            $(this).val(cep);
        });
    }
    $(document).ready(function() {
        $('#cnpj').keyup(function() {
            // Remove todos os caracteres não numéricos
            var cnpj = $(this).val().replace(/\D/g, '');

            // Formata o CNPJ
            cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");

            // Atualiza o valor do campo
            $(this).val(cnpj);
        });
        formatarCelular('#telefone-celular');
        formatarTelefone('#telefone1');
        formatarTelefone('#telefone2');
        formatarTelefone('#telefone3');
        formatarTelefone('#telefone4');
        formatarCampo('#telefone-whatsapp');
        formatarCampo('#celulares');
        formatarCEP('#cep');
        /* Executa a requisição quando o campo CEP perder o foco */
        $('#cep').blur(function(){
            cep = $('#cep').val();
            $.ajax({
                url: `https://viacep.com.br/ws/${cep}/json/`,
                dataType: 'json',
                success: function(resposta) {
                    if (!resposta.erro) {
                        $('#logradouro').val(resposta.logradouro);
                        $('#bairro').val(resposta.bairro);
                        $('#cidade').val(resposta.localidade);
                        $('#uf').append('<option value="'+resposta.uf+'" selected="selected">'+resposta.uf+'</option>');
                    } else {
                        alert('CEP não encontrado.');
                        $('#logradouro').val('');
                        $('#bairro').val('');
                        $('#cidade').val('');
                        $('#uf').append('<option value="" selected="selected"></option>');
                        $('#cep').val('');
                        return false;
                    }
                }
            });
        })
    });
</script>
</html>