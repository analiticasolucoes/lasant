<?php /*
$sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$_GET['id']."'") or die (mysql_error());
$row_cliente = mysql_fetch_assoc($sql_cliente);

$sql_model = mysql_query("SELECT * FROM ta_modelo_impressao_os WHERE id='".$row_cliente['modelo_os']."'") or die (mysql_error());
$row_model = mysql_fetch_assoc($sql_model);

$modelo_os = $row_model['titulo'];

if($row_cliente['tipo'] == 1) { $tipo = "Cliente"; }
if($row_cliente['tipo'] == 2) { $tipo = "Fornecedor"; }

$dt_inicontrato = implode("/",array_reverse(explode("-",$row_cliente['dt_inicontrato'])));

$sql_esf = mysql_query("SELECT * FROM ta_esfera WHERE id='".$row_cliente['id_esfera']."'") or die (mysql_error());
$row_esf = mysql_fetch_assoc($sql_esf);
$esfera = $row_esf['ds_esfera'];
*/ ?>
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="assets/datatables/2.1.8/datatables.css">
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
            <form id="clientes-update-form" action="clientes/atualizar" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user"></i> Ficha Cliente</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
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
                                    <input type="text" id="nome-empresa" name="nome-empresa" class="form-control" placeholder="Nome Empresa" value="<?= $cliente->getNomeEmpresa() ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome-fantasia">Nome Fantasia</label>
                                    <input type="text" id="nome-fantasia" name="nome-fantasia" class="form-control" placeholder="Nome Fantasia" value="<?= $cliente->getNomeFantasia() ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ <sup>*</sup></label>
                                    <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="Ex.: 12.345.678/0001-00" value="<?= $cliente->getCNPJ() ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inscricao-estadual">Inscrição Estadual</label>
                                    <input type="text" name="inscricao-estadual" class="form-control" placeholder="Inscrição Estadual" id="inscricao-estadual" value="<?= $cliente->getInscricaoEstadual() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inscricao-municipal">Inscrição Municipal</label>
                                    <input type="text" name="inscricao-municipal" class="form-control" placeholder="Inscrição Municipal" id="inscricao-municipal" value="<?= $cliente->getInscricaoMunicipal() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipo">Tipo de Cliente <sup>*</sup></label>
                                    <select class="form-control" id="tipo" name="tipo" required="required">
                                        <option value="1" <?php if($cliente->getTipo() === 1) echo "selected" ?>>Cliente</option>
                                        <option value="2" <?php if($cliente->getTipo() === 2) echo "selected" ?>>Fornecedor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="modelo-os">Modelo de OS <sup>*</sup></label>
                                    <select class="form-control" id="modelo-os" name="modelo-os" required="required">
                                        <?php foreach($modelosImpressaoOS as $modelo): ?>
                                            <option value="<?= $modelo->getId()?>" <?php if($cliente->getModeloOS() === $modelo->getId()) echo "selected" ?>><?= $modelo->getTitulo()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="esfera">Esfera</label>
                                    <select class="form-control" id="esfera" name="esfera">
                                        <?php if(!$cliente->getEsfera()->getId()) echo "<option value=\"\" selected>Selecione</option>"; ?>
                                        <?php foreach($esferas as $esfera): ?>
                                            <option value="<?= $esfera->getId()?>" <?php if($cliente->getEsfera() && $cliente->getEsfera()->getId() === $esfera->getId()) echo "selected" ?>><?= $esfera->getDescricao()?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data-inicio-contrato">Data de Início do Contrato</label>
                                    <input class="form-control" type="date" id="data-inicio-contrato" name="data-inicio-contrato" placeholder="Data de Início do Contrato" value="<?= $cliente->getDtInicioContrato() ?>" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea rows="5" id="descricao" name="descricao" class="form-control" placeholder="Escreva uma breve descrição do cliente aqui."><?= $cliente->getDescricao() ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 box-title">
                                <h4 class="text-bold">Contatos:</h4><hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-engenharia">E-mail Engenharia</label>
                                    <input type="text" name="email-engenharia" id="email-engenharia" class="form-control" placeholder="Ex.: engenharia@email.com" value="<?= $cliente->getEmailEngenharia() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-compras">E-mail Compras</label>
                                    <input type="text" name="email-compras" id="email-compras" class="form-control" placeholder="Ex.: compras@email.com" value="<?= $cliente->getEmailCompras() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-os-cc">E-mail OS CC <sup>(Com Cópia)</sup></label>
                                    <input type="text" name="email-os-cc" id="email-os-cc" class="form-control" placeholder="Ex.: ordem.servico@email.com" value="<?= $cliente->getEmailOSCC() ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-os-bcc">E-mail OS BCC <sup>(Com Cópia Oculta)</sup></label>
                                    <input type="text" name="email-os-bcc" id="email-os-bcc" class="form-control" placeholder="Ex.: ordem.servico@email.com" value="<?= $cliente->getEmailOSBCC() ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-ss-cc">E-mail SS CC <sup>(Com Cópia)</sup></label>
                                    <input type="text" name="email-ss-cc" id="email-ss-cc" class="form-control" placeholder="Ex.: solicitacao.servico@email.com" value="<?= $cliente->getEmailSSCC() ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-ss-bcc">E-mail SS BCC <sup>(Com Cópia Oculta)</sup></label>
                                    <input type="text" name="email-ss-bcc" id="email-ss-bcc" class="form-control" placeholder="Ex.: solicitacao.servico@email.com" value="<?= $cliente->getEmailSSBCC() ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone1">Telefone <sup>1</sup></label>
                                    <input type="text" name="telefone1" class="form-control" placeholder="XX 12345678" id="telefone1" value="<?= $cliente->getTelefone1() ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone2">Telefone <sup>2</sup></label>
                                    <input type="text" name="telefone2" class="form-control" placeholder="XX 1234-5678" id="telefone2" value="<?= $cliente->getTelefone2() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone3">Telefone <sup>3</sup></label>
                                    <input type="text" name="telefone3" class="form-control" placeholder="XX 1234-5678" id="telefone3" value="<?= $cliente->getTelefone3() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone-celular">Telefone Celular</label>
                                    <input type="text" name="telefone-celular" class="form-control" placeholder="XX 98765-4321" id="telefone-celular" value="<?= $cliente->getTelefoneCelular() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telefone-whatsapp">WhatsApp <sup>Separe os números usando virgula (,)</sup></label>
                                    <input type="text" name="telefone-whatsapp" class="form-control" placeholder="Ex.: XX98765-4321,XX98765-4321" id="telefone-whatsapp" <?= $cliente->getWhatsapp() ?> />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="celulares">Celulares <sup>Separe os números usando virgula (,)</label>
                                    <input type="text" name="celulares" id="celulares" class="form-control" placeholder="Ex.: XX98765-4321,XX98765-4321" value="<?= $cliente->getCelulares() ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 box-title">
                                <h4 class="text-bold">Endereço:</h4><hr>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP <sup>*</sup></label>
                                    <input type="text" name="cep" class="form-control" placeholder="12345-678" id="cep" value="<?= $cliente->getCep() ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="logradouro">Logradouro <sup>*</sup></label>
                                    <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Ex.: Avenida Delfim Moreira" value="<?= $cliente->getLogradouro() ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero">Nº <sup>*</sup></label>
                                    <input type="text" name="numero" id="numero" class="form-control" placeholder="Ex.: 101A" value="<?= $cliente->getNumero()?>" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="complemento-endereco">Complemento</label>
                                    <input type="text" name="complemento-endereco" id="complemento-endereco" class="form-control" placeholder="Ex.: Apartamento 201" value="<?= $cliente->getComplemento() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="bairro">Bairro <sup>*</sup></label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Ex.: Leblon" value="<?= $cliente->getBairro() ?>" required />
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="cidade">Cidade <sup>*</sup></label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex.: Rio de Janeiro" value="<?= $cliente->getCidade() ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="uf">UF <sup>*</sup></label>
                                    <select name="uf" class="form-control" id="uf" required>
                                        <option value="AC" <?php if($cliente->getUf() === "AC")  echo "selected" ?>>AC</option>
                                        <option value="AL" <?php if($cliente->getUf() === "AL")  echo "selected" ?>>AL</option>
                                        <option value="AM" <?php if($cliente->getUf() === "AM")  echo "selected" ?>>AM</option>
                                        <option value="AP" <?php if($cliente->getUf() === "AP")  echo "selected" ?>>AP</option>
                                        <option value="BA" <?php if($cliente->getUf() === "BA")  echo "selected" ?>>BA</option>
                                        <option value="CE" <?php if($cliente->getUf() === "CE")  echo "selected" ?>>CE</option>
                                        <option value="DF" <?php if($cliente->getUf() === "DF")  echo "selected" ?>>DF</option>
                                        <option value="ES" <?php if($cliente->getUf() === "ES")  echo "selected" ?>>ES</option>
                                        <option value="GO" <?php if($cliente->getUf() === "GO")  echo "selected" ?>>GO</option>
                                        <option value="MA" <?php if($cliente->getUf() === "MA")  echo "selected" ?>>MA</option>
                                        <option value="MG" <?php if($cliente->getUf() === "MG")  echo "selected" ?>>MG</option>
                                        <option value="MS" <?php if($cliente->getUf() === "MS")  echo "selected" ?>>MS</option>
                                        <option value="MT" <?php if($cliente->getUf() === "MT")  echo "selected" ?>>MT</option>
                                        <option value="PA" <?php if($cliente->getUf() === "PA")  echo "selected" ?>>PA</option>
                                        <option value="PB" <?php if($cliente->getUf() === "PB")  echo "selected" ?>>PB</option>
                                        <option value="PE" <?php if($cliente->getUf() === "PE")  echo "selected" ?>>PE</option>
                                        <option value="PI" <?php if($cliente->getUf() === "PI")  echo "selected" ?>>PI</option>
                                        <option value="PR" <?php if($cliente->getUf() === "PR")  echo "selected" ?>>PR</option>
                                        <option value="RJ" <?php if($cliente->getUf() === "RJ")  echo "selected" ?>>RJ</option>
                                        <option value="RN" <?php if($cliente->getUf() === "RN")  echo "selected" ?>>RN</option>
                                        <option value="RO" <?php if($cliente->getUf() === "RO")  echo "selected" ?>>RO</option>
                                        <option value="RR" <?php if($cliente->getUf() === "RR")  echo "selected" ?>>RR</option>
                                        <option value="RS" <?php if($cliente->getUf() === "RS")  echo "selected" ?>>RS</option>
                                        <option value="SC" <?php if($cliente->getUf() === "SC")  echo "selected" ?>>SC</option>
                                        <option value="SE" <?php if($cliente->getUf() === "SE")  echo "selected" ?>>SE</option>
                                        <option value="SP" <?php if($cliente->getUf() === "SP")  echo "selected" ?>>SP</option>
                                        <option value="TO" <?php if($cliente->getUf() === "TO")  echo "selected" ?>>TO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logomarca-atual">Logomarca</label>
                                    <input class="form-control" type="text" id="logomarca-atual" name="logomarca-atual" value="<?= $cliente->getLogomarca() ?>" readonly>
                                    <input class="form-control" type="file" id="logomarca" name="logomarca"/>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <p class="text-bold"><sup>*</sup> Item de preenchimento obrigatório.</p>
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-refresh"></span> Atualizar</button>
                    </div>
                </div>
                <!-- /.box -->
            </form>
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-usd"></i> Informações Financeiras</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form id="clientes-informacoes-financeiras-add-form" action="clientes/informacoes-financeiras/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="banco">Banco</label>
                                    <input type="text" id="banco" name="banco" class="form-control" placeholder="Ex.: Banco do Brasil" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agencia">Agência</label>
                                    <input type="text" id="agencia" name="agencia" class="form-control" placeholder="Ex.: 1234" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="conta">Conta</label>
                                    <input type="text" id="conta" name="conta" class="form-control" placeholder="Ex.: 123456-8" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                            </div>
                        </form>
                    </div>
                    <div class="row" style="margin-top:15px;" id="bancos">
                        <div class="col-md-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Banco</th>
                                            <th>Agência</th>
                                            <th>Conta</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($bancos as $banco): ?>
                                        <tr>
                                            <td><?= $banco->getBanco() ?></td>
                                            <td><?= $banco->getAgencia() ?></td>
                                            <td><?= $banco->getConta() ?></td>
                                            <td>
                                                <a
                                                    href="javascript:void(0);"
                                                    title="Editar"
                                                    class="btn btn-primary update-link"
                                                    data-toggle="modal"
                                                    data-update-modal="update-modal-informacoes-financeiras"
                                                    data-id="<?= $banco->getId() ?>"
                                                    data-banco="<?= $banco->getBanco() ?>"
                                                    data-agencia="<?= $banco->getAgencia() ?>"
                                                    data-conta="<?= $banco->getConta() ?>"
                                                >
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a
                                                    href="javascript:void(0);"
                                                    title="Excluir"
                                                    class="btn btn-danger delete-link"
                                                    data-toggle="modal"
                                                    data-action="clientes/informacoes-financeiras/excluir"
                                                    data-id="<?= $banco->getId() ?>"
                                                    data-descricao="<?= "Banco: " . $banco->getBanco() ?>"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
            <?php /* if($row_cliente['tipo'] == 1) { */ ?>
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-location-dot"></i> Locais</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="clientes-locais-add-form" action="clientes/locais/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <div class="row">
                                <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao-local">Local</label>
                                        <input type="text" id="descricao-local" name="descricao-local" class="form-control" placeholder="Nome do local" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cep-local">CEP <sup>*</sup></label>
                                        <input type="text" id="cep-local" name="cep-local" class="form-control" placeholder="12345-678" required/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="logradouro-local">Logradouro <sup>*</sup></label>
                                        <input type="text" id="logradouro-local" name="logradouro-local" class="form-control" placeholder="Ex.: Avenida Delfim Moreira" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="numero-local">Nº <sup>*</sup></label>
                                        <input type="text" id="numero-local" name="numero-local" class="form-control" placeholder="Ex.: 101A" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="complemento-endereco-local">Complemento</label>
                                        <input type="text" id="complemento-endereco-local" name="complemento-endereco-local" class="form-control" placeholder="Ex.: Apartamento 201" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="bairro-local">Bairro <sup>*</sup></label>
                                        <input type="text" id="bairro-local" name="bairro-local" class="form-control" placeholder="Ex.: Leblon" required />
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="cidade-local">Cidade <sup>*</sup></label>
                                        <input type="text" id="cidade-local" name="cidade-local" class="form-control" placeholder="Ex.: Rio de Janeiro" required/>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="uf-local">UF <sup>*</sup></label>
                                        <select id="uf-local" name="uf-local" class="form-control" required>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="latitude-local">Latitude</label>
                                        <input type="number" id="latitude-local" name="latitude-local" class="form-control" min="-180" max="180" step="0.0001" placeholder="Ex.: 40.7128">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="longitude-local">Longitude</label>
                                        <input type="number" id="longitude-local" name="longitude-local" class="form-control" min="-180" max="180" step="0.0001" placeholder="Ex.: -33.8688">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="area-total-local">Área Total (m<sup>2</sup>)</label>
                                        <input type="number" id="area-total-local" name="area-total-local" class="form-control" min="1" step="0.1" placeholder="Ex.: 300" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="area-construida-local">Área Construída (m<sup>2</sup>)</label>
                                        <input type="number" id="area-construida-local" name="area-construida-local" class="form-control" min="1" step="0.1" placeholder="Ex.: 150" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contato-local">Contato</label>
                                        <input type="text" id="contato-local" name="contato-local" class="form-control" placeholder="Nome da pessoa de contato" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tel-contato-local">Telefone Contato</label>
                                        <input type="text" id="tel-contato-local" name="tel-contato-local" class="form-control" placeholder="Ex.: XX 12345678" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top:15px;" id="locais">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Local</th>
                                                <th>Bairro</th>
                                                <th>Cidade</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($locais as $local): ?>
                                            <tr>
                                                <td><?= $local->getDescricao() ?></td>
                                                <td><?= $local->getBairro() ?></td>
                                                <td><?= $local->getCidade() ?></td>
                                                <td>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Editar"
                                                        class="btn btn-primary update-link"
                                                        data-toggle="modal"
                                                        data-update-modal="update-modal-locais"
                                                        data-dados='<?= json_encode([
                                                            "id" => $local->getId(),
                                                            "descricao" => $local->getDescricao(),
                                                            "cep" => $local->getCep(),
                                                            "logradouro" => $local->getLogradouro(),
                                                            "numero" => $local->getNumero(),
                                                            "complemento" => $local->getComplemento(),
                                                            "bairro" => $local->getBairro(),
                                                            "cidade" => $local->getCidade(),
                                                            "uf" => $local->getUf(),
                                                            "latitude" => $local->getLatitude(),
                                                            "longitude" => $local->getLongitude(),
                                                            "areaTotal" => $local->getAreaTotal(),
                                                            "areaConstruida" => $local->getAreaConstruida(),
                                                            "contato" => $local->getContato(),
                                                            "telContato" => $local->getTelefone()]) ?>'
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Excluir"
                                                        class="btn btn-danger delete-link"
                                                        data-toggle="modal"
                                                        data-action="clientes/locais/excluir"
                                                        data-id="<?= $local->getId() ?>"
                                                        data-descricao="<?= "Local: " . $local->getDescricao() ?>"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-truck-ramp-box"></i> Locais de Entrega</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="clientes-local-entrega-add-form" action="clientes/locais-entrega/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <div class="row">
                                <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao-local-entrega">Local</label>
                                        <input type="text" id="descricao-local-entrega" name="descricao-local-entrega" class="form-control" placeholder="Nome do local" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cep-local-entrega">CEP <sup>*</sup></label>
                                        <input type="text" id="cep-local-entrega" name="cep-local-entrega" class="form-control" placeholder="12345-678" required/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="logradouro-local-entrega">Logradouro <sup>*</sup></label>
                                        <input type="text" id="logradouro-local-entrega" name="logradouro-local-entrega" class="form-control" placeholder="Ex.: Avenida Delfim Moreira" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="numero-local-entrega">Nº <sup>*</sup></label>
                                        <input type="text" id="numero-local-entrega" name="numero-local-entrega" class="form-control" placeholder="Ex.: 101A" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="complemento-endereco-local-entrega">Complemento</label>
                                        <input type="text" id="complemento-endereco-local-entrega" name="complemento-endereco-local-entrega" class="form-control" placeholder="Ex.: Apartamento 201" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="bairro-local-entrega">Bairro <sup>*</sup></label>
                                        <input type="text" id="bairro-local-entrega" name="bairro-local-entrega" class="form-control" placeholder="Ex.: Leblon" required />
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="cidade-local-entrega">Cidade <sup>*</sup></label>
                                        <input type="text" id="cidade-local-entrega" name="cidade-local-entrega" class="form-control" placeholder="Ex.: Rio de Janeiro" required/>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="uf-local-entrega">UF <sup>*</sup></label>
                                        <select id="uf-local-entrega" name="uf-local-entrega" class="form-control" required>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contato-local-entrega">Contato</label>
                                        <input type="text" id="contato-local-entrega" name="contato-local-entrega" class="form-control" placeholder="Nome da pessoa de contato" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tel-contato-local-entrega">Telefone Contato</label>
                                        <input type="text" id="tel-contato-local-entrega" name="tel-contato-local-entrega" class="form-control" placeholder="Ex.: XX 12345678" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top:15px;" id="locais_entrega">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Local</th>
                                            <th>Bairro</th>
                                            <th>Cidade</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($locaisEntrega as $localEntrega): ?>
                                            <tr>
                                                <td><?= $localEntrega->getDescricao() ?></td>
                                                <td><?= $localEntrega->getBairro() ?></td>
                                                <td><?= $localEntrega->getCidade() ?></td>
                                                <td>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Editar"
                                                        class="btn btn-primary update-link"
                                                        data-toggle="modal"
                                                        data-update-modal="update-modal-locais-entrega"
                                                        data-dados='<?= json_encode([
                                                            "id" => $localEntrega->getId(),
                                                            "descricao" => $localEntrega->getDescricao(),
                                                            "cep" => $localEntrega->getCep(),
                                                            "logradouro" => $localEntrega->getLogradouro(),
                                                            "numero" => $localEntrega->getNumero(),
                                                            "complemento" => $localEntrega->getComplemento(),
                                                            "bairro" => $localEntrega->getBairro(),
                                                            "cidade" => $localEntrega->getCidade(),
                                                            "uf" => $localEntrega->getUf(),
                                                            "contato" => $localEntrega->getContato(),
                                                            "telContato" => $localEntrega->getTelefone()]) ?>'
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Excluir"
                                                        class="btn btn-danger delete-link"
                                                        data-toggle="modal"
                                                        data-action="clientes/locais-entrega/excluir"
                                                        data-id="<?= $localEntrega->getId() ?>"
                                                        data-descricao="<?= "Local: " . $localEntrega->getDescricao() ?>"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-layer-group"></i> Pavimentos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="clientes-pavimentos-add-form" action="clientes/pavimentos/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <div class="row">
                                <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cliente-local-pavimento">Local</label>
                                        <select class="form-control" id="cliente-local-pavimento" name="cliente-local-pavimento" required>
                                            <option value="" selected>Selecione</option>
                                            <?php foreach($locais as $local): ?>
                                            <option value="<?= $local->getId() ?>"><?= $local->getDescricao() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao-pavimento">Pavimento</label>
                                        <input type="text" id="descricao-pavimento" name="descricao-pavimento" class="form-control" placeholder="Pavimento" required/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top:15px;" id="pavimentos">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Local</th>
                                                <th>Pavimento</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($pavimentos as $pavimento): ?>
                                            <tr>
                                                <td><?= $pavimento->getLocal()->getDescricao() ?></td>
                                                <td><?= $pavimento->getDescricao() ?></td>
                                                <td><?php if($pavimento->isStatus()) echo "Ativo"; else echo "Inativo"; ?></td>
                                                <td>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Editar"
                                                        class="btn btn-primary update-link"
                                                        data-toggle="modal"
                                                        data-update-modal="update-modal-pavimentos"
                                                        data-dados='<?= json_encode([
                                                            "id" => $pavimento->getId(),
                                                            "local" => $pavimento->getLocal()->getId(),
                                                            "descricao" => $pavimento->getDescricao()]) ?>'
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Excluir"
                                                        class="btn btn-danger delete-link"
                                                        data-toggle="modal"
                                                        data-action="clientes/pavimentos/excluir"
                                                        data-id="<?= $pavimento->getId() ?>"
                                                        data-descricao="<?= "Pavimento: " . $pavimento->getDescricao() ?>"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a
                                                        <?php if($pavimento->isStatus()) echo "href=\"javascript:void(0);\""; else echo "href=\"#\" aria-disabled=\"true\" style=\"pointer-events: none; color: gray;\""; ?>
                                                        class="btn btn-warning disable-link"
                                                        title="Desativar"
                                                        data-toggle="modal"
                                                        data-action="clientes/pavimentos/desativar"
                                                        data-id="<?= $pavimento->getId() ?>"
                                                        data-descricao="<?= "Pavimento: " . $pavimento->getDescricao() ?>"
                                                    >
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                    <a
                                                        <?php if(!$pavimento->isStatus()) echo "href=\"javascript:void(0);\""; else echo "href=\"#\" aria-disabled=\"true\" style=\"pointer-events: none; color: gray;\""; ?>
                                                        class="btn btn-success active-link"
                                                        title="Ativar"
                                                        data-toggle="modal"
                                                        data-action="clientes/pavimentos/ativar"
                                                        data-id="<?= $pavimento->getId() ?>"
                                                        data-descricao="<?= "Pavimento: " . $pavimento->getDescricao() ?>"
                                                    >
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-flag"></i> Setores</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="clientes-setores-add-form" action="clientes/setores/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <div class="row">
                                <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cliente-pavimento-setor">Pavimento</label>
                                        <select class="form-control" id="cliente-pavimento-setor" name="cliente-pavimento-setor" required>
                                            <option value="" selected>Selecione</option>
                                            <?php foreach($pavimentos as $pavimento): ?>
                                            <?php if($pavimento->isStatus()): ?>
                                            <option value="<?= $pavimento->getId() ?>"><?= $pavimento->getDescricao() ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao-setor">Setor</label>
                                        <input type="text" id="descricao-setor" name="descricao-setor" class="form-control" placeholder="Nome do setor" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ocupantes-fixos-setor">Ocupantes Fixos (quantidade)</label>
                                        <input type="number" id="ocupantes-fixos-setor" name="ocupantes-fixos-setor" class="form-control" min="0" step="1" placeholder="Ocupantes Fixos" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ocupantes-flutuantes-setor">Ocupantes Flutuantes (quantidade)</label>
                                        <input type="number" id="ocupantes-flutuantes-setor" name="ocupantes-flutuantes-setor" class="form-control" min="0" step="1" placeholder="Ocupantes Flutuantes" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="largura-setor">Largura (metros)</label>
                                        <input type="number" id="largura-setor" name="largura-setor" class="form-control" min="0" step="0.1" placeholder="Largura" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="comprimento-setor">Comprimento (metros)</label>
                                        <input type="number" id="comprimento-setor" name="comprimento-setor" class="form-control" min="0" step="0.1"  placeholder="Comprimento" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="altura-setor">Altura (metros)</label>
                                        <input type="number" id="altura-setor" name="altura-setor" class="form-control" min="0" step="0.1" placeholder="Altura" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" enctype="multipart/form-data" target="_self" id="setor">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="nome-setor">Pesquisar Setor</label>
                                        <input class="form-control" type="text" id="nome-setor" name="nome-setor" placeholder="Nome" />
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="button" class="btn btn-primary pull-right" onclick="PesquisaSetor()"><span class="fa fa-search"></span> Pesquisar</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Local</th>
                                                    <th>Pavimento</th>
                                                    <th>Setor</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($setores as $setor): ?>
                                                <tr>
                                                    <td><?= $setor->getPavimento()->getLocal()->getDescricao() ?></td>
                                                    <td><?= $setor->getPavimento()->getDescricao() ?></td>
                                                    <td><?= $setor->getDescricao() ?></td>
                                                    <td><?php if($setor->isStatus()) echo "Ativo"; else echo "Inativo"; ?></td>
                                                    <td>
                                                        <a
                                                            href="javascript:void(0);"
                                                            title="Editar"
                                                            class="btn btn-primary update-link"
                                                            data-toggle="modal"
                                                            data-update-modal="update-modal-setores"
                                                            data-dados='<?= json_encode([
                                                                "id" => $setor->getId(),
                                                                "descricao" => $setor->getDescricao(),
                                                                "pavimento" => $setor->getPavimento()->getLocal()->getId(),
                                                                "ocupantesFixos" => $setor->getOcupantesFixos(),
                                                                "ocupantesFlutuantes" => $setor->getOcupantesFlutuantes(),
                                                                "largura" => $setor->getLargura(),
                                                                "comprimento" => $setor->getComprimento(),
                                                                "altura" => $setor->getAltura()]) ?>'
                                                        >
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a
                                                            href="javascript:void(0);"
                                                            title="Excluir"
                                                            class="btn btn-danger delete-link"
                                                            data-toggle="modal"
                                                            data-action="clientes/setores/excluir"
                                                            data-id="<?= $setor->getId() ?>"
                                                            data-descricao="<?= "Setor: " . $setor->getDescricao() ?>"
                                                        >
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a
                                                            <?php if($setor->isStatus()) echo "href=\"javascript:void(0);\""; else echo "href=\"#\" aria-disabled=\"true\" style=\"pointer-events: none; color: gray;\""; ?>
                                                            class="btn btn-warning disable-link"
                                                            title="Desativar"
                                                            data-toggle="modal"
                                                            data-action="clientes/setores/desativar"
                                                            data-id="<?= $setor->getId() ?>"
                                                            data-descricao="<?= "Setor: " . $setor->getDescricao() ?>"
                                                        >
                                                            <i class="fa fa-ban"></i>
                                                        </a>
                                                        <a
                                                            <?php if(!$setor->isStatus()) echo "href=\"javascript:void(0);\""; else echo "href=\"#\" aria-disabled=\"true\" style=\"pointer-events: none; color: gray;\""; ?>
                                                                class="btn btn-success active-link"
                                                                title="Ativar"
                                                                data-toggle="modal"
                                                                data-action="clientes/setores/ativar"
                                                                data-id="<?= $setor->getId() ?>"
                                                                data-descricao="<?= "Setor: " . $setor->getDescricao() ?>"
                                                        >
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user-tie"></i> Profissionais</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="clientes-profissionais-add-form" action="clientes/profissionais/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <div class="row">
                                <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id-profissional">Profissional</label>
                                        <select class="form-control" id="id-profissional" name="id-profissional">
                                            <option value="" selected>Selecione</option>
                                            <?php foreach ($profissionais as $profissional): ?>
                                            <option value="<?= $profissional->getId() ?>"><?= $profissional->getNome() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="data-inicio-profissional">Data de Início</label>
                                        <input class="form-control data" type="date" id="data-inicio-profissional" name="data-inicio-profissional" value="<?= date('Y-m-d') ?>" placeholder="Data de Início" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="data-termino-profissional">Data de Término</label>
                                        <input class="form-control data" type="date" id="data-termino-profissional" name="data-termino-profissional" placeholder="Data de Término" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status-profissional">Status</label>
                                        <select class="form-control" id="status-profissional" name="status-profissional">
                                            <option value="Ativo" selected>Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top:15px;" id="profissionais">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Data Início</th>
                                                <th>Data Término</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($profissionaisDoCliente as $profissionalDoCliente): ?>
                                            <?php if($profissionalDoCliente->isStatus()) $status = 1; else $status = 0; ?>
                                            <tr>
                                                <td><?= $profissionalDoCliente->getProfissional()->getNome() ?></td>
                                                <td><?= $profissionalDoCliente->getDataInicio()->format('d/m/Y') ?></td>
                                                <td><?= $profissionalDoCliente->getDataTermino()->format('d/m/Y') ?></td>
                                                <td><?php if($status) echo "Ativo"; else echo "Inativo"; ?></td>
                                                <td>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Editar"
                                                        class="btn btn-primary update-link"
                                                        data-toggle="modal"
                                                        data-update-modal="update-modal-profissionais"
                                                        data-dados='<?= json_encode([
                                                            "id" => $profissionalDoCliente->getId(),
                                                            "profissional" => $profissionalDoCliente->getProfissional()->getId(),
                                                            "dataInicio" => $profissionalDoCliente->getDataInicio()->format("Y-m-d"),
                                                            "dataTermino" => $profissionalDoCliente->getDataTermino()->format("Y-m-d"),
                                                            "status" => $status]) ?>'
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Excluir"
                                                        class="btn btn-danger delete-link"
                                                        data-toggle="modal"
                                                        data-action="clientes/profissionais/excluir"
                                                        data-id="<?= $profissionalDoCliente->getId() ?>"
                                                        data-descricao="<?= "Profissional: " . $profissionalDoCliente->getProfissional()->getNome() ?>"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-file-lines"></i> Contratos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" enctype="multipart/form-data" target="_self" id="form_contrato">
                            <div class="row">
                                <input type="hidden" name="cliente-id" value="<?= $cliente->getId() ?>" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nº Contrato</label>
                                        <input type="text" name="numero" class="form-control" placeholder="Nº Contrato" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea rows="5" name="ds_contrato" class="form-control" placeholder="Descrição"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data de Início</label>
                                        <input class="form-control data" type="date" id="dt_inicio" name="dt_inicio" placeholder="Data de Início" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data de Encerramento</label>
                                        <input class="form-control data" type="date" id="dt_fim" name="dt_fim" placeholder="Data de Encerramento" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>BDI</label>
                                        <input class="form-control" type="text" id="BDI" name="BDI" placeholder="BDI" onkeypress="FormataValor(this.id, 10, event)" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Valor Base (R$)</label>
                                        <input class="form-control" type="text" id="valor_base" name="valor_base" placeholder="Valor Base" onkeypress="FormataValor(this.id, 10, event)" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Valor Base 2 (R$)</label>
                                        <input class="form-control" type="text" id="valor_base2" name="valor_base2" placeholder="Valor Base" onkeypress="FormataValor(this.id, 10, event)" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Valor Base 3 (R$)</label>
                                        <input class="form-control" type="text" id="valor_base3" name="valor_base3" placeholder="Valor Base" onkeypress="FormataValor(this.id, 10, event)" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mês SCO</label>
                                        <select class="form-control" id="mes-sco" name="mes-sco" required="required">
                                            <option value="" selected>Selecione</option>
                                            <?php /*
                                            $sql_grupo = mysql_query("SELECT * FROM i0_sco GROUP BY mes_i0_sco ORDER BY mes_i0_sco") or die (mysql_error());
                                            while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                            */ ?>
                                            <option value="<?php /* echo $row_grupo['mes_i0_sco'] */ ?>"><?php /* echo $row_grupo['mes_i0_sco'] */ ?></option>
                                            <?php /*
                                            }
                                            */ ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ano SCO</label>
                                        <select class="form-control" id="ano-sco" name="ano-sco" required="required">
                                            <option value="" selected>Selecione</option>
                                            <?php /*
                                            $sql_grupo = mysql_query("SELECT * FROM i0_sco GROUP BY ano_i0_sco ORDER BY ano_i0_sco") or die (mysql_error());
                                            while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                            */ ?>
                                            <option value="<?php /* echo $row_grupo['ano_i0_sco'] */ ?>"><?php /* echo $row_grupo['ano_i0_sco'] */ ?></option>
                                            <?php /*
                                            }
                                            */ ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top:15px;" id="contratos">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Data Início</th>
                                                <th>Data Fim</th>
                                                <th>SCO</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php /*
                                        $sql_consult = mysql_query("SELECT * FROM ta_contrato WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
                                        while ($dados = mysql_fetch_array($sql_consult)) {
                                            $dt_inicio = implode("/",array_reverse(explode("-",$dados['dt_inicio'])));
                                            $dt_fim = implode("/",array_reverse(explode("-",$dados['dt_fim'])));
                                            */ ?>
                                            <tr>
                                                <td><?php /* echo $dados['numero'] */ ?></td>
                                                <td><?php /* echo $dt_inicio */ ?></td>
                                                <td><?php /* echo $dt_fim */ ?></td>
                                                <td><?php /* echo $dados['mes_sco'] */ ?> / <?php /* echo $dados['ano_sco'] */ ?></td>
                                                <td><a data-toggle="modal" data-target="#modal_contra_<?php /* echo $dados['id'] */ ?>" ><button class="btn btn-primary"><span class="fa fa-search"></span></button></a></td>
                                                <td><a data-toggle="modal" data-target="#pop_contra_excluir_<?php /* echo $dados['id'] */ ?>"><button class="btn btn-danger"><span class="fa fa-trash"></span></button></a></td>
                                            </tr>
                                        <?php /* } */ ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
            <?php /* } */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
<!-- Modal's -->
<!-- Modal Delete Item -->
<div class="modal fade" id="delete-modal">
    <form id="modal-delete-form" action="" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 id="modal-title" class="modal-title">Excluir</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="" />
                        <div class="col-md-12">
                            <p>Tem certeza que deseja <strong>excluir</strong> este item ?</p>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                    <input type="submit" value="Sim" class="btn btn-danger" />
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal Active Item -->
<div class="modal fade" id="active-modal">
    <form id="modal-active-form" action="" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Ativar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="" />
                        <div class="col-md-12">
                            <p>Deseja <strong>ativar</strong> este item?</p>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                    <input type="submit" value="Sim" class="btn btn-success" />
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- Modal Disable Item -->
<div class="modal fade" id="disable-modal">
    <form id="modal-disable-form" action="" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Desativar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="" />
                        <div class="col-md-12">
                            <p>Tem certeza de que deseja <strong>desativar</strong> este item?</p>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                    <input type="submit" value="Sim" class="btn btn-warning" />
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- Update Modals -->
<!-- Informacoes Financeiras Modal Update -->
<div class="modal fade" id="update-modal-informacoes-financeiras">
    <form id="clientes-informacoes-financeiras-update-form" action="clientes/informacoes-financeiras/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Banco</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="" />
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banco">Banco</label>
                                <input type="text" id="banco" name="banco" class="form-control" placeholder="Ex.: Banco do Brasil" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agencia">Agência</label>
                                <input type="text" id="agencia" name="agencia" class="form-control" placeholder="Ex.: 1234" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="conta">Conta</label>
                                <input type="text" id="conta" name="conta" class="form-control" placeholder="Ex.: 123456-8" />
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
<!-- Locais Modal Update -->
<div class="modal fade" id="update-modal-locais">
    <form id="clientes-locais-update-form" action="clientes/locais/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Local</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id-local-modal" name="id-local-modal" value="" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descricao-local-modal">Local</label>
                                <input type="text" id="descricao-local-modal" name="descricao-local-modal" class="form-control" placeholder="Nome do local" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cep-local-modal">CEP <sup>*</sup></label>
                                <input type="text" id="cep-local-modal" name="cep-local-modal" class="form-control" placeholder="12345-678" required/>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="logradouro-local-modal">Logradouro <sup>*</sup></label>
                                <input type="text" id="logradouro-local-modal" name="logradouro-local-modal" class="form-control" placeholder="Ex.: Avenida Delfim Moreira" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="numero-local-modal">Nº <sup>*</sup></label>
                                <input type="text" id="numero-local-modal" name="numero-local-modal" class="form-control" placeholder="Ex.: 101A" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complemento-endereco-local-modal">Complemento</label>
                                <input type="text" id="complemento-endereco-local-modal" name="complemento-endereco-local-modal" class="form-control" placeholder="Ex.: Apartamento 201" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="bairro-local-modal">Bairro <sup>*</sup></label>
                                <input type="text" id="bairro-local-modal" name="bairro-local-modal" class="form-control" placeholder="Ex.: Leblon" required />
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="cidade-local-modal">Cidade <sup>*</sup></label>
                                <input type="text" id="cidade-local-modal" name="cidade-local-modal" class="form-control" placeholder="Ex.: Rio de Janeiro" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="uf-local-modal">UF <sup>*</sup></label>
                                <select id="uf-local-modal" name="uf-local-modal" class="form-control" required>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude-local-modal">Latitude</label>
                                <input type="number" id="latitude-local-modal" name="latitude-local-modal" class="form-control" min="-180" max="180" step="0.0001" placeholder="Ex.: 40.7128">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude-local-modal">Longitude</label>
                                <input type="number" id="longitude-local-modal" name="longitude-local-modal" class="form-control" min="-180" max="180" step="0.0001" placeholder="Ex.: -33.8688">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="area-total-local-modal">Área Total (m<sup>2</sup>)</label>
                                <input type="number" id="area-total-local-modal" name="area-total-local-modal" class="form-control" min="1" step="0.1" placeholder="Ex.: 300" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="area-construida-local-modal">Área Construída (m<sup>2</sup>)</label>
                                <input type="number" id="area-construida-local-modal" name="area-construida-local-modal" class="form-control" min="1" step="0.1" placeholder="Ex.: 150" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contato-local-modal">Contato</label>
                                <input type="text" id="contato-local-modal" name="contato-local-modal" class="form-control" placeholder="Nome da pessoa de contato" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tel-contato-local-modal">Telefone Contato</label>
                                <input type="text" id="tel-contato-local-modal" name="tel-contato-local-modal" class="form-control" placeholder="Ex.: XX 12345678" />
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
<!-- Locais de Entrega Modal Update -->
<div class="modal fade" id="update-modal-locais-entrega">
    <form id="clientes-locais-entrega-update-form" action="clientes/locais-entrega/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Local de Entrega</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id-local-entrega-modal" name="id-local-entrega-modal" value="" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descricao-local-entrega-modal">Local</label>
                                <input type="text" id="descricao-local-entrega-modal" name="descricao-local-entrega-modal" class="form-control" placeholder="Nome do local" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cep-local-entrega-modal">CEP <sup>*</sup></label>
                                <input type="text" id="cep-local-entrega-modal" name="cep-local-entrega-modal" class="form-control" placeholder="12345-678" required/>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="logradouro-local-entrega-modal">Logradouro <sup>*</sup></label>
                                <input type="text" id="logradouro-local-entrega-modal" name="logradouro-local-entrega-modal" class="form-control" placeholder="Ex.: Avenida Delfim Moreira" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="numero-local-entrega-modal">Nº <sup>*</sup></label>
                                <input type="text" id="numero-local-entrega-modal" name="numero-local-entrega-modal" class="form-control" placeholder="Ex.: 101A" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complemento-endereco-local-entrega-modal">Complemento</label>
                                <input type="text" id="complemento-endereco-local-entrega-modal" name="complemento-endereco-local-entrega-modal" class="form-control" placeholder="Ex.: Apartamento 201" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="bairro-local-entrega-modal">Bairro <sup>*</sup></label>
                                <input type="text" id="bairro-local-entrega-modal" name="bairro-local-entrega-modal" class="form-control" placeholder="Ex.: Leblon" required />
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="cidade-local-entrega-modal">Cidade <sup>*</sup></label>
                                <input type="text" id="cidade-local-entrega-modal" name="cidade-local-entrega-modal" class="form-control" placeholder="Ex.: Rio de Janeiro" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="uf-local-entrega-modal">UF <sup>*</sup></label>
                                <select id="uf-local-entrega-modal" name="uf-local-entrega-modal" class="form-control" required>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contato-local-entrega-modal">Contato</label>
                                <input type="text" id="contato-local-entrega-modal" name="contato-local-entrega-modal" class="form-control" placeholder="Nome da pessoa de contato" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tel-contato-local-entrega-modal">Telefone Contato</label>
                                <input type="text" id="tel-contato-local-entrega-modal" name="tel-contato-local-entrega-modal" class="form-control" placeholder="Ex.: XX 12345678" />
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
<!-- Pavimentos Modal Update -->
<div class="modal fade" id="update-modal-pavimentos">
    <form id="clientes-pavimentos-update-form" action="clientes/pavimentos/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Pavimento</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id-pavimento-modal" value="" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="local-pavimento-modal">Local</label>
                                <select class="form-control" id="local-pavimento-modal" name="local-pavimento-modal" required>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach($locais as $local): ?>
                                    <option value="<?= $local->getId() ?>"><?= $local->getDescricao() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao-pavimento-modal">Pavimento</label>
                                <input type="text" id="descricao-pavimento-modal" name="descricao-pavimento-modal" class="form-control" placeholder="Pavimento" required/>
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
<!-- Setores Modal Update -->
<div class="modal fade" id="update-modal-setores">
    <form id="clientes-setores-update-form" action="clientes/setores/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Setor</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id-setor-modal" value="" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pavimento-setor-modal">Pavimento</label>
                                <select class="form-control" id="pavimento-setor-modal" name="pavimento-setor-modal" required>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach($pavimentos as $pavimento): ?>
                                    <?php if($pavimento->isStatus()): ?>
                                    <option value="<?= $pavimento->getId() ?>"><?= $pavimento->getDescricao() ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao-setor-modal">Setor</label>
                                <input type="text" id="descricao-setor-modal" name="descricao-setor-modal" class="form-control" placeholder="Nome do setor" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ocupantes-fixos-setor-modal">Ocupantes Fixos (quantidade)</label>
                                <input type="number" id="ocupantes-fixos-setor-modal" name="ocupantes-fixos-setor-modal" class="form-control" min="0" step="1" placeholder="Ocupantes Fixos" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ocupantes-flutuantes-setor-modal">Ocupantes Flutuantes (quantidade)</label>
                                <input type="number" id="ocupantes-flutuantes-setor-modal" name="ocupantes-flutuantes-setor-modal" class="form-control" min="0" step="1" placeholder="Ocupantes Flutuantes" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="largura-setor-modal">Largura (metros)</label>
                                <input type="number" id="largura-setor-modal" name="largura-setor-modal" class="form-control" min="0" step="0.1" placeholder="Largura" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento-setor-modal">Comprimento (metros)</label>
                                <input type="number" id="comprimento-setor-modal" name="comprimento-setor-modal" class="form-control" min="0" step="0.1"  placeholder="Comprimento" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura-setor-modal">Altura (metros)</label>
                                <input type="number" id="altura-setor-modal" name="altura-setor-modal" class="form-control" min="0" step="0.1" placeholder="Altura" />
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
<!-- Profissionais Modal Update -->
<div class="modal fade" id="update-modal-profissionais">
    <form id="clientes-profissionais-update-form" action="clientes/profissionais/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Profissional</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id-profissional-modal" value="" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="profissional-modal">Profissional</label>
                                <select class="form-control" id="profissional-modal" name="profissional-modal" disabled>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach ($profissionais as $profissional): ?>
                                    <option value="<?= $profissional->getId() ?>"><?= $profissional->getNome() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="data-inicio-profissional-modal">Data de Início</label>
                                <input class="form-control data" type="date" id="data-inicio-profissional-modal" name="data-inicio-profissional-modal" value="<?= date('Y-m-d') ?>" placeholder="Data de Início" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="data-termino-profissional-modal">Data de Término</label>
                                <input class="form-control data" type="date" id="data-termino-profissional-modal" name="data-termino-profissional-modal" placeholder="Data de Término" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status-profissional-modal">Status</label>
                                <select class="form-control" id="status-profissional-modal" name="status-profissional-modal">
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>
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
<script>
    $(document).ready(function() {
        // Quando o link de exclusão for clicado
        $('.delete-link').on('click', function() {
            var id = $(this).data('id');
            var descricao = $(this).data('descricao');
            var action = $(this).data('action');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#delete-modal input[name="id"]').val(id);

            // Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#delete-modal .modal-body p b').text(descricao);

            // Define o action do formulário no modal com o URL específico
            $('#modal-delete-form').attr('action', action);

            // Exibe o modal
            $('#delete-modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Quando o link de exclusão for clicado
        $('.active-link').on('click', function() {
            var id = $(this).data('id');
            var descricao = $(this).data('descricao');
            var action = $(this).data('action');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#active-modal input[name="id"]').val(id);

            // Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#active-modal .modal-body p b').text(descricao);

            // Define o action do formulário no modal com o URL específico
            $('#modal-active-form').attr('action', action);

            // Exibe o modal
            $('#active-modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Quando o link de exclusão for clicado
        $('.disable-link').on('click', function() {
            var id = $(this).data('id');
            var descricao = $(this).data('descricao');
            var action = $(this).data('action');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#disable-modal input[name="id"]').val(id);

            // Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#disable-modal .modal-body p b').text(descricao);

            // Define o action do formulário no modal com o URL específico
            $('#modal-disable-form').attr('action', action);

            // Exibe o modal
            $('#disable-modal').modal('show');
        });
    });
</script>
<script>
    function carregarDados(dados, campos, modal) {
        // Itera sobre as chaves e valores de dados
        Object.entries(dados).forEach(([chave, item]) => {
            console.log(campos);
            if (campos[chave]) {
                // Substitui o nome da chave para garantir que o campo no modal tenha o mesmo nome
                let campo = $("#" + modal + " " + campos[chave]);

                if (campo.length) {
                    // Se o campo for um SELECT
                    if (campo.is('select')) {
                        // Define a opção selecionada
                        campo.val(item).change();
                    } else {
                        // Para outros tipos de campo (input, textarea, etc.)
                        campo.val(item);
                    }
                }
            }
        });

        // Exibe o modal
        $("#" + modal).modal('show');
        return true;
    }

    $(document).ready(function() {
        // Quando o link de edição for clicado
        $('.update-link').on('click', function() {
            var dados = $(this).data('dados');
            var modal = $(this).data('update-modal');
            var campos = {};

            if(modal === "update-modal-locais") {
                campos = {
                    id: 'input[name="id-local-modal"]',
                    descricao: 'input[name="descricao-local-modal"]',
                    cep: 'input[name="cep-local-modal"]',
                    logradouro: 'input[name="logradouro-local-modal"]',
                    numero: 'input[name="numero-local-modal"]',
                    complemento: 'input[name="complemento-endereco-local-modal"]',
                    bairro: 'input[name="bairro-local-modal"]',
                    cidade: 'input[name="cidade-local-modal"]',
                    uf: 'select[name="uf-local-modal"]',
                    latitude: 'input[name="latitude-local-modal"]',
                    longitude: 'input[name="longitude-local-modal"]',
                    areaTotal: 'input[name="area-total-local-modal"]',
                    areaConstruida: 'input[name="area-construida-local-modal"]',
                    contato: 'input[name="contato-local-modal"]',
                    telContato: 'input[name="tel-contato-local-modal"]'
                };
                carregarDados(dados, campos, modal);
            }
            if(modal === "update-modal-locais-entrega") {
                campos = {
                    id: 'input[name="id-local-entrega-modal"]',
                    descricao: 'input[name="descricao-local-entrega-modal"]',
                    cep: 'input[name="cep-local-entrega-modal"]',
                    logradouro: 'input[name="logradouro-local-entrega-modal"]',
                    numero: 'input[name="numero-local-entrega-modal"]',
                    complemento: 'input[name="complemento-endereco-local-entrega-modal"]',
                    bairro: 'input[name="bairro-local-entrega-modal"]',
                    cidade: 'input[name="cidade-local-entrega-modal"]',
                    uf: 'select[name="uf-local-entrega-modal"]',
                    contato: 'input[name="contato-local-entrega-modal"]',
                    telContato: 'input[name="tel-contato-local-entrega-modal"]'
                };
            }
            if(modal === "update-modal-pavimentos") {
                campos = {
                    id: 'input[name="id-pavimento-modal"]',
                    descricao: 'input[name="descricao-pavimento-modal"]',
                    local: 'select[name="local-pavimento-modal"]',
                };
            }
            if(modal === "update-modal-setores") {
                campos = {
                    id: 'input[name="id-setor-modal"]',
                    descricao: 'input[name="descricao-setor-modal"]',
                    pavimento: 'select[name="pavimento-setor-modal"]',
                    ocupantesFixos: 'input[name="ocupantes-fixos-setor-modal"]',
                    ocupantesFlutuantes: 'input[name="ocupantes-flutuantes-setor-modal"]',
                    largura: 'input[name="largura-setor-modal"]',
                    comprimento: 'input[name="comprimento-setor-modal"]',
                    altura: 'input[name="altura-setor-modal"]',
                };
            }
            if(modal === "update-modal-profissionais") {
                campos = {
                    id: 'input[name="id-profissional-modal"]',
                    profissional: 'select[name="profissional-modal"]',
                    dataInicio: 'input[name="data-inicio-profissional-modal"]',
                    dataTermino: 'input[name="data-termino-profissional-modal"]',
                    status: 'select[name="status-profissional-modal"]',
                };
            }
            carregarDados(dados, campos, modal);
        });
    });
</script>
</html>