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
            <form action="solicitacoes-servico.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Solicitações de Serviço</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <select class="form-control" id="id_cliente" name="id_cliente" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
		foreach($clientes_listagem as $value) {
		$sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysql_error());
		$row_cliente = mysql_fetch_assoc($sql_cliente);
		*/ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>"><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
                                        <?php /*
		}
		*/ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Local</label>
                                    <select class="form-control" id="id_clienteLocal" name="id_clienteLocal">
                                    </select>
                                </div>
                            </div>
                            <!--  <div class="col-md-6">
                               <div class="form-group">
                                 <label>Pavimento</label>
                         <select class="form-control" id="id_clientePavimento" name="id_clientePavimento">
                         <option value="" selected>Selecione</option>
                         </select>
                               </div>
                             </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                 <label>Setor</label>
                         <select class="form-control" id="id_clienteSetor" name="id_clienteSetor">
                         <option value="" selected>Selecione</option>
                         </select>
                               </div>
                             </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Inicial (Data da Solicitação)</label>
                                    <input type="text" class="form-control data" placeholder="Data Inicial (Cadastro)" name="data_inicial" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Final (Data da Solicitação)</label>
                                    <input type="text" class="form-control data" placeholder="Data Final (Data da Solicitação)" name="data_final" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Inicial (Data da Aprovação)</label>
                                    <input type="text" class="form-control data" placeholder="Data Inicial (Aprovação)" name="data_inicial_aprovacao" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Final (Data da Aprovação)</label>
                                    <input type="text" class="form-control data" placeholder="Data Final (Aprovação)" name="data_final_aprovacao" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situação</label>
                                    <select name="id_situacaoSS" class="form-control" id="id_situacaoSS">
                                        <option selected="selected" value="">Selecione</option>
                                        <?php /*
$consulta = mysql_query("SELECT * FROM ta_situacao_ss ORDER BY ds_situacao ASC");
while( $row = mysql_fetch_assoc($consulta) )
{
echo "<option value=\"{$row['id']}\">{$row['ds_situacao']}</option>\n";
}
*/ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de SS</label>
                                    <select name="tipo_ss" class="form-control" id="tipo_ss">
                                        <option selected="selected" value="">Selecione</option>
                                        <option value="0">Predial</option>
                                        <option value="1">Equipamento</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Visitado</label>
                                    <select name="visitado" class="form-control" id="visitado">
                                        <option selected="selected" value="">Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                    </select>
                                </div>
                            </div>
                            <input name="acao" type="hidden" id="acao" value="pesquisa" />
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-search"></span> Pesquisar</button>
                    </div>
                </div>
            </form>
            <?php /* if ($_POST['acao'] == "pesquisa") { */ ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-warning"></i> Solicitações de Serviço</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="solicitacoes-servico-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nº SS</th>
                            <th>Prioridade</th>
                            <th>Data Solicitação</th>
                            <th>Data Aprovação</th>
                            <th>Local</th>
                            <!-- <th>Pavimento</th> -->
                            <!-- <th>Setor</th> -->
                            <th>Tipo</th>
                            <th>Tipo SS</th>
                            <th>Situação</th>
                            <th>Imagens</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Visitado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
				$data_inicial = implode("-",array_reverse(explode("/",$_POST['data_inicial'])))." 00:00:00";
				$data_final = implode("-",array_reverse(explode("/",$_POST['data_final'])))." 23:59:59";

                                        $data_inicial_aprovacao = implode("-",array_reverse(explode("/",$_POST['data_inicial_aprovacao'])))." 00:00:00";
                                        $data_final_aprovacao = implode("-",array_reverse(explode("/",$_POST['data_final_aprovacao'])))." 00:00:00";

                                if($_POST['data_inicial'] != "" and $_POST['data_final'] != "") { $b1 = "AND dt_ss BETWEEN '$data_inicial' AND '$data_final'"; } 
                                if($_POST['data_inicial_aprovacao'] != "" and $_POST['data_final_aprovacao'] != "") { $b1 = "AND dt_autorizacao_ss BETWEEN '$data_inicial_aprovacao' AND '$data_final_aprovacao'"; } 

                                if($_POST['id_clienteLocal'] != "") { $b2 = "AND id_clienteLocal='".$_POST['id_clienteLocal']."'"; } 
                                // if($_POST['id_clientePavimento'] != "") { $b3 = "AND id_clientePavimento='".$_POST['id_clientePavimento']."'"; } 
                                // if($_POST['id_clienteSetor'] != "") { $b4 = "AND id_clienteSetor='".$_POST['id_clienteSetor']."'"; } 
                                if($_POST['id_situacaoSS'] != "") { $b5 = "AND id_situacaoSS='".$_POST['id_situacaoSS']."'"; } 
                                if($_POST['id_cliente'] != "") { $b6 = "AND id_cliente='".$_POST['id_cliente']."'"; } 
                                if($_POST['tipo_ss'] != "") { $b7 = "AND tipo_ss='".$_POST['tipo_ss']."'"; } 
                                if($_POST['visitado'] != "") { $b7 = "AND visitado='".$_POST['visitado']."'"; } 

				$sql_consult2 = mysql_query("SELECT * FROM tb_solicitacao_servico WHERE id!='' $b1 $b2 $b3 $b4 $b5 $b6 $b7 ORDER BY id DESC") or die (mysql_error());
                                
				while ($dados = mysql_fetch_array($sql_consult2)) {

                                    if($dados['tipo'] == 0) { $tipo = "--"; }
                                    if($dados['tipo'] == 1) { $tipo = "Aprovação Prévia"; }
                                    if($dados['tipo'] == 2) { $tipo = "Aprovação Automática"; }

                                    if($dados['tipo_ss'] == 0) { $tipo_ss = "Predial"; }
                                    if($dados['tipo_ss'] == 1) { $tipo_ss = "Equipamento"; }				

                                    $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                                    $row_cliente = mysql_fetch_assoc($sql_cliente);

                                    $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                                    $row_loc = mysql_fetch_assoc($sql_loc);

                                    $sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
                                    $row_pav = mysql_fetch_assoc($sql_pav);

                                    $sql_set = mysql_query("SELECT * FROM ta_cliente_setor WHERE id='".$dados['id_clienteSetor']."'") or die (mysql_error());
                                    $row_set = mysql_fetch_assoc($sql_set);

                                    $dt_ss = date('d/m/Y H:i:s', strtotime($dados['dt_ss']));
                                    $dt_autorizacao_ss = date('d/m/Y H:i:s', strtotime($dados['dt_autorizacao_ss']));
                                    $ano_ss = date('Y', strtotime($dados['dt_ss']));

                                    $ss = $dados['ss']."-".$ano_ss;

                                    $sql_situSS = mysql_query("SELECT * FROM ta_situacao_ss WHERE id='".$dados['id_situacaoSS']."'") or die (mysql_error());
                                    $row_situSS = mysql_fetch_assoc($sql_situSS);

                                    $sql_operador = mysql_query("SELECT * FROM ta_cliente_operador WHERE id='".$dados['id_operador']."'") or die (mysql_error());
                                    $row_operador = mysql_fetch_assoc($sql_operador);

                                    $sql_auto = mysql_query("SELECT * FROM ta_cliente_operador WHERE id='".$dados['usuario_autorizador_ss']."'") or die (mysql_error());
                                    $row_auto = mysql_fetch_assoc($sql_auto);
                                    $dt_autorizacao_ss = date('d/m/Y H:i:s', strtotime($dados['dt_autorizacao_ss']));

                                    $sql_canc = mysql_query("SELECT * FROM ta_cliente_operador WHERE id='".$dados['usuario_cancelamento']."'") or die (mysql_error());
                                    $row_canc = mysql_fetch_assoc($sql_canc);
                                    $dt_cancelamento_ss = date('d/m/Y H:i:s', strtotime($dados['dt_cancelamento_ss']));

                                    $sql_prioridade_os = mysql_query("SELECT * FROM ta_prioridade_os WHERE id='".$dados['prioridade']."'") or die (mysql_error());
                                    $row_prioridade_os = mysql_fetch_assoc($sql_prioridade_os);
                                    $prioridade_os = $row_prioridade_os['ds_prioridade_os'];

                                    $sql_equip = mysql_query("SELECT * FROM tb_equipamento WHERE id='".$dados['id_equipamento']."'") or die (mysql_error());
                                    $row_equip = mysql_fetch_assoc($sql_equip);

                                    $sql_item_equip = mysql_query("SELECT * FROM tb_itens_equipamentos WHERE id='".$dados['id_item_equipamento']."'") or die (mysql_error());
                                    $row_item_equip = mysql_fetch_assoc($sql_item_equip);		

                                    $sql_contrato = mysql_query("SELECT * FROM ta_contrato WHERE id_cliente='".$dados['id_cliente']."' ORDER BY id DESC LIMIT 1") or die (mysql_error());
                                    $row_contrato = mysql_fetch_assoc($sql_contrato);
                                    $bdi = $row_contrato['BDI'];

                                    $sql_os_val = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_ss='".$dados['id']."' AND id_situacao='6' ORDER BY id ASC") or die (mysql_error());
                                    $tot_os_val = mysql_num_rows($sql_os_val);

                                    $sql_os_tot = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_ss='".$dados['id']."' ORDER BY id ASC") or die (mysql_error());
                                    $tot_os_tot = mysql_num_rows($sql_os_tot);
									
									$sql_reprovOrc = mysql_query("SELECT * FROM ta_cliente_operador WHERE id='".$dados['usuario_reprovador']."'") or die (mysql_error());
                                    $row_reprovOrc = mysql_fetch_assoc($sql_reprovOrc);
				*/ ?>
                        <tr>
                            <td><?php /* echo $ss */ ?></td>
                            <td><?php /* echo $prioridade_os */ ?></td>
                            <td><?php /* echo $dt_ss */ ?></td>
                            <td><?php /* echo $dt_autorizacao_ss */ ?></td>
                            <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                            <!-- <td><?php /* echo $row_pav['ds_clientePavimento'] */ ?></td> -->
                            <!-- <td><?php /* echo $row_set['ds_clienteSetor'] */ ?></td> -->
                            <td><?php /* echo $tipo */ ?></td>
                            <td><?php /* echo $tipo_ss */ ?></td>
                            <td><span class="badge" style="background:<?php /* echo $row_situSS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situSS['ds_situacao'] */ ?></span></td>
                            <td>
                                <?php /*
                                if($dados['foto1'] != ""){echo "<a class='btn btn-info btn-circle btn-sm' href='../cliente/fotos/".$dados['foto1']."'target='_blank' title='Foto 1'><span class='fa fa-cloud-download' aria-hidden='true'></span></a>"; }
                                if($dados['foto2'] != ""){echo "<a class='btn btn-info btn-circle btn-sm' href='../cliente/fotos/".$dados['foto2']."'target='_blank' title='Foto 2'><span class='fa fa-cloud-download' aria-hidden='true'></span></a>"; }
                                if($dados['foto3'] != ""){echo "<a class='btn btn-info btn-circle btn-sm' href='../cliente/fotos/".$dados['foto3']."'target='_blank' title='Foto 3'><span class='fa fa-cloud-download' aria-hidden='true'></span></a>"; }                            
                        */ ?>
                            </td>
                            <td><a data-toggle="modal" data-target="#modal_ss_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-primary" title="Visualizar Solicitação" target="_blank"><i class="fa fa-search"></i></a></td>
                            <td><a data-toggle="modal" data-target="#modal_os_ss_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm bg-navy" title="Verificar OS Vinculadas"><i class="fa fa-newspaper-o"></i></a></td>
                            <td>
                                <?php /*
		    if($dados['id_situacaoSS'] == 2 and $row_privi['os_cadastro'] == 1) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_aut_ss_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Criar OS"><i class="fa fa-plus"></i> Criar OS</a>
                                <?php /*
		    }
		    */ ?>
                                <?php /*
		    if($dados['id_situacaoSS'] == 6 and $dados['tipo'] == 1 and $row_privi['ss_orcar'] == 1 and $dados['tipo_ss'] == 0) {
		    */ ?>
                                <a href="ficha_ss.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Orçar Serviço" target="_blank"><i class="fa fa-file-text-o"></i> Orçar Serviço</a>
                                <?php /*
		    }
		    */ ?>
                                <?php /*
		    if($dados['id_situacaoSS'] == 8 and $dados['tipo'] == 1 and $row_privi['ss_orcar'] == 1 and $dados['tipo_ss'] == 0) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_reorca_ss_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Orçar Serviço" target="_blank"><i class="fa fa-file-text-o"></i> Reorçar Serviço</a>
                                <?php /*
		    }
		    */ ?>
                                <?php /*
			if($dados['tipo'] == 1) {
				//if($dados['id_situacaoSS'] == 4 or $dados['id_situacaoSS'] == 3 or $dados['id_situacaoSS'] == 2) {
				*/ ?>

                                <a data-toggle="modal" data-target="#modal_orcamento_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Visualizar Orçamento"><i class="fa fa-search"></i></a>
                                <?php /*
				//} 
			}
		    */ ?>
                            </td>
                            <td>
                                <?php /*
                            if($tot_os_tot != 0 and $tot_os_val == $tot_os_tot and $dados['id_situacaoSS'] != 3) {
                        */ ?>
                                <a data-toggle="modal" data-target="#modal_concluir_ss_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm bg-blue" title="Concluir Solicitação"><i class="fa fa-check"></i> Concluir SS</a>
                                <?php /*
                            }
			*/ ?>
                            </td>
                            <td>
                                <?php /*
                            if($dados['ressalva_aprovacao'] == '')
                            {
                                echo '<span class="badge" style="background:#2a8819"  title="OS Aprovada Sem Resalva"><i class="fa fa-check-circle-o"></i></span>';
                            }
                            else{
                                echo '<span class="badge" style="background:#f7a614"  title="Resalva da OS: '.$dados['ressalva_aprovacao'].'"><i class="fa fa-dot-circle-o"></i></span>';
                            }  
                            
                            if($dados['id_situacaoSS'] == '4')
                            {
                                echo '<span class="badge" style="background:#F90E1D"  title="Motivo Cancelamento: '.$dados['motivo_cancelamento'].'"><i class="fa fa-trash-o"></i></span>';
                            }
                        */ ?>
                            </td>
                            <td>
                                <input type="checkbox" <?php /*$dados['visitado'] == 1 ? 'checked' : ''*/ ?> value="<?php /*$dados['id']*/ ?>" class="btn_visitado">
                            </td>
                            <script type="text/javascript">
                                $('.btn_visitado').change(function(){
                                    // alert(1)
                                    var visitado = $(this);
                                    if(visitado.is(':checked')) {
                                        var value = 1;
                                    } else {
                                        var value = 2;
                                    }
                                    $.ajax({
                                        url: 'update_visitado.php',
                                        method: 'post',
                                        data: {id: visitado.val(), visitado: value},
                                        dataType: 'json',
                                        success: function(res) {
                                            console.log(res)
                                        }
                                    });
                                    console.log(value);
                                });
                            </script>
                        </tr>
                        <div class="modal" id="modal_reorca_ss_<?php /* echo $dados['id'] */ ?>">
                            <form action="ficha_ss.php?id=<?php /* echo $dados['id'] */ ?>" method="get" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Orçamento Negado em Solicitação de Serviço Nº <?php /* echo $ss */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p><?php /* echo $dados['descricao_negacao_orcamento'] */ ?></p>
                                                    <p>Reorçar Solicitação de Serviço Nº <b><?php /* echo $dados['id'] */ ?></b> ?</p>
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
                        <div class="modal" id="modal_aut_ss_<?php /* echo $dados['id'] */ ?>">
                            <form action="cadastro_os.php" method="post" enctype="multipart/form-data" target="_blank">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Criar Ordem de Serviço de SS Nº <?php /* echo $ss */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_ss" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja criar uma Ordem de Serviço da Solicitação Nº <b><?php /* echo $dados['id'] */ ?></b> ?</p>
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
                        <div class="modal" id="modal_concluir_ss_<?php /* echo $dados['id'] */ ?>">
                            <form action="aprovar_ss.php" method="post" enctype="multipart/form-data" target="_blank">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Conclusão de SS Nº <?php /* echo $ss */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_ss" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja concluir a Solicitação de Serviço Nº <b><?php /* echo $ss */ ?></b> ?</p>
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
                        <?php /*
	if($dados['tipo'] == 1) { 
	*/ ?>
                        <div class="modal" id="modal_orcamento_<?php /* echo $dados['id'] */ ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-green">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <a href="impressao_orcamento_ss.php?id=<?php /* echo $dados['id'] */ ?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i></a>
                                        <h4 class="modal-title">Orçamento da Solicitação Nº <?php /* echo $ss */ ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12" style="padding-bottom:10px; padding-top:10px; border-bottom:1px solid #ccc;">
                                                <div class="col-md-2"><p><b>Cód.</b></p></div>
                                                <div class="col-md-4"><p><b>Material / Serviço</b></p></div>
                                                <div class="col-md-1"><p><b>Und</b></p></div>
                                                <div class="col-md-2"><p><b>Vl Unit</b></p></div>
                                                <div class="col-md-1"><p><b>Qtd</b></p></div>
                                                <div class="col-md-2"><p><b>Vl Total</b></p></div>
                                            </div>
                                            <?php /*
  $sql_mat = mysql_query("SELECT * FROM tb_solicitacao_servico_material WHERE id_ss='".$dados['id']."' ORDER BY id ASC") or die (mysql_error());
  while ($row_mat = mysql_fetch_array($sql_mat)) {
  
  $sql_sco = mysql_query("SELECT * FROM sco WHERE cod_sco='".$row_mat['IDPRD']."' ORDER BY id DESC LIMIT 1") or die (mysql_error());
  $row_sco = mysql_fetch_assoc($sql_sco);
  
  	if($row_mat['tipo'] == 0) {
		$tipo_mater = "Código SCO";
	}
	if($row_mat['tipo'] == 0) {
		$tipo_mater = "Planilha";
	}
  */ ?>
                                            <div class="col-md-12" style="padding-bottom:10px; padding-top:10px; border-bottom:1px solid #ccc;">
                                                <?php /* if($row_mat['tipo'] == 0) { */ ?>
                                                <div class="col-md-2"><p><?php /* echo $row_mat['IDPRD'] */ ?></p></div>
                                                <div class="col-md-4"><p><?php /* echo $row_sco['descricao_sco'] */ ?></p></div>
                                                <div class="col-md-1"><p><?php /* echo $row_sco['unidade'] */ ?></p></div>
                                                <div class="col-md-2"><p>R$ <?php /* echo number_format($row_mat['vl_unitario'], 2, ',','.'); */ ?></p></div>
                                                <div class="col-md-1"><p><?php /* echo $row_mat['qtde'] */ ?></p></div>
                                                <div class="col-md-2"><p>R$ <?php /* echo number_format($row_mat['vl_total'], 2, ',','.'); */ ?></p></div>
                                                <?php /* } */ ?>
                                                <?php /* if($row_mat['tipo'] == 1) { */ ?>
                                                <?php /* if($row_mat['arquivo'] != "") { */ ?>
                                                <div class="col-md-8"><p>Planilha Enviada</p></div>
                                                <div class="col-md-4"><p><a href="<?php /* echo $row_mat['arquivo'] */ ?>" target="_blank"><button class="btn btn-primary">Baixar</button></a></p></div>
                                                <?php /* } */ ?>
                                                <?php /* } */ ?>
                                            </div>
                                            <?php /*
  }
  
  
   $sql_toter = mysql_query("SELECT SUM(vl_total) as total FROM tb_solicitacao_servico_material WHERE id_ss='".$dados['id']."'") or die (mysql_error());
   $row_toter = mysql_fetch_assoc($sql_toter);
   
    $total_materiais = $row_toter['total'];
  $pct = $bdi / 100.00;
  $valor_bdi = $pct * $total_materiais;
  $total_geral = ($total_materiais + $valor_bdi);
  */ ?>
                                            <div class="col-md-12" style="padding-bottom:10px; padding-top:10px; border-bottom:1px solid #ccc;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3"><p><b>Valor Total</b></p></div>
                                                <div class="col-md-3"><p><b>BDI</b></p></div>
                                                <div class="col-md-3"><p><b>Total + BDI</b></p></div>
                                            </div>
                                            <div class="col-md-12" style="padding-bottom:10px; padding-top:10px; border-bottom:1px solid #ccc;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3"><p>R$ <?php /* echo number_format($total_materiais, 2, ',','.'); */ ?></p></div>
                                                <div class="col-md-3"><p>R$ <?php /* echo number_format($valor_bdi, 2, ',','.'); */ ?> (<?php /* echo $bdi */ ?>%)</p></div>
                                                <div class="col-md-3"><p>R$ <?php /* echo number_format($total_geral, 2, ',','.'); */ ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                            </form>
                        </div>
                        <?php /* } */ ?>
                        <div class="modal" id="modal_ss_<?php /* echo $dados['id'] */ ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background:<?php /* echo $row_situSS['cor'] */ ?>; color:#fff;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <a href="impressao_ss.php?id=<?php /* echo $dados['id'] */ ?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i></a>
                                        <h4 class="modal-title">Solicitação Nº <?php /* echo $ss */ ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Cliente</label>
                                                    <p><?php /* echo $row_cliente['nome_fantasia'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Data da Solicitação</label>
                                                    <p><?php /* echo $dt_ss */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Situação</label>
                                                    <p><span class="badge" style="background:<?php /* echo $row_situSS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situSS['ds_situacao'] */ ?></span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Operador</label>
                                                    <p><?php /* echo $row_operador['nm_operador'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Local</label>
                                                    <p><?php /* echo $row_loc['ds_clienteLocal'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descrição dos Serviços</label>
                                                    <p><?php /* echo $dados['ds_servico'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pavimento</label>
                                                    <p><?php /* echo $row_pav['ds_clientePavimento'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ressalva</label>
                                                    <p><?php /* echo $dados['ressalva_aprovacao'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Setor</label>
                                                    <p><?php /* echo $row_set['ds_clienteSetor'] */ ?></p>
                                                </div>
                                            </div>
                                            <?php /* if($dados['tipo_ss'] == 1) { */ ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Equipamento</label>
                                                    <p><?php /* echo $row_equip['nm_equipamento'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ítem do Equipamento</label>
                                                    <p><?php /* echo $row_item_equip['nm_item_equipamento'] */ ?></p>
                                                </div>
                                            </div>
                                            <?php /* } */ ?>
                                            <!--           <div class="col-md-12">
                                                          <div class="form-group">
                                                            <label>Descrição dos Serviços</label>
                                                                 <p>< ?php echo $dados['ds_servico'] */ ?></p>
                                                          </div>
                                                        </div>-->
                                            <?php /*
		if($dados['id_situacaoSS'] == 2) {
	   */ ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Autorizador</label>
                                                    <p><?php /* echo $row_auto['nm_operador'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Data da Autorização</label>
                                                    <p><?php /* echo $dt_autorizacao_ss */ ?></p>
                                                </div>
                                            </div>
                                            <?php /*
	   }		
	   */ ?>
                                            <?php /*
		if($dados['id_situacaoSS'] == 4) {
	   */ ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Operador que cancelou</label>
                                                    <p><?php /* echo $row_canc['nm_operador'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Data do Cancelamento</label>
                                                    <p><?php /* echo $dt_cancelamento_ss */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Motivo Cancelamento</label>
                                                    <p><?php /* echo $dados['motivo_cancelamento'] */ ?></p>
                                                </div>
                                            </div>
                                            <?php /*
	   }		
	   */ ?>
                                            <?php /*
		if($dados['id_situacaoSS'] == 8) {
	   */ ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Reprovador</label>
                                                    <p><?php /* echo $row_reprovOrc['nm_operador'] */ ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Motivo Reprovacao Orcamento</label>
                                                    <p><?php /* echo $dados['descricao_negacao_orcamento'] */ ?></p>
                                                </div>
                                            </div>
                                            <?php /*
	   }		
	   */ ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="modal" id="modal_os_ss_<?php /* echo $dados['id'] */ ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-navy">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">OS vinculadas a Solicitação Nº <?php /* echo $ss */ ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="col-md-2"><p><b>Nº OS</b></p></div>
                                                    <div class="col-md-4"><p><b>Data</b></p></div>
                                                    <div class="col-md-4"><p><b>Situação</b></p></div>
                                                    <div class="col-md-2"><p><b>Visualizar</b></p></div>
                                                </div>
                                                <?php /*
	    $sql_os = mysql_query("SELECT * FROM tb_ordem_servico WHERE id_ss='".$dados['id']."' ORDER BY id ASC") or die (mysql_error());
	   while ($row_os = mysql_fetch_array($sql_os)) {

		$dt_os = date('d/m/Y H:i:s', strtotime($row_os['dt_os']));

		$sql_situOS = mysql_query("SELECT * FROM ta_situacao_os WHERE id='".$row_os['id_situacao']."'") or die (mysql_error());
		$row_situOS = mysql_fetch_assoc($sql_situOS);
*/ ?>
                                                <div class="col-md-12" style="padding-bottom:5px; padding-top:15px; border-bottom:1px solid #ccc;">
                                                    <div class="col-md-2"><p><?php /* echo $row_os['id'] */ ?></p></div>
                                                    <div class="col-md-4"><p><?php /* echo $dt_os */ ?></p></div>
                                                    <div class="col-md-4"><p><span class="badge" style="background:<?php /* echo $row_situOS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situOS['ds_situacaoSS'] */ ?></span></p></div>
                                                    <div class="col-md-2"><p><a class="btn btn-sm bg-navy" href="ficha_os.php?id=<?php /* echo $row_os['id'] */ ?>" target="_blank"><i class="fa fa-search"></i></a></p></div>
                                                </div>
                                                <?php /*
}
*/ ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <?php /*
		  }
  		  */ ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <?php /*
		    }
		    */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
<!-- ./wrapper -->
</body>
<script>
    $(document).ready(function() {
        $('#id_cliente').change(function() {
            var id_cliente = $(this).val();
            $('#id_clienteLocal').load('listar_locais.php?id_cliente='+id_cliente);
        });
        $('#id_clienteLocal').change(function() {
            var id_local = $(this).val();
            $('#id_clientePavimento').load('listar_pavimentos.php?id_local='+id_local);
        });
        $('#id_clientePavimento').change(function() {
            var id_pavimento = $(this).val();
            $('#id_clienteSetor').load('listar_setores.php?id_pavimento='+id_pavimento);
        });
        dataTableInit("ferramentas-table");
    });
</script>
</html>