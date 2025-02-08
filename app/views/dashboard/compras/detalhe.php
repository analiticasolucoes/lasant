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
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-basket-shopping mr-2"></i>Ficha de <?php if($compra->getTipo() === 0) echo "Solicitação Compra"; else echo "Levantamento"; ?> (Nº <?= $compra->getId() ?>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cliente</label>
                                <p><?= strtoupper($compra->getCliente()->getNomeEmpresa()) ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Local</label>
                                <p><?= $compra->getLocal()->getDescricao() ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Data</label>
                                <p><?= $compra->getDtSolicitacao()->format("d/m/Y h:m") ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Operador</label>
                                <p><?= strtoupper($nomeOperador) ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Situação</label>
                                <p>
                                    <span class="badge situacao-compra-text situacao-<?= str_replace(' ', '-', strtolower($compra->getSituacao()->getSituacao())) ?>">
                                        <?= $compra->getSituacao()->getSituacao() ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <?php if (!$compra->getTipo()): ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grupo</label>
                                <p><?= $compra->getGrupoMaterial()->getDescricao() ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prioridade</label>
                                <p><?= $compra->getPrioridade()->getPrioridade() ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observações</label>
                                <p><?= $compra->getObservacoes() ?></p>
                            </div>
                        </div>
                        <?php if ($compra->getSituacao()->getSituacao() == 5): ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observações de Reprovação</label>
                                <p><?= $compra->getObservacoesReprovacao() ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Workflow</label>
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Situação</th>
                                            <th>Operador</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($workflow as $row): ?>
                                        <tr>
                                            <td><?= $row['data'] ?></td>
                                            <td><?= $row['situacao'] ?></td>
                                            <td><?= strtoupper($row['operador']) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-2">
                            <button
                                type="button"
                                title="Cancelar Cotação"
                                onclick="confirm('Você tem certeza que deseja cancelar esta cotação?')"
                                class="btn btn-danger"
                                <?php
                                    if ($compra->getSituacao()->getId() != 1 &&
                                        $compra->getSituacao()->getId() != 2 &&
                                        $compra->getSituacao()->getId() != 3)
                                    echo 'disabled';
                                ?>
                            >
                                <i class="fa fa-circle-xmark mr-2"></i>
                                Cancelar Cotação
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SITUACAO DA COTACAO IGUAL A 1 - SOLICITADO -->
            <!-- Permite incluir fornecedores à solicitação -->
            <?php //if ($compra->getSituacao()->getSituacao() == 1): ?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-truck mr-2"></i>Fornecedores</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form action="add_fornecedores_solicitacao.php" method="post" enctype="multipart/form-data" target="_self">
                        <div class="row">
                            <input type="hidden" name="id" value="<?php $compra->getId() ?>" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fornecedores">Inserir Fornecedor</label>
                                    <select class="form-control" id="fornecedores" name="fornecedores" required>
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($fornecedores as $fornecedor): ?>
                                        <option value="<?= $fornecedor->getId() ?>"><?= $fornecedor->getNomeEmpresa() . " | CNPJ: " . $fornecedor->getCNPJ() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary pull-right">Adicionar</button>
                            </div>
                        </div>
                        <div class="row box-body">
                            <div class="table-responsive" style="max-height: 30vh; overflow-y: auto;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">Fornecedor</th>
                                            <th>Forma de Pagamento</th>
                                            <th>Prazo de Entrega</th>
                                            <th><i class="fa fa-print mr-2"></i>Impressões</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a title="Excluir" data-toggle="modal" data-target="#modal_delete_<?php /* echo $dados['id'] */ ?>">
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash mr-2"></i>Excluir
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                Nome do Fornecedor
                                                <br>
                                                CNPJ: 00.000.000/0001-00
                                            </td>
                                            <td>
                                                <select id="fornecedor-forma-pagamento" name="fornecedor-forma-pagamento" class="form-control fornecedor-forma-pagamento" data-id-fornecedor="<?php /* echo $row_for['id_fornecedor'] */ ?>" disabled>
                                                    <option value="" selected>Selecione</option>
                                                    <option value="<?php /* echo $row_fr['id'] */ ?>" selected><?php /* echo $row_fr['forma_de_pagamento'] */ ?></option>
                                                </select>
                                            </td>
                                            <td>
                                                <input
                                                    type="text"
                                                    id="fornecedor-prazo-entrega"
                                                    name="fornecedor-prazo-entrega"
                                                    class="form-control fornecedor-prazo-entrega"
                                                    data-id-fornecedor="<?php /* echo $row_for['id_fornecedor'] */ ?>"
                                                    placeholder="Ex.: 30 dias"
                                                    value="<?php /* echo $row_for['prazo-entrega'] */ ?>"
                                                    required
                                                    disabled
                                                />
                                            </td>
                                            <td>
                                                <button type="button" onclick="window.open('compras/solicitacoes/pedido/impressao?id=<?= $compra->getId() ?>', '_blank');" class="btn btn-primary" disabled >
                                                    <i class="fa fa-file-invoice-dollar mr-2"></i>Ordem de Compra
                                                </button>
                                                <button type="button" onclick="window.open('compras/solicitacoes/pedido/impressao?id=<?= $compra->getId() ?>', '_blank');" class="btn btn-primary" >
                                                    <i class="fa fa-file-invoice mr-2"></i>Solicitação Orçamento
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-footer text-center">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-4 mb-2">
                            <button type="button" class="btn btn-success btn-block" onclick="javascript:alert('Fornecedor(es) salvo(s) com sucesso!')">
                                <i class="fa fa-floppy-disk mr-2"></i>Salvar Fornecedores
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning btn-block" onclick="javascript:alert('Lista de fornecedores fechada com sucesso!')">
                                <i class="fa fa-lock mr-2"></i>Fechar Fornecedores
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->

            <form action="atualizar_obs_entrega.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-truck-ramp-box mr-2"></i>Local de Entrega e Observações</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <input type="hidden" name="id-cotacao" value="<?= $compra->getId() ?>" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="local-entrega">Local de Entrega</label>
                                    <select class="form-control" id="local-entrega" name="local-entrega" required>
                                        <option value="" selected>Selecione</option>
                                        <?php foreach($locaisEntrega as $localEntrega): ?>
                                            <option value="<?= $localEntrega->getId() ?>"><?= $localEntrega->getDescricao() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observacoes-entrega">Observações de Entrega</label>
                                    <textarea name="observacoes-entrega" class="form-control" rows="4" id="observacoes-entrega" placeholder="Observações"><?php /* echo $row_consult['observacoes-entrega'] */ ?></textarea>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-refresh mr-2"></span>Atualizar</button>
                    </div>
                </div>
                <!-- /.box -->
            </form>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-cubes mr-2"></i>Materiais</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row" id="compra-materiais">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Cód.</th>
                                                <th>Material / Serviço</th>
                                                <th>Classe</th>
                                                <th>Marca</th>
                                                <th>Unid.</th>
                                                <th>Qtd.</th>
                                                <th>Foto</th>
                                                <th>Valor</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>13-04-001-001</td>
                                                <td>SERVIÇOS DE ELÉTRICA</td>
                                                <td>SERVIÇOS DE ELÉTRICA</td>
                                                <td>SVC</td>
                                                <td>SVC</td>
                                                <td>1.00</td>
                                                <td>
                                                    <a class='btn btn-info btn-circle btn-sm' href='#' data-toggle='modal' data-target='#fotoMaterialModal' onclick="carregarImagem('assets/dist/img/photo1.png')" title='Foto do Material'>
                                                        <span class='fa fa-image' aria-hidden='true'></span>
                                                    </a>
                                                </td>
                                                <td>100,00</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#modal-observacao-solicitante" title="Observações do Solicitante">
                                                        <button class="btn btn-sm btn-warning">
                                                            <span class="fa fa-file-text"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-bolt mr-2"></i>Ações para Cotação
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row text-center">
                            <div class="col-md-4 col-xs-12 mb-2">
                                <button type="button" id="cotacao-aprovar-button" class="btn btn-block btn-success" <?php if ($compra->getSituacao()->getSituacao() == 3) echo "disabled"; ?>>
                                    <i class="fa fa-circle-check mr-2"></i>Aprovar Cotação
                                </button>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <button type="button" id="cotacao-reprovar-button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_reprovacao" <?php if ($compra->getSituacao()->getSituacao() == 3) echo "disabled"; ?>>
                                    <i class="fa fa-ban mr-2"></i>Reprovar Cotação
                                </button>
                            </div>
                            <div class="col-md-4 col-xs-12 mb-2">
                                <button type="button" id="cotacao-finalizar-button" class="btn btn-block btn-primary" href="fechar_cotacao.php?id_cotacao=<?php /* echo $_GET['id'] */ ?>" <?php if ($compra->getSituacao()->getSituacao() != 2 or $compra->getSituacao()->getSituacao() != 5) echo "disabled"; ?>>
                                    <i class="fa fa-flag-checkered mr-2"></i>Finalizar Cotação
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-circle-check mr-2"></i>Materiais Aprovados</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row"  id="materiais_compra">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Cód.</th>
                                            <th>Material / Serviço</th>
                                            <th>Classe</th>
                                            <th>Marca</th>
                                            <th>Un.</th>
                                            <th>Valor.</th>
                                            <th>Qtd.</th>
                                            <th>Total.</th>
                                            <th>Fornecedor</th>
                                        </tr>
                                        <?php /*
                                        $sql_mat_val = mysqli_query($link, "SELECT * FROM tb_valores_cotacao_aprovado WHERE id_cotacao='" . $_GET['id'] . "' ORDER BY id ASC") or die(mysqli_error());
                                        while ($row_mat_val = mysqli_fetch_array($sql_mat_val)) {

                                            $sql_val_mat = mysqli_query($link, "SELECT * FROM tb_valores_cotacao WHERE id='" . $row_mat_val['id_valor_cotacao'] . "' AND id_cotacao='" . $_GET['id'] . "'");
                                            $row_val_mat = mysqli_fetch_assoc($sql_val_mat);

                                            $sql_materiais = mysqli_query($link, "SELECT * FROM tb_materiais_cotacao WHERE id_cotacao='" . $_GET['id'] . "' AND id='" . $row_val_mat['id_material_cotacao'] . "'  ORDER BY id ASC") or die(mysqli_error());
                                            $dados = mysqli_fetch_array($sql_materiais);

                                            $sql_consult2 = mysqli_query($link, "SELECT * FROM ta_material WHERE id='" . $dados['id_material'] . "'") or die(mysqli_error());
                                            $row_consult2 = mysqli_fetch_assoc($sql_consult2);

                                            $sql_unidade = mysqli_query($link, "SELECT * FROM ta_unidade WHERE id='" . $row_consult2['id_unidade'] . "'") or die(mysqli_error());
                                            $row_unidade = mysqli_fetch_array($sql_unidade);

                                            $sql_cliente = mysqli_query($link, "SELECT * FROM ta_cliente_fornecedor WHERE id='" . $row_val_mat['id_fornecedor'] . "'") or die(mysqli_error());
                                            $row_cliente = mysqli_fetch_assoc($sql_cliente);

                                            $sql_cl = mysqli_query($link, "SELECT * FROM ta_material_classe WHERE id='" . $row_consult2['id_materialClasse'] . "'") or die(mysqli_error());
                                            $row_cl = mysqli_fetch_assoc($sql_cl);
                                            $classe = $row_cl['classe'];

                                            $sql_ma = mysqli_query($link, "SELECT * FROM ta_material_marca WHERE id='" . $dados['id_marca'] . "'") or die(mysqli_error());
                                            $row_ma = mysqli_fetch_assoc($sql_ma);
                                            if ($row_ma['marca'] == '') {
                                                $marca = "Sem marca";
                                            } else {
                                                $marca = $row_ma['marca'];
                                            }

                                            $total = $dados['qtd'] * $row_val_mat['valor_unitario'];

                                            $total_compra += $total;
                                            */ ?>
                                            <tr>
                                                <td><?php /* echo $row_consult2['cd_material'] */ ?></td>
                                                <td><?php /* echo $row_consult2['ds_material'] */ ?></td>
                                                <td><?php /* echo $row_cl['classe'] */ ?></td>
                                                <td><?php /* echo $marca */ ?></td>
                                                <td><?php /* echo $row_unidade['ds_unidade'] */ ?></td>
                                                <td>R$ <?php /* echo number_format($row_val_mat['valor_unitario'], 2, ',', '.'); */ ?></td>
                                                <td><?php /* echo $dados['qtd'] */ ?></td>
                                                <td>R$ <?php /* echo number_format($total, 2, ',', '.'); */ ?></td>
                                                <td><?php /* echo $row_cliente['nome_empresa'] */ ?></td>
                                            </tr>
                                            <?php /*
                                        }
                                        */ ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total</b></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>R$ <?php /* echo number_format($total_compra, 2, ',', '.'); */ ?></b></td>
                                            <td></td>
                                        </tr>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            <form action="add_nota_cotacao.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus mr-2"></i>Inserir Notas de Compra</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id-fornecedor">Fornecedor</label>
                                    <select class="form-control" id="id-fornecedor" name="id-fornecedor" required>
                                        <option value="" selected>Selecione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="numero-nota-fiscal">Nº Nota Fiscal</label>
                                    <input type="text" id="numero-nota-fiscal" name="numero-nota-fiscal" class="form-control" placeholder="Nº Nota Fiscal" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="arquivo-nota-fiscal">Arquivo</label>
                                    <input type="file" name="arquivo-nota-fiscal" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus mr-2"></span>Adicionar</button>
                    </div>
                </div>
                <!-- /.box -->
            </form>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa-solid fa-receipt mr-2"></i>Notas de Compra
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Fornecedor</th>
                                <th>Arquivo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $sql_consult2 = mysqli_query($link, "SELECT * FROM tb_notas_cotacao WHERE id_cotacao='" . $_GET['id'] . "' ORDER BY id DESC") or die(mysqli_error());
                        while ($dados = mysqli_fetch_array($sql_consult2)) {
                            $sql_cliente = mysqli_query($link, "SELECT * FROM ta_cliente_fornecedor WHERE id='" . $dados['id_fornecedor'] . "'") or die(mysqli_error());
                            $row_cliente = mysqli_fetch_assoc($sql_cliente);
                            */ ?>
                            <tr>
                                <td><?php /* echo $dados['n_nota_fiscal'] */ ?></td>
                                <td><?php /* echo $row_cliente['nome_empresa'] */ ?></td>
                                <td>
                                    <?php /* if ($dados['arquivo'] != '') { */ ?>
                                        <a href="<?php /* echo $dados['arquivo'] */ ?>" target="_blank"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button></a>
                                    <?php /* } */ ?>
                                </td>
                                <td>
                                    <?php /* if ($compra->getSituacao()->getSituacao() == 4) { */ ?>
                                        <a data-toggle="modal" data-target="#modal_delete_nota_<?php /* echo $dados['id'] */ ?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash mr-2"></span>Excluir</button></a>
                                    <?php /* } */ ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-bolt mr-2"></i>Ações de Finalização
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row text-center">
                        <div class="col-md-4 col-xs-12 mb-2">
                            <a href="receber_material_cotacao.php?id_cotacao=<?php /* echo $_GET['id'] */ ?>" class="btn btn-primary btn-block">
                                <i class="fa fa-dolly mr-2"></i>Receber Material
                            </a>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-2">
                            <a href="finalizar_compra_cotacao.php?id_cotacao=<?php /* echo $_GET['id'] */ ?>" class="btn btn-success btn-block">
                                <i class="fa fa-flag-checkered mr-2"></i>Finalizar Compra
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
<!-- Modals -->
<!-- Delete Fornecedor Modal -->
<div class="modal fade" id="modal-excluir-fornecedor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Excluir Fornecedor</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>Tem certeza que deseja excluir o Fornecedor <b><?php /* echo $row_cliente['nome_empresa'] */ ?></b> ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                <a href="delete_fornecedor_solicitacao.php?id_fornecedor=<?php /* echo $row_cliente['id'] */ ?>&id_cotacao=<?php /* echo $_GET['id'] */ ?>" class="btn btn-primary">Sim</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal para exibir a foto do material -->
<div class="modal fade" id="fotoMaterialModal" tabindex="-1" role="dialog" aria-labelledby="fotoMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoMaterialModalLabel"><b>Foto do Material<b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <!-- Imagem será carregada aqui -->
                <img id="imagemMaterial" src="" alt="Foto do Material" class="img-fluid img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Visualizar Observacao do Solicitante -->
<div class="modal fade" id="modal-visualizar-observacao-solicitante">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Observação Solicitante (<?php /* echo $row_consult2['ds_material'] */ ?>)</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observações do Solicitante</label>
                            <p><?php /* echo $dados['obs_solicitante'] */ ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- Modal Inclusao Observacao Material -->
<div class="modal fade" id="modal-adicionar-observacao-material">
    <form action="add_obs_material_cotacao.php" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Observação Material (<?php /* echo $row_consult2['ds_material'] */ ?>)</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_cotacao" value="<?php /* echo $_GET['id'] */ ?>" />
                        <input type="hidden" name="id" value="<?php /* echo $dados['id'] */ ?>" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observacoes">Observações</label>
                                <textarea id="observacoes" class="form-control" rows="4" name="observacoes" placeholder="Observações">
                                    <?php /* echo $dados['observacoes'] */ ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <input type="submit" value="Salvar" class="btn btn-blue" />
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- Modal Observacao Reprovacao Cotacao -->
<div class="modal fade" id="modal-reprovacao">
    <form action="reprovar_cotacao.php" method="post" enctype="multipart/form-data" target="_self">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Observação Reprovação</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id-cotacao" value="<?php /* echo $_GET['id'] */ ?>" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observacoes-reprovacao">Observações</label>
                                <textarea id="observacoes-reprovacao" name="observacoes-reprovacao" class="form-control" rows="4" placeholder="Observações"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <input type="submit" value="Salvar" class="btn btn-danger" />
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- Modal Excluir Nota Fiscal -->
<div class="modal fade" id="modal-delete-nota-fiscal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Excluir Nota Fiscal</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>Tem certeza que deseja excluir a Nota Fiscal do Fornecedor <b><?php /* echo $row_cliente['nome_empresa'] */ ?></b> ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                <a href="delete_nota_cotacao.php?id=<?php /* echo $dados['id'] */ ?>&id_cotacao=<?php /* echo $_GET['id'] */ ?>" class="btn btn-primary">Sim</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
<script>
    $(document).ready(function() {
        $('#id_cliente').change(function() {
            var id_cliente = $(this).val();
            $('#id_clienteLocal').load('listar_locais.php?id_cliente=' + id_cliente);
            $('#id_contrato').load('listar_contratos.php?id_cliente=' + id_cliente);
        });

        $(document).on("blur", ".val-unit-mt-cot", function(evt) {
            var id_mt_vl_cot = $(this).attr('id_mt_vl_cot');
            var valor_unitario = $(this).val();

            $.ajax({
                url: 'alterar_valor_cotacao.php?id_mt_vl_cot=' + id_mt_vl_cot + '&valor_unitario=' + valor_unitario,
                /* URL que ser? chamada */
                type: 'POST',
                /* Tipo da requisi??o */
                data: 'id_mt_vl_cot=' + id_mt_vl_cot + '&valor_unitario=' + valor_unitario,
                dataType: 'json',
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.sucesso == 1) {
                        $.notify("Valor Alterado!", "success");
                    }
                }
            });
            return false;
        });

        $(document).on("change", ".fornecedor-forma-pagamento", function(evt) {
            var id_fornecedor = $(this).attr('id_fornecedor');
            var id_cotacao = '<?php /* echo $_GET['id'] */ ?>';
            var id_forma_pagamento = $(this).val();

            $.ajax({
                url: 'alterar_forma_pagamento_fornecedor.php?id_fornecedor=' + id_fornecedor + '&id_cotacao=' + id_cotacao + '&id_forma_pagamento=' + id_forma_pagamento,
                /* URL que ser? chamada */
                type: 'POST',
                /* Tipo da requisi??o */
                data: 'id_fornecedor=' + id_fornecedor + '&id_cotacao=' + id_cotacao + '&id_forma_pagamento=' + id_forma_pagamento,
                dataType: 'json',
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.sucesso == 1) {
                        $.notify("Forma de Pagamento Alterada!", "success");
                    }
                }
            });
            return false;
        });

        $(document).on("blur", ".qtd-mt-cot", function(evt) {
            var id_mt_cot = $(this).attr('id_mt_cot');
            var id_cotacao = '<?php /* echo $_GET['id'] */ ?>';
            var qtd = $(this).val();

            $.ajax({
                url: 'alterar_qtd_material_cotacao.php?id_mt_cot=' + id_mt_cot + '&id_cotacao=' + id_cotacao + '&qtd=' + qtd,
                /* URL que ser? chamada */
                type: 'POST',
                /* Tipo da requisi??o */
                data: 'id_mt_cot=' + id_mt_cot + '&id_cotacao=' + id_cotacao + '&qtd=' + qtd,
                dataType: 'json',
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.sucesso == 1) {
                        $.notify("Qtd Alterada!", "success");
                    }
                }
            });
            return false;
        });

        $(document).on("blur", ".fornecedor-prazo-entrega", function(evt) {
            var id_fornecedor = $(this).attr('id_fornecedor');
            var id_cotacao = '<?php /* echo $_GET['id'] */ ?>';
            var prazo_entrega = $(this).val();

            $.ajax({
                url: 'alterar_prazo-entrega_fornecedor.php?id_fornecedor=' + id_fornecedor + '&id_cotacao=' + id_cotacao + '&prazo-entrega=' + prazo-entrega,
                /* URL que ser? chamada */
                type: 'POST',
                /* Tipo da requisi??o */
                data: 'id_fornecedor=' + id_fornecedor + '&id_cotacao=' + id_cotacao + '&prazo-entrega=' + prazo-entrega,
                dataType: 'json',
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.sucesso == 1) {
                        $.notify("Prazo de Entrega Alterado!", "success");
                    }
                }
            });
            return false;
        });
    });
</script>
<script>
    function carregarImagem(url) {
        // Substitua 'imagemMaterial' pelo ID do elemento da imagem no modal
        document.getElementById('imagemMaterial').src = url;
    }
</script>
</html>