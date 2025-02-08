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
                    <h3 class="box-title"><i class="fa fa-users"></i> Cadastrar Usuário</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form id="usuarios-add-form" action="usuarios/incluir" method="post" enctype="multipart/form-data" target="_self">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="usuario">Usuário</label>
                                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" id="foto" name="foto">
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
                                <div class="table-responsive" style="max-height: 30vh; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active text-uppercase">
                                                <th>
                                                    <input type="checkbox" name="todos-clientes" value="1" class="marcar-todos" />
                                                </th>
                                                <th>Cliente</th>
                                                <th>CNPJ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($clientes as $cliente): ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="clientes[]" value="<?= $cliente->getId() ?>" class="marcar" />
                                                </td>
                                                <td><?= $cliente->getNomeEmpresa() ?></td>
                                                <td><?= $cliente->getCNPJ() ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <hr style="border-bottom:1px dotted #ccc;" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fornecedores para Acesso</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <div class="table-responsive" style="max-height: 30vh; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active text-uppercase">
                                                <th>
                                                    <input type="checkbox" name="todos-fornecedores" value="1" class="marcar-todos" />
                                                </th>
                                                <th>Fornecedor</th>
                                                <th>CNPJ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($fornecedores as $fornecedor): ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="fornecedores[]" value="<?= $fornecedor->getId() ?>" class="marcar" />
                                                </td>
                                                <td><?= $fornecedor->getNomeEmpresa() ?></td>
                                                <td><?= $fornecedor->getCNPJ() ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <hr style="border-bottom:1px dotted #ccc;" />
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="form-group">
                                    <label for="master">Privilégios</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active text-uppercase">
                                                <th>
                                                    <input name="master" type="checkbox" id="master" value="1" class="marcar-todos" />
                                                    <label for="master">Marcar Todos (Master)</label>
                                                </th>

                                                <th>
                                                    <input id="visualizar-todos" name="visualizar-todos" type="checkbox" value="1" class="check-visualizar-todos" />
                                                    <label for="visualizar-todos">Visualizar</label>
                                                </th>
                                                <th>
                                                    <input id="cadastrar-todos" name="cadastrar-todos" type="checkbox" value="1" class="check-cadastrar-todos" />
                                                    <label for="cadastrar-todos">Cadastrar</label>
                                                </th>
                                                <th>
                                                    <input id="editar-todos" name="editar-todos" type="checkbox" value="1" class="check-editar-todos" />
                                                    <label for="editar-todos">Editar</label>
                                                </th>
                                                <th>
                                                    <input id="excluir-todos" name="excluir-todos" type="checkbox" value="1" class="check-excluir-todos" />
                                                    <label for="excluir-todos">Excluir</label>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Compras -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-shopping-cart"></i> <strong>Compras</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Solicitações</td>
                                                <td><input type="checkbox" name="privilegios[compras][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[compras][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[compras][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[compras][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <tr>
                                                <td>Levantamentos</td>
                                                <td><input type="checkbox" name="privilegios[levantamentos][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[levantamentos][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[levantamentos][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[levantamentos][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Cadastros Gerais -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-folder"></i> <strong>Cadastros Gerais</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Cargos</td>
                                                <td><input type="checkbox" name="privilegios[cargos][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[cargos][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[cargos][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[cargos][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Categorias -->
                                            <tr>
                                                <td>Categorias</td>
                                                <td><input type="checkbox" name="privilegios[categorias][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[categorias][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[categorias][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[categorias][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Categorias de Serviço -->
                                            <tr>
                                                <td>Categorias de Serviço</td>
                                                <td><input type="checkbox" name="privilegios[categorias-servico][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[categorias-servico][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[categorias-servico][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[categorias-servico][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Esferas -->
                                            <tr>
                                                <td>Esferas</td>
                                                <td><input type="checkbox" name="privilegios[esferas][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[esferas][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[esferas][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[esferas][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Feriados -->
                                            <tr>
                                                <td>Feriados</td>
                                                <td><input type="checkbox" name="privilegios[feriados][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[feriados][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[feriados][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[feriados][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Tipos de OS -->
                                            <tr>
                                                <td>Tipos de OS</td>
                                                <td><input type="checkbox" name="privilegios[tipos-os][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[tipos-os][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[tipos-os][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[tipos-os][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Situações de SS -->
                                            <tr>
                                                <td>Situações de SS</td>
                                                <td><input type="checkbox" name="privilegios[situacoes-ss][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-ss][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-ss][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-ss][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Situações de OS -->
                                            <tr>
                                                <td>Situações de OS</td>
                                                <td><input type="checkbox" name="privilegios[situacoes-os][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-os][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-os][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-os][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Prioridades de OS -->
                                            <tr>
                                                <td>Prioridades de OS</td>
                                                <td><input type="checkbox" name="privilegios[prioridades-os][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[prioridades-os][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[prioridades-os][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[prioridades-os][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Cadastro de Relatórios -->
                                            <tr>
                                                <td>Relatórios</td>
                                                <td><input type="checkbox" name="privilegios[relatorios-cadastro][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[relatorios-cadastro][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[relatorios-cadastro][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[relatorios-cadastro][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Cadastro de Modelos de Impressão -->
                                            <tr>
                                                <td>Modelos de Impressão</td>
                                                <td><input type="checkbox" name="privilegios[modelos-impressao][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[modelos-impressao][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[modelos-impressao][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[modelos-impressao][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Cadastro de Formas de Pagamento -->
                                            <tr>
                                                <td>Formas de Pagamento</td>
                                                <td><input type="checkbox" name="privilegios[formas-pagamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[formas-pagamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[formas-pagamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[formas-pagamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Materiais -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-cubes"></i> <strong>Materiais</strong></td>
                                            </tr>
                                            <!-- Materiais -->
                                            <tr>
                                                <td>Materiais</td>
                                                <td><input type="checkbox" name="privilegios[materiais][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[materiais][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[materiais][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[materiais][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Unidades -->
                                            <tr>
                                                <td>Unidades</td>
                                                <td><input type="checkbox" name="privilegios[unidades][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[unidades][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[unidades][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[unidades][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Grupos Material -->
                                            <tr>
                                                <td>Grupos de Material</td>
                                                <td><input type="checkbox" name="privilegios[grupos-material][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[grupos-material][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[grupos-material][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[grupos-material][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Subgrupos Material -->
                                            <tr>
                                                <td>Subgrupos de Material</td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-material][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-material][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-material][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-material][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Classes Material -->
                                            <tr>
                                                <td>Classes de Material</td>
                                                <td><input type="checkbox" name="privilegios[classes-material][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[classes-material][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[classes-material][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[classes-material][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Ferramentas -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-screwdriver-wrench"></i> <strong>Ferramentas</strong></td>
                                            </tr>
                                            <!-- Ferramentas -->
                                            <tr>
                                                <td>Ferramentas</td>
                                                <td><input type="checkbox" name="privilegios[ferramentas][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[ferramentas][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[ferramentas][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[ferramentas][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Equipamentos -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa-solid fa-helmet-safety"></i> <strong>Equipamentos</strong></td>
                                            </tr>
                                            <!-- Equipamentos -->
                                            <tr>
                                                <td>Equipamentos</td>
                                                <td><input type="checkbox" name="privilegios[equipamentos][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[equipamentos][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[equipamentos][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[equipamentos][exclusao]" value="1" class="marcar check-excluir" /></td>
                                                <!--<td><input type="checkbox" name="privilegios[equipamento_validacao" value="1" class="marcar" /></td>-->
                                            </tr>
                                            <!-- Grupos de Equipamento -->
                                            <tr>
                                                <td>Grupos</td>
                                                <td><input type="checkbox" name="privilegios[grupos-equipamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[grupos-equipamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[grupos-equipamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[grupos-equipamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Subgrupos de Equipamento -->
                                            <tr>
                                                <td>Subgrupos</td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-equipamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-equipamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-equipamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[subgrupos-equipamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Classes de Equipamento -->
                                            <tr>
                                                <td>Classes</td>
                                                <td><input type="checkbox" name="privilegios[classes-equipamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[classes-equipamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[classes-equipamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[classes-equipamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Situações de Equipamento -->
                                            <tr>
                                                <td>Situações</td>
                                                <td><input type="checkbox" name="privilegios[situacoes-equipamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-equipamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-equipamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[situacoes-equipamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Marcas de Equipamento -->
                                            <tr>
                                                <td>Marcas</td>
                                                <td><input type="checkbox" name="privilegios[marcas-equipamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[marcas-equipamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[marcas-equipamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[marcas-equipamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Modelos de Equipamento -->
                                            <tr>
                                                <td>Modelos</td>
                                                <td><input type="checkbox" name="privilegios[modelos-equipamento][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[modelos-equipamento][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[modelos-equipamento][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[modelos-equipamento][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Planos de Manutenção -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-screwdriver-wrench"></i> <strong>Planos de Manutenção</strong></td>
                                            </tr>
                                            <!-- Planos de Manutenção -->
                                            <tr>
                                                <td>Planos de Manutenção</td>
                                                <td><input type="checkbox" name="privilegios[planos-manutencao][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[planos-manutencao][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[planos-manutencao][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[planos-manutencao][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Profissionais -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-user-tie"></i> <strong>Profissionais</strong></td>
                                            </tr>
                                            <!-- Profissionais -->
                                            <tr>
                                                <td>Profissionais</td>
                                                <td><input type="checkbox" name="privilegios[profissionais][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[profissionais][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[profissionais][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[profissionais][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Clientes -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-user"></i> <strong>Clientes</strong></td>
                                            </tr>
                                            <!-- Clientes -->
                                            <tr>
                                                <td>Clientes</td>
                                                <td><input type="checkbox" name="privilegios[clientes][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[clientes][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[clientes][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[clientes][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Solicitações de Serviço -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa-solid fa-file-invoice"></i> <strong>Solicitações de Serviço</strong></td>
                                            </tr>
                                            <!-- Solicitações de Serviço -->
                                            <tr>
                                                <td>Solicitações de Serviço</td>
                                                <td><input type="checkbox" name="privilegios[ss][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[ss][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[ss][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Ordens de Serviço -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-cogs"></i> <strong>Ordens de Serviço</strong></td>
                                            </tr>
                                            <!-- Ordens de Serviço -->
                                            <tr>
                                                <td>Ordens de Serviço</td>
                                                <td><input type="checkbox" name="privilegios[os][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[os][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[os][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[os][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Obras -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-building"></i> <strong>Obras</strong></td>
                                            </tr>
                                            <!-- Responsável Técnico -->
                                            <tr>
                                                <td>Responsável Técnico</td>
                                                <td><input type="checkbox" name="privilegios[responsavel-tecnico][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[responsavel-tecnico][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[responsavel-tecnico][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[responsavel-tecnico][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Obras -->
                                            <tr>
                                                <td>Obras</td>
                                                <td><input type="checkbox" name="privilegios[obras][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[obras][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[obras][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[obras][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Borderôs -->
                                            <tr>
                                                <td>Borderôs</td>
                                                <td><input type="checkbox" name="privilegios[borderos][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[borderos][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[borderos][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[borderos][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Estoque -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-boxes-stacked"></i> <strong>Estoque</strong></td>
                                            </tr>
                                            <!-- Estoque -->
                                            <tr>
                                                <td>Estoques</td>
                                                <td><input type="checkbox" name="privilegios[estoques][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[estoques][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[estoques][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[estoques][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Relatórios -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-file-lines"></i> <strong>Relatórios</strong></td>
                                            </tr>
                                            <!-- Relatórios -->
                                            <tr>
                                                <td>Relatórios</td>
                                                <td><input type="checkbox" name="privilegios[relatorios][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                            </tr>
                                            <!-- Acessos -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-users"></i> <strong>Acessos</strong></td>
                                            </tr>
                                            <!-- Usuários -->
                                            <tr>
                                                <td>Usuários</td>
                                                <td><input type="checkbox" name="privilegios[acessos-usuario][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[acessos-usuario][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[acessos-usuario][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[acessos-usuario][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Operadores -->
                                            <tr>
                                                <td>Operadores</td>
                                                <td><input type="checkbox" name="privilegios[acessos-operador][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[acessos-operador][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[acessos-operador][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[acessos-operador][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                            <!-- Caixinhas -->
                                            <tr class="warning">
                                                <td colspan="5"><i class="fa fa-usd"></i> <strong>Caixinhas</strong></td>
                                            </tr>
                                            <!-- Caixinhas -->
                                            <tr>
                                                <td>Caixinhas</td>
                                                <td><input type="checkbox" name="privilegios[caixinhas][visualizacao]" value="1" class="marcar check-visualizar" /></td>
                                                <td><input type="checkbox" name="privilegios[caixinhas][cadastro]" value="1" class="marcar check-cadastrar" /></td>
                                                <td><input type="checkbox" name="privilegios[caixinhas][edicao]" value="1" class="marcar check-editar" /></td>
                                                <td><input type="checkbox" name="privilegios[caixinhas][exclusao]" value="1" class="marcar check-excluir" /></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active text-uppercase">
                                                <th>Funções</th>
                                                <th>Visualizar</th>
                                                <th>Cadastrar</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</body>
<script>
    $(document).ready(function() {
        // Controle do checkbox "Master"
        $('#master').on('change', function() {
            // Marca ou desmarca todos os checkboxes da tabela
            $('.check-visualizar').prop('checked', $(this).is(':checked'));
            $('.check-cadastrar').prop('checked', $(this).is(':checked'));
            $('.check-editar').prop('checked', $(this).is(':checked'));
            $('.check-excluir').prop('checked', $(this).is(':checked'));
            $('#visualizar-todos').prop('checked', $(this).is(':checked'));
            $('#cadastrar-todos').prop('checked', $(this).is(':checked'));
            $('#editar-todos').prop('checked', $(this).is(':checked'));
            $('#excluir-todos').prop('checked', $(this).is(':checked'));
        });
        // Quando o checkbox "visualizar-todos" for marcado/desmarcado
        $('#visualizar-todos').on('change', function() {
            // Define o estado de todos os checkboxes da classe "check-visualizar"
            $('.check-visualizar').prop('checked', $(this).is(':checked'));
        });
        // Quando o checkbox "cadastrar-todos" for marcado/desmarcado
        $('#cadastrar-todos').on('change', function() {
            // Define o estado de todos os checkboxes da classe "check-cadastrar"
            $('.check-cadastrar').prop('checked', $(this).is(':checked'));
        });
        // Quando o checkbox "editar-todos" for marcado/desmarcado
        $('#editar-todos').on('change', function() {
            // Define o estado de todos os checkboxes da classe "check-editar"
            $('.check-editar').prop('checked', $(this).is(':checked'));
        });
        // Quando o checkbox "excluir-todos" for marcado/desmarcado
        $('#excluir-todos').on('change', function() {
            // Define o estado de todos os checkboxes da classe "check-excluir"
            $('.check-excluir').prop('checked', $(this).is(':checked'));
        });
    });
    // Quando o checkbox "todos-clientes" for alterado
    $('input[name="todos-clientes"]').on('change', function() {
        // Marca ou desmarca todos os checkboxes com a classe "marcar"
        $('input[name="clientes[]"]').prop('checked', $(this).is(':checked'));
    });
    // Quando o checkbox "todos-fornecedores" for alterado
    $('input[name="todos-fornecedores"]').on('change', function() {
        // Marca ou desmarca todos os checkboxes com a classe "marcar"
        $('input[name="fornecedores[]"]').prop('checked', $(this).is(':checked'));
    });
</script>
</html>