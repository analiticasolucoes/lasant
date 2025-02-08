<?php /*
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança  
protegePagina(); // Chama a função que protege a página 
//session_start();
*/ ?>
<?php /*
include "conexao.php";

if($_POST){
    if($_POST['data_inicial'] != "") 
    { 
        $_SESSION['dt_iniFiltro'] = $_POST['data_inicial'];
    }
    else{
        $_SESSION['dt_iniFiltro'] = '';
    }
    
    if($_POST['data_final'] != "") 
    { 
        $_SESSION['dt_fimFiltro'] = $_POST['data_final'];
    }else{
        $_SESSION['dt_fimFiltro'] = '';
    }
    
    if($_POST['id_cliente'] != "") 
    { 
        $_SESSION['cd_clienteFiltro'] = $_POST['id_cliente'];
    }else{
        $_SESSION['cd_clienteFiltro'] = '0';
    }
    
    if($_POST['nu_os'] != "") 
    { 
        $_SESSION['nu_osFiltro'] = $_POST['nu_os'];
    }else{
        $_SESSION['nu_osFiltro'] = '';
    }
}

//echo "<script>alert('Passou 1 ".$_SESSION['dt_iniFiltro']."')</script>";

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
            <form action="ordens-servico.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Ordens de Serviço</h3>
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
                if(!isset($_SESSION['cd_clienteFiltro'])) {$_SESSION['cd_clienteFiltro'] = '0';}
                if($row_cliente['id'] == $_SESSION['cd_clienteFiltro'] ){ $sel = " selected "; } else { $sel = ""; };
		*/ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>" <?php /* echo $sel; */ ?>><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
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
                                    <?php /*
                        $datai = new DateTime('-30 day');
                        $dataI = $datai->format('d-m-Y');
                    */ ?>
                                    <input type="text" class="form-control data" placeholder="Data Inicial (Cadastro)" name="data_inicial" value="<?php /* if(!isset($_SESSION['dt_iniFiltro']) || $_SESSION['dt_iniFiltro'] == '') {$_SESSION['dt_iniFiltro'] = $dataI; echo $dataI;}else{echo $_SESSION['dt_iniFiltro'];}*/ ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Final (Data da Solicitação)</label>
                                    <input type="text" class="form-control data" placeholder="Data Final (Data da Solicitação)" name="data_final" value="<?php /* if(!isset($_SESSION['dt_fimFiltro']) || $_SESSION['dt_fimFiltro'] == '') {$_SESSION['dt_fimFiltro'] = date('d-m-Y'); echo date('d-m-Y');}else{echo $_SESSION['dt_fimFiltro'];}*/ ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nº OS</label>
                                    <input type="text" class="form-control" placeholder="O campo pode ser preechido com o Nº completo ou só com uma parte" name="nu_os" value="<?php /* if(!isset($_SESSION['nu_osFiltro']) || $_SESSION['nu_osFiltro'] == '') {$_SESSION['nu_osFiltro'] = ''; echo '';}else{echo $_SESSION['nu_osFiltro'];}*/ ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select name="tipo" class="form-control" id="tipo">
                                        <option selected="selected" value="">Selecione</option>
                                        <?php /*
$consulta = mysql_query("SELECT * FROM ta_tipo_os ORDER BY ta_tipo_os ASC");
while( $row = mysql_fetch_assoc($consulta) )
{
echo "<option value=\"{$row['id']}\">{$row['ta_tipo_os']}</option>\n";
}
*/ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situação</label>
                                    <select name="id_situacao" class="form-control" id="id_situacao">
                                        <option selected="selected" value="">Selecione</option>
                                        <?php /*
$consulta = mysql_query("SELECT * FROM ta_situacao_os ORDER BY ds_situacaoSS ASC");
while( $row = mysql_fetch_assoc($consulta) )
{
echo "<option value=\"{$row['id']}\">{$row['ds_situacaoSS']}</option>\n";
}
*/ ?>
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
                    <h3 class="box-title"><i class="fa fa-cogs"></i> Ordens de Serviço</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="ordens-servico-table" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nº OS</th>
                            <th>Tipo</th>
                            <th>Local</th>
                            <th>Data OS</th>
                            <th>Categoria</th>
                            <th>Serviço</th>
                            <th>Situação</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Validado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                $data_inicial = implode("-",array_reverse(explode("/",$_POST['data_inicial'])))." 00:00:00";
                $data_final = implode("-",array_reverse(explode("/",$_POST['data_final'])))." 23:59:59";

                if($_POST['data_inicial'] != "" and $_POST['data_final'] != "") 
                { 
                    $b1 = "AND dt_os BETWEEN '$data_inicial' AND '$data_final'"; 
                    $_SESSION['dt_iniFiltro'] = $_POST['data_inicial']; 
                    $_SESSION['dt_fimFiltro'] = $_POST['data_final'];
                    
                    //echo "<script>alert('Entrou data ".$_SESSION['dt_iniFiltro']."')</script>";
                } 
                else
                {
                    $b1 = " "; 
                    $_SESSION['dt_iniFiltro'] = ""; 
                    $_SESSION['dt_fimFiltro'] = "";
                                        
                }
                
                //echo "<script>alert('Passou 2 ".$_SESSION['dt_iniFiltro']."')</script>";
                
                if($_POST['id_clienteLocal'] != "") { $b2 = "AND id_clienteLocal='".$_POST['id_clienteLocal']."'"; } 
                if($_POST['id_situacao'] != "") { $b3 = "AND id_situacao='".$_POST['id_situacao']."'"; } 
                if($_POST['tipo'] != "") { $b4 = "AND tipo='".$_POST['tipo']."'"; } 
                // if($_POST['id_clientePavimento'] != "") { $b5 = "AND id_clientePavimento='".$_POST['id_clientePavimento']."'"; } 
                // if($_POST['id_clienteSetor'] != "") { $b6 = "AND id_clienteSetor='".$_POST['id_clienteSetor']."'"; } 
                if($_POST['id_cliente'] != "") 
                { 
                    $b7 = "AND id_cliente='".$_POST['id_cliente']."'"; 
                    $_SESSION['cd_clienteFiltro'] = $_POST['id_cliente'];
                    
                } 
                
                if($_POST['nu_os'] != "") 
                { 
                    $b8 = "AND id like '%".$_POST['nu_os']."%'"; 
                    $_SESSION['nu_osFiltro'] = $_POST['nu_os'];

                } 

                $sql_consult2 = mysql_query("SELECT * FROM tb_ordem_servico WHERE id!='' $b1 $b2 $b3 $b4 $b5 $b6 $b7 $b8 ORDER BY id DESC") or die (mysql_error());

                while ($dados = mysql_fetch_array($sql_consult2)) {

                    $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                    $row_cliente = mysql_fetch_assoc($sql_cliente);

                    $sql_model = mysql_query("SELECT * FROM ta_modelo_impressao_os WHERE id='".$row_cliente['modelo_os']."'") or die (mysql_error());
                    $row_model = mysql_fetch_assoc($sql_model);

                    $link_impressao = $row_model['arquivo']."?id=".$dados['id'];

                    $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                    $row_loc = mysql_fetch_assoc($sql_loc);

                    $sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
                    $row_pav = mysql_fetch_assoc($sql_pav);

                    $sql_set = mysql_query("SELECT * FROM ta_cliente_setor WHERE id='".$dados['id_clienteSetor']."'") or die (mysql_error());
                    $row_set = mysql_fetch_assoc($sql_set);

                    $sql_cat = mysql_query("SELECT * FROM ta_categoria WHERE id='".$dados['id_categoria']."'") or die (mysql_error());
                    $row_cat = mysql_fetch_assoc($sql_cat);

                    $sql_catserv = mysql_query("SELECT * FROM ta_categoria_servico WHERE id='".$dados['id_categoriaServico']."'") or die (mysql_error());
                    $row_catserv = mysql_fetch_assoc($sql_catserv);

                    $dt_os = date('d/m/Y H:i:s', strtotime($dados['dt_os']));

                        $ano_os = date('Y', strtotime($dados['dt_os']));

                        //$os = $dados['os']."-".$ano_os;
                        $os = $dados['id']."-".$ano_os;

                    $sql_situSS = mysql_query("SELECT * FROM ta_situacao_os WHERE id='".$dados['id_situacao']."'") or die (mysql_error());
                    $row_situSS = mysql_fetch_assoc($sql_situSS);

                    $sql_tipo_os = mysql_query("SELECT * FROM ta_tipo_os WHERE id='".$dados['tipo']."'") or die (mysql_error());
                    $row_tipo_os = mysql_fetch_assoc($sql_tipo_os);

				*/ ?>
                        <tr>
                            <td><?php /* echo $dados['id'] */ ?></td>
                            <td><?php /* echo $row_tipo_os['ta_tipo_os'] */ ?></td>
                            <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                            <td><?php /* echo $dt_os */ ?></td>
                            <td><?php /* echo $row_cat['ds_categoria'] */ ?></td>
                            <td><?php /* echo $row_catserv['ds_categoriaServico'] */ ?></td>
                            <td><span class="badge" style="background:<?php /* echo $row_situSS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situSS['ds_situacaoSS'] */ ?></span></td>
                            <td><a href="ficha_os.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-info" title="Visualizar Ordem" target="_blank"><i class="fa fa-search"></i></a></td>
                            <td>
                                <?php /*
		    if($dados['id_situacao'] == 1 and $row_privi['os_finalizar'] == 1) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_sit_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-primary" title="Finalizar OS"><i class="fa fa-check"></i></a>
                                <?php /*
		    }
		    */ ?>
                                <?php /*
		    if($dados['id_situacao'] == 7 and $row_privi['os_validar'] == 1) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_val_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Validar OS"><i class="fa fa-check"></i></a>
                                <?php /*
		    }
		    */ ?>
                            </td>
                            <td>
                                <?php /*
		    if($dados['id_situacao'] == 1 and $row_privi['os_cancelar'] == 1) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_ban_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-danger" title="Cancelar OS"><i class="fa fa-ban"></i></a>
                                <?php /*
		    }
		    */ ?>
                            </td>
                            <td>
                                <a href="<?php /* echo $link_impressao */ ?>" target="_blank" class="btn btn-sm btn-info" title="Imprimir OS"><i class="fa fa-print"></i></a>
                            </td>
                            <td>
                                <?php /*
//                            $sql_obs = mysql_query("SELECT COUNT(u.usuario) total FROM tb_ordem_servico_obs_fiscalizacao osf, tb_usuario u WHERE osf.cd_pessoaadd = u.id AND osf.id_os='".$dados['id']."'") or die (mysql_error());
//                            $row_obs = mysql_fetch_assoc($sql_obs);
//                            $total_obs = $row_obs['total'];
                            
                            $sql_obs = mysql_query("SELECT nm_obs_os FROM tb_ordem_servico_obs_fiscalizacao WHERE id_os='".$dados['id']."' ORDER BY id DESC") or die (mysql_error());
                            $row_obs = mysql_fetch_assoc($sql_obs);
                            $ds_obs = $row_obs['nm_obs_os'];
                            
                            if($ds_obs != '')
                            {    echo '<span class="badge" style="background:#e7b73b;" title="'.$ds_obs.'"><i class="fa fa-exclamation-triangle"></i></span>';}
                            else{echo '<span class="badge" style="background:#2a8819"  title="Sem Observações (Fiscalização)"><i class="fa fa-thumbs-o-up"></i></span>';} 
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
                        */ ?>
                            </td>
                            <td><?php /*number_format($dados['total_validado'],2, ',', '.')*/ ?></td>
                        </tr>
                        <div class="modal" id="modal_ban_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="cancelar_os.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-red">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Cancelar OS Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Cancelar a Ordem de Serviço Nº <b><?php /* echo $os */ ?></b> ?</p>
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
                        <div class="modal" id="modal_sit_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="finalizar_os.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-blue">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Finalizar OS Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja finalizar a Ordem de Serviço Nº <b><?php /* echo $os */ ?></b> ?</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descrição da Conclusão</label>
                                                        <textarea rows="5" name="ds_conclusao" class="form-control" placeholder="Descrição da Conclusão" required="required"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                            <input type="submit" value="Sim" class="btn btn-primary" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
                        </div>
                        <div class="modal" id="modal_val_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="validar_os.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Validar OS Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Validar a Ordem de Serviço Nº <b><?php /* echo $os */ ?></b> ?</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descrição da Conclusão</label>
                                                        <p><?php /* echo $dados['ds_conclusao'] */ ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                            <input type="submit" value="Sim" class="btn btn-primary" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
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
		    }else{
		    */ ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-cogs"></i> Ordens de Serviço</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nº OS</th>
                            <th>Tipo</th>
                            <th>Local</th>
                            <th>Data OS</th>
                            <th>Categoria</th>
                            <th>Serviço</th>
                            <th>Situação</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Validado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                                
                                if((!isset($_SESSION['cd_clienteFiltro']) || $_SESSION['cd_clienteFiltro'] == '0') && (!isset($_SESSION['dt_iniFiltro']) || $_SESSION['dt_iniFiltro'] == '')){
                                    $b1 = " ";
                                    $b7 = " AND id_cliente='999999999999999'";
                                    
                                    //echo "<script>alert('tudo vazio')</script>";
                                }
                                else
                                {                                
                                    if((!isset($_SESSION['dt_iniFiltro']) || $_SESSION['dt_iniFiltro'] == '') && (!isset($_SESSION['dt_fimFiltro']) || $_SESSION['dt_fimFiltro'] == '')) {
                                        $_SESSION['dt_iniFiltro'] = '';   
                                        $_SESSION['dt_fimFiltro'] = '';

                                        $b1 = " ";
                                        
                                        //echo "<script>alert('Data vazia')</script>";
                                    }
                                    else{
                                        $data_inicial = implode("-",array_reverse(explode("/",$_SESSION['dt_iniFiltro'])))." 00:00:00";
                                        $data_final = implode("-",array_reverse(explode("/",$_SESSION['dt_fimFiltro'])))." 23:59:59";
                                
                                        $b1 = " AND dt_os BETWEEN '".$data_inicial."' AND '".$data_final."'"; 
                                        //echo "<script>alert('".$b1."')</script>";
                                    }
                                    
                                    if(!isset($_SESSION['cd_clienteFiltro']) || $_SESSION['cd_clienteFiltro'] == '0') 
                                    {
                                        $_SESSION['cd_clienteFiltro'] = '0';  
                                        $b7 = " ";    
                                        
                                        //echo "<script>alert('OS Vazia')</script>";
                                    }
                                    else {
                                        $b7 = "AND id_cliente='".$_SESSION['cd_clienteFiltro']."'"; 
                                        
                                        //echo "<script>alert('".$b7."')</script>";
                                    }
                                    
                                    if(!isset($_SESSION['nu_osFiltro']) || $_SESSION['nu_osFiltro'] == '') 
                                    {
                                        $_SESSION['nu_osFiltro'] = '';  
                                        $b8 = " ";    
                                        
                                        //echo "<script>alert('OS Vazia')</script>";
                                    }
                                    else {
                                        $b8 = "AND os like '%".$_SESSION['nu_osFiltro']."%'"; 
                                        
                                        //echo "<script>alert('".$b7."')</script>";
                                    }
                                    
                                }
                                
//                                echo "<script>alert('".$_SESSION['cd_clienteFiltro']."')</script>";
//                                echo "<script>alert('".$_SESSION['dt_iniFiltro']."')</script>";
//                                echo "<script>alert('".$_SESSION['dt_fimFiltro']."')</script>";
                                
                                
                                $sql_consult2 = mysql_query("SELECT * FROM tb_ordem_servico WHERE id!='' $b1  $b7 $b8 ORDER BY id DESC") or die (mysql_error());


                                while ($dados = mysql_fetch_array($sql_consult2)) {

                                    $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                                    $row_cliente = mysql_fetch_assoc($sql_cliente);

                                    $sql_model = mysql_query("SELECT * FROM ta_modelo_impressao_os WHERE id='".$row_cliente['modelo_os']."'") or die (mysql_error());
                                    $row_model = mysql_fetch_assoc($sql_model);

                                    $link_impressao = $row_model['arquivo']."?id=".$dados['id'];



                                    $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                                    $row_loc = mysql_fetch_assoc($sql_loc);

                                    $sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
                                    $row_pav = mysql_fetch_assoc($sql_pav);

                                    $sql_set = mysql_query("SELECT * FROM ta_cliente_setor WHERE id='".$dados['id_clienteSetor']."'") or die (mysql_error());
                                    $row_set = mysql_fetch_assoc($sql_set);

                                    $sql_cat = mysql_query("SELECT * FROM ta_categoria WHERE id='".$dados['id_categoria']."'") or die (mysql_error());
                                    $row_cat = mysql_fetch_assoc($sql_cat);

                                    $sql_catserv = mysql_query("SELECT * FROM ta_categoria_servico WHERE id='".$dados['id_categoriaServico']."'") or die (mysql_error());
                                    $row_catserv = mysql_fetch_assoc($sql_catserv);

                                    $dt_os = date('d/m/Y H:i:s', strtotime($dados['dt_os']));

                                        $ano_os = date('Y', strtotime($dados['dt_os']));

                                        $os = $dados['os']."-".$ano_os;

                                    $sql_situSS = mysql_query("SELECT * FROM ta_situacao_os WHERE id='".$dados['id_situacao']."'") or die (mysql_error());
                                    $row_situSS = mysql_fetch_assoc($sql_situSS);

                                    $sql_tipo_os = mysql_query("SELECT * FROM ta_tipo_os WHERE id='".$dados['tipo']."'") or die (mysql_error());
                                    $row_tipo_os = mysql_fetch_assoc($sql_tipo_os);

                                                */ ?>
                        <tr>
                            <td><?php /* echo $dados['id'] */ ?></td>
                            <td><?php /* echo $row_tipo_os['ta_tipo_os'] */ ?></td>
                            <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                            <td><?php /* echo $dt_os */ ?></td>
                            <td><?php /* echo $row_cat['ds_categoria'] */ ?></td>
                            <td><?php /* echo $row_catserv['ds_categoriaServico'] */ ?></td>
                            <td><span class="badge" style="background:<?php /* echo $row_situSS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situSS['ds_situacaoSS'] */ ?></span></td>
                            <td><a href="ficha_os.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-info" title="Visualizar Ordem" target="_blank"><i class="fa fa-search"></i></a></td>

                            <td>
                                <?php /*
                                    if($dados['id_situacao'] == 1 and $row_privi['os_finalizar'] == 1) {
                                    */ ?>
                                <a data-toggle="modal" data-target="#modal_sit_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-primary" title="Finalizar OS"><i class="fa fa-check"></i></a>
                                <?php /*
                                    }
                                    */ ?>
                                <?php /*
                                    if($dados['id_situacao'] == 7 and $row_privi['os_validar'] == 1) {
                                    */ ?>
                                <a data-toggle="modal" data-target="#modal_val_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Validar OS"><i class="fa fa-check"></i></a>
                                <?php /*
                                    }
                                    */ ?>
                            </td>
                            <td>
                                <?php /*
                                    if($dados['id_situacao'] == 1 and $row_privi['os_cancelar'] == 1) {
                                    */ ?>
                                <a data-toggle="modal" data-target="#modal_ban_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-danger" title="Cancelar OS"><i class="fa fa-ban"></i></a>
                                <?php /*
                                    }
                                    */ ?>
                            </td>
                            <td>
                                <a href="<?php /* echo $link_impressao */ ?>" target="_blank" class="btn btn-sm btn-info" title="Imprimir OS"><i class="fa fa-print"></i></a>
                            </td>
                            <td>
                                <?php /*
                //                            $sql_obs = mysql_query("SELECT COUNT(u.usuario) total FROM tb_ordem_servico_obs_fiscalizacao osf, tb_usuario u WHERE osf.cd_pessoaadd = u.id AND osf.id_os='".$dados['id']."'") or die (mysql_error());
                //                            $row_obs = mysql_fetch_assoc($sql_obs);
                //                            $total_obs = $row_obs['total'];

                                            $sql_obs = mysql_query("SELECT nm_obs_os FROM tb_ordem_servico_obs_fiscalizacao WHERE id_os='".$dados['id']."' ORDER BY id DESC") or die (mysql_error());
                                            $row_obs = mysql_fetch_assoc($sql_obs);
                                            $ds_obs = $row_obs['nm_obs_os'];

                                            if($ds_obs != '')
                                            {    echo '<span class="badge" style="background:#e7b73b;" title="'.$ds_obs.'"><i class="fa fa-exclamation-triangle"></i></span>';}
                                            else{echo '<span class="badge" style="background:#2a8819"  title="Sem Observações (Fiscalização)"><i class="fa fa-thumbs-o-up"></i></span>';}
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
                                        */ ?>
                            </td>

                            <td><?php /*number_format($dados['total_validado'],2, ',', '.')*/ ?></td>
                        </tr>
                        <div class="modal" id="modal_ban_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="cancelar_os.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-red">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Cancelar OS Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Cancelar a Ordem de Serviço Nº <b><?php /* echo $os */ ?></b> ?</p>
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
                        <div class="modal" id="modal_sit_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="finalizar_os.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-blue">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Finalizar OS Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja finalizar a Ordem de Serviço Nº <b><?php /* echo $os */ ?></b> ?</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descrição da Conclusão</label>
                                                        <textarea rows="5" name="ds_conclusao" class="form-control" placeholder="Descrição da Conclusão" required="required"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                            <input type="submit" value="Sim" class="btn btn-primary" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
                        </div>
                        <div class="modal" id="modal_val_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="validar_os.php" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Validar OS Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Validar a Ordem de Serviço Nº <b><?php /* echo $os */ ?></b> ?</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descrição da Conclusão</label>
                                                        <p><?php /* echo $dados['ds_conclusao'] */ ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                                            <input type="submit" value="Sim" class="btn btn-primary" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
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

        dataTableInit("ordens-servico-table");
    });
</script>
</html>