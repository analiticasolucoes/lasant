<?php /*
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança  
protegePagina(); // Chama a função que protege a página 
*/ ?>
<?php /*
include "conexao.php";
$clientes = explode(' , ',$_SESSION['operadorIDCliente']);
*/ ?>
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
            <form action="lote.php" method="get" enctype="multipart/form-data" target="_self">
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
                            <!-- <div class="col-md-6">
                              <div class="form-group">
                                <label>Pavimento</label>
                        <select class="form-control" id="id_clientePavimento" name="id_clientePavimento">
                        </select>
                              </div>
                            </div>
                 -->

                            <!--  <div class="col-md-6">
                                <div class="form-group">
                                  <label>Setor</label>
                          <select class="form-control" id="id_clienteSetor" name="id_clienteSetor">
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
                                        <?php /*
$consulta = mysql_query("SELECT * FROM ta_situacao_ss WHERE id = 1 ORDER BY ds_situacao ASC");
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
                        <a data-toggle="modal" data-target="#modal_aut_ss" class="btn btn-success pull-right"><span class="fa fa-check"></span> Concluir Solicitações</a>
                        <!--<button data-target="#modal_aut_ss" class="btn btn-sm btn-success pull-right"><span class="fa fa-thumbs-o-up"></span> Aprovar Solicitações</button>-->
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-search"></span> Pesquisar</button>
                    </div>
                </div>
            </form>
            <?php /* if ($_GET['acao'] == "pesquisa") { */ ?>
            <?php /*
    $data_inicial = implode("-",array_reverse(explode("/",$_GET['data_inicial'])))." 00:00:00";
    $data_final = implode("-",array_reverse(explode("/",$_GET['data_final'])))." 23:59:59";				

    $data_inicial_aprovacao = implode("-",array_reverse(explode("/",$_POST['data_inicial_aprovacao'])))." 00:00:00";
    $data_final_aprovacao = implode("-",array_reverse(explode("/",$_POST['data_final_aprovacao'])))." 00:00:00";

    if($_GET['data_inicial'] != "" and $_GET['data_final'] != "") { $b1 = "AND ss.dt_ss BETWEEN '$data_inicial' AND '$data_final'"; } 
    if($_POST['data_inicial_aprovacao'] != "" and $_POST['data_final_aprovacao'] != "") { $b1 = "AND ss.dt_autorizacao_ss BETWEEN '$data_inicial_aprovacao' AND '$data_final_aprovacao'"; } 

    if($_GET['id_clienteLocal'] != "") { $b2 = "AND ss.id_clienteLocal='".$_GET['id_clienteLocal']."'"; } 
    if($_GET['id_clientePavimento'] != "") { $b3 = "AND ss.id_clientePavimento='".$_GET['id_clientePavimento']."'"; } 
    if($_GET['id_clienteSetor'] != "") { $b4 = "AND ss.id_clienteSetor='".$_GET['id_clienteSetor']."'"; } 
    if($_GET['id_situacaoSS'] != "") { $b5 = "AND ss.id_situacaoSS != 3"; } 
    if($_GET['id_cliente'] != "") { $b6 = "AND ss.id_cliente='".$_GET['id_cliente']."'"; } 
    if($_GET['tipo_ss'] != "") { $b7 = "AND ss.tipo_ss='".$_GET['tipo_ss']."'"; } 
    if($_POST['visitado'] != "") { $b8 = "AND ss.visitado='".$_POST['visitado']."'"; }
    
    $b9 = "AND (SELECT COUNT(os.id) FROM tb_ordem_servico os WHERE os.id_ss= ss.id AND os.id_situacao='6' ORDER BY id ASC) = (SELECT COUNT(os.id) FROM tb_ordem_servico os WHERE os.id_ss= ss.id  ORDER BY id ASC)";

 $variaveis = "?data_inicial=".$_GET['data_inicial']."&data_final=".$_GET['data_final']."&id_clienteLocal=".$_GET['id_clienteLocal']."&id_clientePavimento=".$_GET['id_clientePavimento']."&id_clienteSetor=".$_GET['id_clienteSetor']."&id_situacaoSS=".$_GET['id_situacaoSS']."&id_cliente=".$_GET['id_cliente']."&tipo_ss=".$_GET['tipo_ss'];


    $variaveis2 = "&data_inicial=".$_GET['data_inicial']."&data_final=".$_GET['data_final']."&id_clienteLocal=".$_GET['id_clienteLocal']."&id_clientePavimento=".$_GET['id_clientePavimento']."&id_clienteSetor=".$_GET['id_clienteSetor']."&id_situacaoSS=".$_GET['id_situacaoSS']."&id_cliente=".$_GET['id_cliente']."&tipo_ss=".$_GET['tipo_ss'];
 */ ?>
            <form action="concluir_ss_lote.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-warning"></i> Solicitações de Serviço</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="solicitacoes-servico-lote-table" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Nº SS</th>
                                <th>Data</th>
                                <th>Prioridade</th>
                                <th>Local</th>
                                <th>Pavimento</th>
                                <th>Setor</th>
                                <th>Tipo</th>
                                <th>Tipo SS</th>
                                <th>Situação</th>
                                <th></th>
                                <th>Concluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /*
                                $sql_consult2 = mysql_query("SELECT ss.* FROM tb_solicitacao_servico ss, tb_ordem_servico os WHERE os.id_ss= ss.id $b1 $b2 $b3 $b4 $b5 $b6 $b7 $b8 $b9 ORDER BY id DESC") or die (mysql_error());
                                $i=0;
                                
				while ($dados = mysql_fetch_array($sql_consult2)) {

                                    $id_ss = $dados['id'];

                                    if($dados['tipo'] == 0) { $tipo = "--"; }
                                    if($dados['tipo'] == 1) { $tipo = "Aprovação Prévia"; }
                                    if($dados['tipo'] == 2) { $tipo = "Aprovação Automática"; }

                                    if($dados['tipo_ss'] == 0) { $tipo_ss = "Predial"; }
                                    if($dados['tipo_ss'] == 1) { $tipo_ss = "Equipamento"; }

                                    $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                                    $row_loc = mysql_fetch_assoc($sql_loc);

                                    $sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
                                    $row_pav = mysql_fetch_assoc($sql_pav);

                                    $sql_set = mysql_query("SELECT * FROM ta_cliente_setor WHERE id='".$dados['id_clienteSetor']."'") or die (mysql_error());
                                    $row_set = mysql_fetch_assoc($sql_set);

                                    $dt_ss = date('d/m/Y H:i:s', strtotime($dados['dt_ss']));
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

                                    $sql_contrato = mysql_query("SELECT * FROM ta_contrato WHERE id_cliente='".$dados['id_cliente']."' ORDER BY id DESC LIMIT 1") or die (mysql_error());
                                    $row_contrato = mysql_fetch_assoc($sql_contrato);
                                    $bdi = $row_contrato['BDI'];

                                    $sql_equip = mysql_query("SELECT * FROM tb_equipamento WHERE id='".$dados['id_equipamento']."'") or die (mysql_error());
                                    $row_equip = mysql_fetch_assoc($sql_equip);

                                    $sql_item_equip = mysql_query("SELECT * FROM tb_itens_equipamentos WHERE id='".$dados['id_item_equipamento']."'") or die (mysql_error());
                                    $row_item_equip = mysql_fetch_assoc($sql_item_equip);                                    
                                */ ?>
                            <tr>
                                <td><?php /* echo $ss */ ?></td>
                                <td><?php /* echo $dt_ss */ ?></td>
                                <td><?php /* echo $prioridade_os */ ?></td>
                                <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                                <td><?php /* echo $row_pav['ds_clientePavimento'] */ ?></td>
                                <td><?php /* echo $row_set['ds_clienteSetor'] */ ?></td>
                                <td><?php /* echo $tipo */ ?></td>
                                <td><?php /* echo $tipo_ss */ ?></td>
                                <td><span class="badge" style="background:<?php /* echo $row_situSS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situSS['ds_situacao'] */ ?></span></td>
                                <td><a data-toggle="modal" data-target="#modal_ss_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-primary" title="Visualizar Solicitação"><i class="fa fa-search"></i></a></td>
                                <td>
                                    <?php /*
                                    //if($_SESSION['operadorTipo'] == 2 and $dados['id_situacaoSS'] == 2) {
                                    */ ?>
                                    <input type="checkbox" name="aprovadas[]" value="<?php //$dados['id']*/ ?>">
                                    <?php /*
                                    //}
                                    */ ?>
                                </td>
                            </tr>
                            <div class="modal" id="modal_ss_<?php /* echo $dados['id'] */ ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background:<?php /* echo $row_situSS['cor'] */ ?>; color:#fff;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Solicitação Nº <?php /* echo $ss */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Local</label>
                                                        <p><?php /* echo $row_loc['ds_clienteLocal'] */ ?></p>
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descrição dos Serviços</label>
                                                        <p><?php /* echo $dados['ds_servico'] */ ?></p>
                                                    </div>
                                                </div>
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
                            <?php /*
		  }
  		  */ ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal" id="modal_aut_ss">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Concluir Solicitações Selecionadas</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="id_ss" value="<?php /* echo $dados['id'] */ ?>" />
                                    <div class="col-md-12" style="margin-bottom:15px;">
                                        <p>Tem certeza que deseja concluir as solicitações ?</p>
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
                </div>
            </form>
            <?php /*
       }		
       */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</body>
<script>
    $(document).ready(function() {
        $('#id_cliente').change(function() {
            var id_cliente = $(this).val();
            $('#id_clienteLocal').load('listar_locais.php?id_cliente='+id_cliente);
        });
        dataTableInit("solicitacoes-servico-lote-table");
        // $('#id_clienteLocal').change(function() {
        // var id_local = $(this).val();
        // $('#id_clientePavimento').load('listar_pavimentos.php?id_local='+id_local);
        // });

        // $('#id_clientePavimento').change(function() {
        // var id_pavimento = $(this).val();
        // $('#id_clienteSetor').load('listar_setores.php?id_pavimento='+id_pavimento);
        // });
    });
</script>
</html>