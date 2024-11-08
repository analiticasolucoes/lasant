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
                    <h3 class="box-title"><i class="fa fa-users"></i> Usuários do Sistema</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
                                                    href="/usuarios/detalhe?id=<?= $usuario->getId() ?>"
                                                    title="Editar"
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
    <?php include __DIR__ . '/../../../templates/footer.php'; ?>
</div>
<!-- Modal's -->
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