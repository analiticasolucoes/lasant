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
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> Usuários do Sistema</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="add_usuario.php" method="post" enctype="multipart/form-data" target="_self">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" />
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
                                <div class="form-group">
                                    <label>Cargos</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="cargo_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cargo_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cargo_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cargo_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clientes</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="clientes_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="clientes_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="clientes_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="clientes_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Categorias</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="categorias_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="categorias_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="categorias_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="categorias_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Categorias de Serviço</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="cateservico_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cateservico_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cateservico_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cateservico_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Esferas</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="esferas_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="esferas_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="esferas_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="esferas_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Feriados</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="feriados_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="feriados_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="feriados_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="feriados_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Unidades</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="unidades_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="unidades_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="unidades_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="unidades_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Grupos Material</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_material_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_material_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_material_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_material_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Material</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="material_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="material_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="material_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="material_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipos de OS</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="tipo_os_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="tipo_os_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="tipo_os_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="tipo_os_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situações de SS</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_ss_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_ss_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_ss_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_ss_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situações de OS</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_os_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_os_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_os_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_os_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Prioridades de OS</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="prioridade_os_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="prioridade_os_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="prioridade_os_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="prioridade_os_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cadastro de Relatórios</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="cad_rel_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cad_rel_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cad_rel_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="cad_rel_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Grupos de Equipamento</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="grupos_equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subgrupos de Equipamento</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="subgrupos_equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="subgrupos_equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="subgrupos_equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="subgrupos_equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Classes de Equipamento</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="classes_equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="classes_equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="classes_equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="classes_equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situação de Equipamento</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="situacao_equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Marcas de Equipamento</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="marcas_equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="marcas_equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="marcas_equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="marcas_equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Modelos de Equipamento</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="modelos_equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="modelos_equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="modelos_equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="modelos_equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Equipamentos</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="equipamento_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="equipamento_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="equipamento_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="equipamento_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="validar_manutencao" value="1" class="marcar" /> Validar Manutenção
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Profissionais</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="profissional_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="profissional_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="profissional_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="profissional_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Estoque</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="estoque_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="estoque_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="estoque_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="estoque_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Solicitações de Serviço</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="ss_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="ss_orcar" value="1" class="marcar" /> Orçar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="ss_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ordens de Serviço</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_cancelar" value="1" class="marcar" /> Cancelar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_validar" value="1" class="marcar" /> Validar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="os_finalizar" value="1" class="marcar" /> Finalizar
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Responsável Técnico</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="resp_tec_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="resp_tec_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="resp_tec_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="resp_tec_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Obras</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="obras_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="obras_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="obras_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="obras_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="obras_data" value="1" class="marcar" /> Data da Obra
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="obras_diario" value="1" class="marcar" /> Editar Diario
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Relatórios</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="relatorios_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Borderôs</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="bordero_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="bordero_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="bordero_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="bordero_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Compras</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="compras_visualizacao" value="1" class="marcar" /> Visualizar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="compras_cadastro" value="1" class="marcar" /> Cadastrar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="compras_edicao" value="1" class="marcar" /> Editar
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="compras_exclusao" value="1" class="marcar" /> Excluir
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="col-md-3">
                                    <input type="checkbox" name="status_compra" value="1" class="marcar" /> Status Compras
                                </div>

                            </div>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
                            </div>
                        </form>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <?php
                                    if(!empty($usuarios)):
                                        foreach($usuarios as $usuario):
                                            ?>
                                            <tr>
                                                <td><?= $usuario->getNome() /* echo $dados['nome'] */ ?></td>
                                                <td><?= $usuario->getUsuario() /* echo $dados['usuario'] */ ?></td>
                                                <td>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Editar"
                                                        data-toggle="modal"
                                                        class="btn btn-primary update-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="javascript:void(0);"
                                                        title="Excluir"
                                                        data-toggle="modal"
                                                        class="btn btn-danger delete-link">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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
                        </div>
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
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
<!-- Modal's -->
<!-- Update Modal -->
<div class="modal fade" id="update-modal">
    <form id="usuarios-update-form" action="usuarios/atualizar" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Usuário</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php /* echo $dados_fax['id'] */ ?>" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php /* echo $dados_fax['nome'] */ ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Usuário</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" value="<?php /* echo $dados_fax['usuario'] */ ?>" disabled />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="<?php /* echo $senha */ ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Atualizar Foto</label>
                                <input type="file" name="arquivo">
                            </div>
                        </div>
                        <?php /* if($dados_fax['foto'] != '') { */ ?>
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <img src="<?php /* echo $dados_fax['foto'] */ ?>" class="img-responsive" />
                            </div>
                        </div>
                        <?php /* } */ ?>
                        <input type="hidden" name="foto_antiga" value="<?php /* echo $dados_fax['foto'] */ ?>" />
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
                                                    $z = 0;
                                                    while ($row = mysql_fetch_array($sql_consult3)) {
                                                        $z++;
                                                        if (in_array($row['id'],$id_cliente) == true) { $checked = "checked"; } else { $checked = ""; }
                                                        */ ?>
                            <div class="col-md-6">
                                <input type="checkbox" name="id_cliente[]" value="<?php /* echo $row['id'] */ ?>" <?php /* echo $checked */ ?> />  <?php /* echo $row['nome_empresa'] */ ?>
                            </div>

                            <?php /* if($z % 2 == 0) { */ ?>
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
                                                    $y = 0;
                                                    while ($row = mysql_fetch_array($sql_consult3)) {
                                                        $y++;
                                                        if (in_array($row['id'],$id_cliente) == true) { $checked = "checked"; } else { $checked = ""; }
                                                        */ ?>
                            <div class="col-md-6">
                                <input type="checkbox" name="id_cliente[]" value="<?php /* echo $row['id'] */ ?>" <?php /* echo $checked */ ?> />  <?php /* echo $row['nome_empresa'] */ ?>
                            </div>
                            <?php /* if($y % 2 == 0) { */ ?>
                            <div class="col-md-12">
                                <hr style="border-bottom:1px dotted #ccc;" />
                            </div>
                            <?php /* } */ ?>
                            <?php /* } */ ?>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Privilégios</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input name="master" type="checkbox" id="master_<?php /* echo $dados_fax['id'] */ ?>" value="1" onClick="check_<?php /* echo $dados_fax['id'] */ ?>();" <?php /* echo $checked_master */ ?> /> Master
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cargos</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="cargo_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cargo_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cargo_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cargo_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cargo_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cargo_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cargo_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cargo_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Clientes</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="clientes_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_clientes_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="clientes_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_clientes_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="clientes_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_clientes_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="clientes_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_clientes_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Categorias</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="categorias_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_categorias_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="categorias_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_categorias_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="categorias_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_categorias_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="categorias_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_categorias_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Categorias de Serviço</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="cateservico_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cateservico_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cateservico_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cateservico_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cateservico_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cateservico_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cateservico_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cateservico_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Esferas</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="esferas_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_esferas_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="esferas_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_esferas_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="esferas_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_esferas_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="esferas_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_esferas_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Feriados</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="feriados_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_feriados_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="feriados_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_feriados_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="feriados_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_feriados_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="feriados_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_feriados_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Unidades</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="unidades_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_unidades_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="unidades_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_unidades_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="unidades_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_unidades_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="unidades_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_unidades_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Grupos Material</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_material_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_material_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_material_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_material_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_material_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_material_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_material_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_material_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Material</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="material_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_material_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="material_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_material_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="material_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_material_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="material_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_material_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipos de OS</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="tipo_os_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_tipo_os_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="tipo_os_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_tipo_os_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="tipo_os_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_tipo_os_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="tipo_os_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_tipo_os_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Situações de SS</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_ss_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_ss_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_ss_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_ss_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_ss_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_ss_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_ss_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_ss_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Situações de OS</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_os_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_os_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_os_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_os_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_os_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_os_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_os_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_os_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Prioridades de OS</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="prioridade_os_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_prioridade_os_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="prioridade_os_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_prioridade_os_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="prioridade_os_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_prioridade_os_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="prioridade_os_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_prioridade_os_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cadastro de Relatórios</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="cad_rel_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cad_rel_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cad_rel_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cad_rel_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cad_rel_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cad_rel_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="cad_rel_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_cad_rel_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Grupos de Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="grupos_equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_grupos_equipamento_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subgrupos de Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="subgrupos_equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_subgrupos_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="subgrupos_equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_subgrupos_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="subgrupos_equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_subgrupos_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="subgrupos_equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_subgrupos_equipamento_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Classes de Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="classes_equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_classes_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="classes_equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_classes_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="classes_equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_classes_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="classes_equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_classes_equipamento_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Situação de Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="situacao_equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_situacao_equipamento_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Marcas de Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="marcas_equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_marcas_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="marcas_equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_marcas_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="marcas_equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_marcas_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="marcas_equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_marcas_equipamento_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Modelos de Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="modelos_equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_modelos_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="modelos_equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_modelos_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="modelos_equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_modelos_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="modelos_equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_modelos_equipamento_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Equipamentos</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="equipamento_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_equipamento_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="equipamento_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_equipamento_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="equipamento_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_equipamento_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="equipamento_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_equipamento_exclusao */ ?> /> Excluir
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="validar_manutencao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_validar_manutencao */ ?> /> Validar Manutenção
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Profissionais</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="profissional_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_profissional_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="profissional_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_profissional_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="profissional_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_profissional_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="profissional_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_profissional_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Estoque</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="estoque_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_estoque_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="estoque_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_estoque_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="estoque_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_estoque_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="estoque_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_estoque_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Solicitações de Serviço</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="ss_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_ss_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="ss_orcar" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_ss_orcar */ ?> /> Orçar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="ss_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_ss_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ordens de Serviço</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="os_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="os_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="os_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="os_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_exclusao */ ?> /> Excluir
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="os_cancelar" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_cancelar */ ?> /> Cancelar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="os_validar" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_validar */ ?> /> Validar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="os_finalizar" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_os_finalizar */ ?> /> Finalizar
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Responsável Técnico</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="resp_tec_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_resp_tec_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="resp_tec_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_resp_tec_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="resp_tec_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_resp_tec_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="resp_tec_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_resp_tec_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Obras</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="obras_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_obras_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="obras_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_obras_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="obras_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_obras_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="obras_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_obras_exclusao */ ?> /> Excluir
                            </div>

                            <div class="col-md-3">
                                <input type="checkbox" name="obras_data" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_obras_data */ ?> /> Data da Obra
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="obras_diario" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_obras_diario */ ?> /> Editar Diário
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Relatórios</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="relatorios_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_relatorios_visualizacao */ ?> /> Visualizar
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Borderôs</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="bordero_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_bordero_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="bordero_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_bordero_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="bordero_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_bordero_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="bordero_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_bordero_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Compras</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="compras_visualizacao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_compras_visualizacao */ ?> /> Visualizar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="compras_cadastro" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_compras_cadastro */ ?> /> Cadastrar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="compras_edicao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_compras_edicao */ ?> /> Editar
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="compras_exclusao" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_compras_exclusao */ ?> /> Excluir
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="col-md-3">
                                <input type="checkbox" name="status_compra" value="1" class="marcar_<?php /* echo $dados_fax['id'] */ ?>" <?php /* echo $checked_compra_status */ ?> /> Status Compras
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="border-bottom:1px dotted #ccc;" />
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
    <form id="usuarios-delete-form" action="usuarios/excluir" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Excluir Usuário</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Tem certeza que deseja Excluir o Usuário <b></b> ?</p>
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
            /*var id = $(this).data('id');  // Captura o ID do item
            var nome = $(this).data('nome');

            // Preenche o campo oculto do formulário no modal com o ID
            $('#delete-modal input[name="id"]').val(id);

            // Opcional: Atualiza o texto do modal para incluir o ID ou o nome do item
            $('#delete-modal .modal-body p b').text(nome);*/

            // Exibe o modal
            $('#delete-modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Quando o link de edição for clicado
        $('.update-link').on('click', function() {
            /*var id = $(this).data('id');
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
            $('#cargo').append('<option value="' + cargoID + '" selected>' + cargoDescricao + '</option>');*/

            // Exibe o modal
            $('#update-modal').modal('show');
        });
    });
</script>
</html>