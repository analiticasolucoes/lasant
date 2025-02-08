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
    <?php include __DIR__ . '/../../../templates/header.php'; ?>
    <?php include __DIR__ . '/../../../templates/aside.php'; ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> Detalhes do Usuário</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form id="usuarios-add-form" action="usuarios/novo" method="post" enctype="multipart/form-data" target="_self">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?= $usuario->getNome() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Usuário</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="arquivo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clientes para Acesso</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <?php /*
                                $sql_consult3 = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE tipo='1' ORDER BY nome_empresa ASC") or die (mysql_error());
                                $i = 0;
                                while ($row = mysql_fetch_array($sql_consult3)) {
                                    $i++;
                                    */ ?>
                                <div class="col-md-6">
                                    <input type="checkbox" name="id_cliente[]" value="<?php /* echo $row['id'] */ ?>" />  <?php /* echo $row['nome_empresa'] */ ?>
                                </div>
                                <?php /* if($i%2 == 0) { */ ?>
                                <div class="col-md-12">
                                    <hr style="border-bottom:1px dotted #ccc;" />
                                </div>
                                <?php /* } */ ?>
                                <?php /* } */ ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fornecedores para Acesso</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <?php /*
                                $sql_consult3 = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE tipo='2' ORDER BY nome_empresa ASC") or die (mysql_error());
                                $x = 0;
                                while ($row = mysql_fetch_array($sql_consult3)) {
                                    $x++;
                                    */ ?>
                                <div class="col-md-6">
                                    <input type="checkbox" name="id_cliente[]" value="<?php /* echo $row['id'] */ ?>" />  <?php /* echo $row['nome_empresa'] */ ?>
                                </div>
                                <?php /* if($x%2 == 0) { */ ?>
                                <div class="col-md-12">
                                    <hr style="border-bottom:1px dotted #ccc;" />
                                </div>
                                <?php /* } */ ?>
                                <?php /* } */ ?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="form-group">
                                    <label>Privilégios</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input name="master" type="checkbox" id="master" value="1" class="marcar" onClick="check();" /> Master
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Funções</th>
                                            <th>Visualizar</th>
                                            <th>Cadastrar</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Cargos -->
                                        <tr>
                                            <td>Cargos</td>
                                            <td><input type="checkbox" name="cargo_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cargo_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cargo_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cargo_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Clientes -->
                                        <tr>
                                            <td>Clientes</td>
                                            <td><input type="checkbox" name="clientes_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="clientes_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="clientes_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="clientes_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Categorias -->
                                        <tr>
                                            <td>Categorias</td>
                                            <td><input type="checkbox" name="categorias_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="categorias_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="categorias_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="categorias_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Categorias de Serviço -->
                                        <tr>
                                            <td>Categorias de Serviço</td>
                                            <td><input type="checkbox" name="cateservico_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cateservico_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cateservico_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cateservico_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Esferas -->
                                        <tr>
                                            <td>Esferas</td>
                                            <td><input type="checkbox" name="esferas_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="esferas_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="esferas_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="esferas_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Feriados -->
                                        <tr>
                                            <td>Feriados</td>
                                            <td><input type="checkbox" name="feriados_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="feriados_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="feriados_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="feriados_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Unidades -->
                                        <tr>
                                            <td>Unidades</td>
                                            <td><input type="checkbox" name="unidades_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="unidades_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="unidades_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="unidades_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Grupos Material -->
                                        <tr>
                                            <td>Grupos Material</td>
                                            <td><input type="checkbox" name="grupos_material_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="grupos_material_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="grupos_material_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="grupos_material_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Material -->
                                        <tr>
                                            <td>Material</td>
                                            <td><input type="checkbox" name="material_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="material_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="material_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="material_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Tipos de OS -->
                                        <tr>
                                            <td>Tipos de OS</td>
                                            <td><input type="checkbox" name="tipo_os_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="tipo_os_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="tipo_os_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="tipo_os_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Situações de SS -->
                                        <tr>
                                            <td>Situações de SS</td>
                                            <td><input type="checkbox" name="situacao_ss_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_ss_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_ss_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_ss_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Situações de OS -->
                                        <tr>
                                            <td>Situações de OS</td>
                                            <td><input type="checkbox" name="situacao_os_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_os_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_os_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_os_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Prioridades de OS -->
                                        <tr>
                                            <td>Prioridades de OS</td>
                                            <td><input type="checkbox" name="prioridade_os_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="prioridade_os_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="prioridade_os_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="prioridade_os_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Cadastro de Relatórios -->
                                        <tr>
                                            <td>Cadastro de Relatórios</td>
                                            <td><input type="checkbox" name="cad_rel_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cad_rel_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cad_rel_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="cad_rel_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Grupos de Equipamento -->
                                        <tr>
                                            <td>Grupos de Equipamento</td>
                                            <td><input type="checkbox" name="grupos_equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="grupos_equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="grupos_equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="grupos_equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Subgrupos de Equipamento -->
                                        <tr>
                                            <td>Subgrupos de Equipamento</td>
                                            <td><input type="checkbox" name="subgrupos_equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="subgrupos_equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="subgrupos_equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="subgrupos_equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Classes de Equipamento -->
                                        <tr>
                                            <td>Classes de Equipamento</td>
                                            <td><input type="checkbox" name="classes_equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="classes_equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="classes_equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="classes_equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Situação de Equipamento -->
                                        <tr>
                                            <td>Situação de Equipamento</td>
                                            <td><input type="checkbox" name="situacao_equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="situacao_equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Marcas de Equipamento -->
                                        <tr>
                                            <td>Marcas de Equipamento</td>
                                            <td><input type="checkbox" name="marcas_equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="marcas_equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="marcas_equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="marcas_equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Modelos de Equipamento -->
                                        <tr>
                                            <td>Modelos de Equipamento</td>
                                            <td><input type="checkbox" name="modelos_equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="modelos_equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="modelos_equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="modelos_equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Equipamentos -->
                                        <tr>
                                            <td>Equipamentos</td>
                                            <td><input type="checkbox" name="equipamento_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="equipamento_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="equipamento_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="equipamento_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Profissionais -->
                                        <tr>
                                            <td>Profissionais</td>
                                            <td><input type="checkbox" name="profissional_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="profissional_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="profissional_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="profissional_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Estoque -->
                                        <tr>
                                            <td>Estoque</td>
                                            <td><input type="checkbox" name="estoque_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="estoque_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="estoque_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="estoque_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Solicitações de Serviço -->
                                        <tr>
                                            <td>Solicitações de Serviço</td>
                                            <td><input type="checkbox" name="ss_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="ss_orcar" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="ss_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Ordens de Serviço -->
                                        <tr>
                                            <td>Ordens de Serviço</td>
                                            <td><input type="checkbox" name="os_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="os_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="os_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="os_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Responsável Técnico -->
                                        <tr>
                                            <td>Responsável Técnico</td>
                                            <td><input type="checkbox" name="resp_tec_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="resp_tec_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="resp_tec_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="resp_tec_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Obras -->
                                        <tr>
                                            <td>Obras</td>
                                            <td><input type="checkbox" name="obras_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="obras_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="obras_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="obras_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Relatórios -->
                                        <tr>
                                            <td>Relatórios</td>
                                            <td><input type="checkbox" name="relatorios_visualizacao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Borderôs -->
                                        <tr>
                                            <td>Borderôs</td>
                                            <td><input type="checkbox" name="bordero_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="bordero_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="bordero_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="bordero_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        <!-- Compras -->
                                        <tr>
                                            <td>Compras</td>
                                            <td><input type="checkbox" name="compras_visualizacao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="compras_cadastro" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="compras_edicao" value="1" class="marcar" /></td>
                                            <td><input type="checkbox" name="compras_exclusao" value="1" class="marcar" /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-floppy-disk"></span> Alterar</button>
                            </div>
                        </form>
                    </div>
                    <?php /*
                    $sql_faxinas2 = mysql_query("SELECT * FROM tb_usuario ORDER BY id ASC") or die (mysql_error());
                    while ($dados_fax = mysql_fetch_array($sql_faxinas2)) {

                        $id_cliente = explode(" , ",$dados_fax['id_cliente']);

                        $sql_pr = mysql_query("SELECT * FROM tb_privilegios WHERE id_usuario='".$dados_fax['id']."'") or die (mysql_error());
                        $row_pr = mysql_fetch_assoc($sql_pr);

                        $senha = base64_decode($dados_fax['senha']);

                        if ($row_pr['master'] == '0') {$checked_master = '';} else {$checked_master = 'checked="checked"';}
                        if ($row_pr['cargo_visualizacao'] == '0') {$checked_cargo_visualizacao = '';} else {$checked_cargo_visualizacao = 'checked="checked"';}
                        if ($row_pr['cargo_cadastro'] == '0') {$checked_cargo_cadastro = '';} else {$checked_cargo_cadastro = 'checked="checked"';}
                        if ($row_pr['cargo_edicao'] == '0') {$checked_cargo_edicao = '';} else {$checked_cargo_edicao = 'checked="checked"';}
                        if ($row_pr['cargo_exclusao'] == '0') {$checked_cargo_exclusao = '';} else {$checked_cargo_exclusao = 'checked="checked"';}
                        if ($row_pr['clientes_visualizacao'] == '0') {$checked_clientes_visualizacao = '';} else {$checked_clientes_visualizacao = 'checked="checked"';}
                        if ($row_pr['clientes_cadastro'] == '0') {$checked_clientes_cadastro = '';} else {$checked_clientes_cadastro = 'checked="checked"';}
                        if ($row_pr['clientes_edicao'] == '0') {$checked_clientes_edicao = '';} else {$checked_clientes_edicao = 'checked="checked"';}
                        if ($row_pr['clientes_exclusao'] == '0') {$checked_clientes_exclusao = '';} else {$checked_clientes_exclusao = 'checked="checked"';}
                        if ($row_pr['categorias_visualizacao'] == '0') {$checked_categorias_visualizacao = '';} else {$checked_categorias_visualizacao = 'checked="checked"';}
                        if ($row_pr['categorias_cadastro'] == '0') {$checked_categorias_cadastro = '';} else {$checked_categorias_cadastro = 'checked="checked"';}
                        if ($row_pr['categorias_edicao'] == '0') {$checked_categorias_edicao = '';} else {$checked_categorias_edicao = 'checked="checked"';}
                        if ($row_pr['categorias_exclusao'] == '0') {$checked_categorias_exclusao = '';} else {$checked_categorias_exclusao = 'checked="checked"';}
                        if ($row_pr['cateservico_visualizacao'] == '0') {$checked_cateservico_visualizacao = '';} else {$checked_cateservico_visualizacao = 'checked="checked"';}
                        if ($row_pr['cateservico_cadastro'] == '0') {$checked_cateservico_cadastro = '';} else {$checked_cateservico_cadastro = 'checked="checked"';}
                        if ($row_pr['cateservico_edicao'] == '0') {$checked_cateservico_edicao = '';} else {$checked_cateservico_edicao = 'checked="checked"';}
                        if ($row_pr['cateservico_exclusao'] == '0') {$checked_cateservico_exclusao = '';} else {$checked_cateservico_exclusao = 'checked="checked"';}
                        if ($row_pr['esferas_visualizacao'] == '0') {$checked_esferas_visualizacao = '';} else {$checked_esferas_visualizacao = 'checked="checked"';}
                        if ($row_pr['esferas_cadastro'] == '0') {$checked_esferas_cadastro = '';} else {$checked_esferas_cadastro = 'checked="checked"';}
                        if ($row_pr['esferas_edicao'] == '0') {$checked_esferas_edicao = '';} else {$checked_esferas_edicao = 'checked="checked"';}
                        if ($row_pr['esferas_exclusao'] == '0') {$checked_esferas_exclusao = '';} else {$checked_esferas_exclusao = 'checked="checked"';}
                        if ($row_pr['feriados_visualizacao'] == '0') {$checked_feriados_visualizacao = '';} else {$checked_feriados_visualizacao = 'checked="checked"';}
                        if ($row_pr['feriados_cadastro'] == '0') {$checked_feriados_cadastro = '';} else {$checked_feriados_cadastro = 'checked="checked"';}
                        if ($row_pr['feriados_edicao'] == '0') {$checked_feriados_edicao = '';} else {$checked_feriados_edicao = 'checked="checked"';}
                        if ($row_pr['feriados_exclusao'] == '0') {$checked_feriados_exclusao = '';} else {$checked_feriados_exclusao = 'checked="checked"';}
                        if ($row_pr['unidades_visualizacao'] == '0') {$checked_unidades_visualizacao = '';} else {$checked_unidades_visualizacao = 'checked="checked"';}
                        if ($row_pr['unidades_cadastro'] == '0') {$checked_unidades_cadastro = '';} else {$checked_unidades_cadastro = 'checked="checked"';}
                        if ($row_pr['unidades_edicao'] == '0') {$checked_unidades_edicao = '';} else {$checked_unidades_edicao = 'checked="checked"';}
                        if ($row_pr['unidades_exclusao'] == '0') {$checked_unidades_exclusao = '';} else {$checked_unidades_exclusao = 'checked="checked"';}
                        if ($row_pr['grupos_material_visualizacao'] == '0') {$checked_grupos_material_visualizacao = '';} else {$checked_grupos_material_visualizacao = 'checked="checked"';}
                        if ($row_pr['grupos_material_cadastro'] == '0') {$checked_grupos_material_cadastro = '';} else {$checked_grupos_material_cadastro = 'checked="checked"';}
                        if ($row_pr['grupos_material_edicao'] == '0') {$checked_grupos_material_edicao = '';} else {$checked_grupos_material_edicao = 'checked="checked"';}
                        if ($row_pr['grupos_material_exclusao'] == '0') {$checked_grupos_material_exclusao = '';} else {$checked_grupos_material_exclusao = 'checked="checked"';}
                        if ($row_pr['material_visualizacao'] == '0') {$checked_material_visualizacao = '';} else {$checked_material_visualizacao = 'checked="checked"';}
                        if ($row_pr['material_cadastro'] == '0') {$checked_material_cadastro = '';} else {$checked_material_cadastro = 'checked="checked"';}
                        if ($row_pr['material_edicao'] == '0') {$checked_material_edicao = '';} else {$checked_material_edicao = 'checked="checked"';}
                        if ($row_pr['material_exclusao'] == '0') {$checked_material_exclusao = '';} else {$checked_material_exclusao = 'checked="checked"';}
                        if ($row_pr['tipo_os_visualizacao'] == '0') {$checked_tipo_os_visualizacao = '';} else {$checked_tipo_os_visualizacao = 'checked="checked"';}
                        if ($row_pr['tipo_os_cadastro'] == '0') {$checked_tipo_os_cadastro = '';} else {$checked_tipo_os_cadastro = 'checked="checked"';}
                        if ($row_pr['tipo_os_edicao'] == '0') {$checked_tipo_os_edicao = '';} else {$checked_tipo_os_edicao = 'checked="checked"';}
                        if ($row_pr['tipo_os_exclusao'] == '0') {$checked_tipo_os_exclusao = '';} else {$checked_tipo_os_exclusao = 'checked="checked"';}
                        if ($row_pr['situacao_ss_visualizacao'] == '0') {$checked_situacao_ss_visualizacao = '';} else {$checked_situacao_ss_visualizacao = 'checked="checked"';}
                        if ($row_pr['situacao_ss_cadastro'] == '0') {$checked_situacao_ss_cadastro = '';} else {$checked_situacao_ss_cadastro = 'checked="checked"';}
                        if ($row_pr['situacao_ss_edicao'] == '0') {$checked_situacao_ss_edicao = '';} else {$checked_situacao_ss_edicao = 'checked="checked"';}
                        if ($row_pr['situacao_ss_exclusao'] == '0') {$checked_situacao_ss_exclusao = '';} else {$checked_situacao_ss_exclusao = 'checked="checked"';}
                        if ($row_pr['situacao_os_visualizacao'] == '0') {$checked_situacao_os_visualizacao = '';} else {$checked_situacao_os_visualizacao = 'checked="checked"';}
                        if ($row_pr['situacao_os_cadastro'] == '0') {$checked_situacao_os_cadastro = '';} else {$checked_situacao_os_cadastro = 'checked="checked"';}
                        if ($row_pr['situacao_os_edicao'] == '0') {$checked_situacao_os_edicao = '';} else {$checked_situacao_os_edicao = 'checked="checked"';}
                        if ($row_pr['situacao_os_exclusao'] == '0') {$checked_situacao_os_exclusao = '';} else {$checked_situacao_os_exclusao = 'checked="checked"';}
                        if ($row_pr['prioridade_os_visualizacao'] == '0') {$checked_prioridade_os_visualizacao = '';} else {$checked_prioridade_os_visualizacao = 'checked="checked"';}
                        if ($row_pr['prioridade_os_cadastro'] == '0') {$checked_prioridade_os_cadastro = '';} else {$checked_prioridade_os_cadastro = 'checked="checked"';}
                        if ($row_pr['prioridade_os_edicao'] == '0') {$checked_prioridade_os_edicao = '';} else {$checked_prioridade_os_edicao = 'checked="checked"';}
                        if ($row_pr['prioridade_os_exclusao'] == '0') {$checked_prioridade_os_exclusao = '';} else {$checked_prioridade_os_exclusao = 'checked="checked"';}
                        if ($row_pr['cad_rel_visualizacao'] == '0') {$checked_cad_rel_visualizacao = '';} else {$checked_cad_rel_visualizacao = 'checked="checked"';}
                        if ($row_pr['cad_rel_cadastro'] == '0') {$checked_cad_rel_cadastro = '';} else {$checked_cad_rel_cadastro = 'checked="checked"';}
                        if ($row_pr['cad_rel_edicao'] == '0') {$checked_cad_rel_edicao = '';} else {$checked_cad_rel_edicao = 'checked="checked"';}
                        if ($row_pr['cad_rel_exclusao'] == '0') {$checked_cad_rel_exclusao = '';} else {$checked_cad_rel_exclusao = 'checked="checked"';}
                        if ($row_pr['grupos_equipamento_visualizacao'] == '0') {$checked_grupos_equipamento_visualizacao = '';} else {$checked_grupos_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['grupos_equipamento_cadastro'] == '0') {$checked_grupos_equipamento_cadastro = '';} else {$checked_grupos_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['grupos_equipamento_edicao'] == '0') {$checked_grupos_equipamento_edicao = '';} else {$checked_grupos_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['grupos_equipamento_exclusao'] == '0') {$checked_grupos_equipamento_exclusao = '';} else {$checked_grupos_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['subgrupos_equipamento_visualizacao'] == '0') {$checked_subgrupos_equipamento_visualizacao = '';} else {$checked_subgrupos_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['subgrupos_equipamento_cadastro'] == '0') {$checked_subgrupos_equipamento_cadastro = '';} else {$checked_subgrupos_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['subgrupos_equipamento_edicao'] == '0') {$checked_subgrupos_equipamento_edicao = '';} else {$checked_subgrupos_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['subgrupos_equipamento_exclusao'] == '0') {$checked_subgrupos_equipamento_exclusao = '';} else {$checked_subgrupos_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['classes_equipamento_visualizacao'] == '0') {$checked_classes_equipamento_visualizacao = '';} else {$checked_classes_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['classes_equipamento_cadastro'] == '0') {$checked_classes_equipamento_cadastro = '';} else {$checked_classes_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['classes_equipamento_edicao'] == '0') {$checked_classes_equipamento_edicao = '';} else {$checked_classes_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['classes_equipamento_exclusao'] == '0') {$checked_classes_equipamento_exclusao = '';} else {$checked_classes_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['situacao_equipamento_visualizacao'] == '0') {$checked_situacao_equipamento_visualizacao = '';} else {$checked_situacao_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['situacao_equipamento_cadastro'] == '0') {$checked_situacao_equipamento_cadastro = '';} else {$checked_situacao_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['situacao_equipamento_edicao'] == '0') {$checked_situacao_equipamento_edicao = '';} else {$checked_situacao_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['situacao_equipamento_exclusao'] == '0') {$checked_situacao_equipamento_exclusao = '';} else {$checked_situacao_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['marcas_equipamento_visualizacao'] == '0') {$checked_marcas_equipamento_visualizacao = '';} else {$checked_marcas_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['marcas_equipamento_cadastro'] == '0') {$checked_marcas_equipamento_cadastro = '';} else {$checked_marcas_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['marcas_equipamento_edicao'] == '0') {$checked_marcas_equipamento_edicao = '';} else {$checked_marcas_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['marcas_equipamento_exclusao'] == '0') {$checked_marcas_equipamento_exclusao = '';} else {$checked_marcas_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['modelos_equipamento_visualizacao'] == '0') {$checked_modelos_equipamento_visualizacao = '';} else {$checked_modelos_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['modelos_equipamento_cadastro'] == '0') {$checked_modelos_equipamento_cadastro = '';} else {$checked_modelos_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['modelos_equipamento_edicao'] == '0') {$checked_modelos_equipamento_edicao = '';} else {$checked_modelos_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['modelos_equipamento_exclusao'] == '0') {$checked_modelos_equipamento_exclusao = '';} else {$checked_modelos_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['equipamento_visualizacao'] == '0') {$checked_equipamento_visualizacao = '';} else {$checked_equipamento_visualizacao = 'checked="checked"';}
                        if ($row_pr['equipamento_cadastro'] == '0') {$checked_equipamento_cadastro = '';} else {$checked_equipamento_cadastro = 'checked="checked"';}
                        if ($row_pr['equipamento_edicao'] == '0') {$checked_equipamento_edicao = '';} else {$checked_equipamento_edicao = 'checked="checked"';}
                        if ($row_pr['equipamento_exclusao'] == '0') {$checked_equipamento_exclusao = '';} else {$checked_equipamento_exclusao = 'checked="checked"';}
                        if ($row_pr['profissional_visualizacao'] == '0') {$checked_profissional_visualizacao = '';} else {$checked_profissional_visualizacao = 'checked="checked"';}
                        if ($row_pr['profissional_cadastro'] == '0') {$checked_profissional_cadastro = '';} else {$checked_profissional_cadastro = 'checked="checked"';}
                        if ($row_pr['profissional_edicao'] == '0') {$checked_profissional_edicao = '';} else {$checked_profissional_edicao = 'checked="checked"';}
                        if ($row_pr['profissional_exclusao'] == '0') {$checked_profissional_exclusao = '';} else {$checked_profissional_exclusao = 'checked="checked"';}
                        if ($row_pr['estoque_visualizacao'] == '0') {$checked_estoque_visualizacao = '';} else {$checked_estoque_visualizacao = 'checked="checked"';}
                        if ($row_pr['estoque_cadastro'] == '0') {$checked_estoque_cadastro = '';} else {$checked_estoque_cadastro = 'checked="checked"';}
                        if ($row_pr['estoque_edicao'] == '0') {$checked_estoque_edicao = '';} else {$checked_estoque_edicao = 'checked="checked"';}
                        if ($row_pr['estoque_exclusao'] == '0') {$checked_estoque_exclusao = '';} else {$checked_estoque_exclusao = 'checked="checked"';}
                        if ($row_pr['ss_visualizacao'] == '0') {$checked_ss_visualizacao = '';} else {$checked_ss_visualizacao = 'checked="checked"';}
                        if ($row_pr['ss_exclusao'] == '0') {$checked_ss_exclusao = '';} else {$checked_ss_exclusao = 'checked="checked"';}
                        if ($row_pr['ss_orcar'] == '0') {$checked_ss_orcar = '';} else {$checked_ss_orcar = 'checked="checked"';}
                        if ($row_pr['os_visualizacao'] == '0') {$checked_os_visualizacao = '';} else {$checked_os_visualizacao = 'checked="checked"';}
                        if ($row_pr['os_cadastro'] == '0') {$checked_os_cadastro = '';} else {$checked_os_cadastro = 'checked="checked"';}
                        if ($row_pr['os_edicao'] == '0') {$checked_os_edicao = '';} else {$checked_os_edicao = 'checked="checked"';}
                        if ($row_pr['os_exclusao'] == '0') {$checked_os_exclusao = '';} else {$checked_os_exclusao = 'checked="checked"';}
                        if ($row_pr['os_cancelar'] == '0') {$checked_os_cancelar = '';} else {$checked_os_cancelar = 'checked="checked"';}
                        if ($row_pr['os_validar'] == '0') {$checked_os_validar = '';} else {$checked_os_validar = 'checked="checked"';}
                        if ($row_pr['os_finalizar'] == '0') {$checked_os_finalizar = '';} else {$checked_os_finalizar = 'checked="checked"';}
                        if ($row_pr['resp_tec_visualizacao'] == '0') {$checked_resp_tec_visualizacao = '';} else {$checked_resp_tec_visualizacao = 'checked="checked"';}
                        if ($row_pr['resp_tec_cadastro'] == '0') {$checked_resp_tec_cadastro = '';} else {$checked_resp_tec_cadastro = 'checked="checked"';}
                        if ($row_pr['resp_tec_edicao'] == '0') {$checked_resp_tec_edicao = '';} else {$checked_resp_tec_edicao = 'checked="checked"';}
                        if ($row_pr['resp_tec_exclusao'] == '0') {$checked_resp_tec_exclusao = '';} else {$checked_resp_tec_exclusao = 'checked="checked"';}
                        if ($row_pr['obras_visualizacao'] == '0') {$checked_obras_visualizacao = '';} else {$checked_obras_visualizacao = 'checked="checked"';}
                        if ($row_pr['obras_cadastro'] == '0') {$checked_obras_cadastro = '';} else {$checked_obras_cadastro = 'checked="checked"';}
                        if ($row_pr['obras_edicao'] == '0') {$checked_obras_edicao = '';} else {$checked_obras_edicao = 'checked="checked"';}
                        if ($row_pr['obras_exclusao'] == '0') {$checked_obras_exclusao = '';} else {$checked_obras_exclusao = 'checked="checked"';}
                        if ($row_pr['obras_data'] == '0') {$checked_obras_data = '';} else {$checked_obras_data = 'checked="checked"';}
                        if ($row_pr['obras_diario'] == '0') {$checked_obras_diario = '';} else {$checked_obras_diario = 'checked="checked"';}
                        if ($row_pr['relatorios_visualizacao'] == '0') {$checked_relatorios_visualizacao = '';} else {$checked_relatorios_visualizacao = 'checked="checked"';}
                        if ($row_pr['validar_manutencao'] == '0') {$checked_validar_manutencao = '';} else {$checked_validar_manutencao= 'checked="checked"';}
                        if ($row_pr['bordero_visualizacao'] == '0') {$checked_bordero_visualizacao = '';} else {$checked_bordero_visualizacao = 'checked="checked"';}
                        if ($row_pr['bordero_cadastro'] == '0') {$checked_bordero_cadastro = '';} else {$checked_bordero_cadastro = 'checked="checked"';}
                        if ($row_pr['bordero_edicao'] == '0') {$checked_bordero_edicao = '';} else {$checked_bordero_edicao = 'checked="checked"';}
                        if ($row_pr['bordero_exclusao'] == '0') {$checked_bordero_exclusao = '';} else {$checked_bordero_exclusao = 'checked="checked"';}

                        if ($row_pr['compras_visualizacao'] == '0') {$checked_compras_visualizacao = '';} else {$checked_compras_visualizacao = 'checked="checked"';}
                        if ($row_pr['compras_cadastro'] == '0') {$checked_compras_cadastro = '';} else {$checked_compras_cadastro = 'checked="checked"';}
                        if ($row_pr['compras_edicao'] == '0') {$checked_compras_edicao = '';} else {$checked_compras_edicao = 'checked="checked"';}
                        if ($row_pr['compras_exclusao'] == '0') {$checked_compras_exclusao = '';} else {$checked_compras_exclusao = 'checked="checked"';}
                        if ($row_pr['status_compra'] == '0') {$checked_compra_status = '';} else {$checked_compra_status = 'checked="checked"';}
                        */ ?>
                    <script type="text/javascript">
                        function check_<?php /* echo $dados_fax['id'] */ ?>(){
                            if($('#master_<?php /* echo $dados_fax['id'] */ ?>').prop('checked') == true){ // se o checkbox estiver selecionado quando clicado
                                $('.marcar_<?php /* echo $dados_fax['id'] */ ?>').prop('checked', true);  // seleciona toda a classe check
                            }else{ // se não estiver selecionado
                                $('.marcar_<?php /* echo $dados_fax['id'] */ ?>').prop('checked', false);  // desmarca a classe check
                            }
                        }
                    </script>
                    <?php /* } */ ?>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</body>
</html>