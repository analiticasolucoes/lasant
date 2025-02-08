<?php /*
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança  
protegePagina(); // Chama a função que protege a página 
*/ ?>
<?php /*
include "conexao.php";
$clientes = explode(' , ',$_SESSION['operadorIDCliente']);

if($_GET['data_inicial'] != "") {
    $_SESSION['dt_iniFiltro'] = $_GET['data_inicial'];
} else {
    $_SESSION['dt_iniFiltro'] = '';
}

if($_GET['data_final'] != "") {
    $_SESSION['dt_fimFiltro'] = $_GET['data_final'];
} else {
    $_SESSION['dt_fimFiltro'] = '';
}

if($_GET['id_cliente'] != "") {
    $_SESSION['cd_clienteFiltro'] = $_GET['id_cliente'];
} else {
    $_SESSION['cd_clienteFiltro'] = '0';
}

if($_GET['nu_os'] != "") {
    $_SESSION['nu_osFiltro'] = $_GET['nu_os'];
} else {
    $_SESSION['nu_osFiltro'] = '';
}

if($_GET['id_situacaoSS'] != "") {
    $_SESSION['id_situacaoSSFiltro'] = $_GET['id_situacaoSS'];
} else {
    $_SESSION['id_situacaoSSFiltro'] = '';
}
*/ ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Lasant - Cliente</title>
    <base href="<?= BASE_URL ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/jquery/3.7.1/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- Page script -->
    <script src="assets/dist/js/cep.js"></script>
    <script src="assets/js/jquery.maskedinput.js"></script>
    <script src="assets/js/jquery.maskMoney.js" type="text/javascript"></script>
    <script src="assets/dist/js/valor.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#telefone1').focusout(function(){
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            }).trigger('focusout');
            $('#telefone2').focusout(function(){
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            }).trigger('focusout');
            $('#telefone3').focusout(function(){
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            }).trigger('focusout');
            $('#telefone_celular').focusout(function(){
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            }).trigger('focusout');

            $("#cep").inputmask("99999999");
            $("#cep_local").inputmask("99999999");
            $("#cnpj").inputmask("99.999.999/9999-99");
            $(".cpf").inputmask("999.999.999-99");
            $(".data").mask("99/99/9999");
        });

        //Datemask2 mm/dd/yyyy
        $(function () {
            $('.data').daterangepicker({
                singleDatePicker: true,
                format: 'DD/MM/YYYY',
                locale: {
                    weekLabel: "S",
                    daysOfWeek: [
                        "Dom",
                        "Seg",
                        "Ter",
                        "Qua",
                        "Qui",
                        "Sex",
                        "Sab"
                    ],
                    monthNames: [
                        "Janeiro",
                        "Fevereiro",
                        "Marco",
                        "Abril",
                        "Maio",
                        "Junho",
                        "Julho",
                        "Agosto",
                        "Setembro",
                        "Outubro",
                        "Novembro",
                        "Dezembro"
                    ]
                }
            });
            //Datemask2 mm/dd/yyyy
        });
    </script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
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
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include __DIR__ . '/../../templates/header.php'; ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="ordens-servico.php" method="get" enctype="multipart/form-data" target="_self">
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
                                    <label for="id_cliente">Cliente</label>
                                    <select class="form-control" id="id_cliente" name="id_cliente" required="required">
                                        <option value="" selected>Selecione</option>
                                        <?php /*
                                        foreach($clientes as $value) {
                                            //echo '<script>alert("'.$clientes.'");</script>';

                                            $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysql_error());
                                            $row_cliente = mysql_fetch_assoc($sql_cliente);

                                            if(!isset($_SESSION['cd_clienteFiltro'])) {$_SESSION['cd_clienteFiltro'] = '0';}
                                            if($row_cliente['id'] == $_SESSION['cd_clienteFiltro'] ){ $sel = " selected "; } else { $sel = ""; };
                                        */ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>" <?php /* echo $sel; */ ?>><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
                                        <?php /* } */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_clienteLocal">Local</label>
                                    <select class="form-control" id="id_clienteLocal" name="id_clienteLocal">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_clientePavimento">Pavimento</label>
                                    <select class="form-control" id="id_clientePavimento" name="id_clientePavimento">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_clienteSetor">Setor</label>
                                    <select class="form-control" id="id_clienteSetor" name="id_clienteSetor">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data_inicial">Data Inicial (Data da Solicitação)</label>
                                    <?php /*
                                    $datai = new DateTime('-30 day');
                                    $dataI = $datai->format('d-m-Y');
                                    */ ?>
                                    <input type="text" class="form-control data" placeholder="Data Inicial (Cadastro)" id="data_inicial" name="data_inicial" value="<?php /* if(!isset($_SESSION['dt_iniFiltro']) || $_SESSION['dt_iniFiltro'] == '') {$_SESSION['dt_iniFiltro'] = $dataI; echo $dataI;} else {echo $_SESSION['dt_iniFiltro'];}*/ ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data_final">Data Final (Data da Solicitação)</label>
                                    <input type="text" class="form-control data" placeholder="Data Final (Data da Solicitação)" id="data_final" name="data_final" value="<?php /* if(!isset($_SESSION['dt_fimFiltro']) || $_SESSION['dt_fimFiltro'] == '') {$_SESSION['dt_fimFiltro'] = date('d-m-Y'); echo date('d-m-Y');} else {echo $_SESSION['dt_fimFiltro'];}*/ ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nu_os">Nº OS</label>
                                    <input type="text" class="form-control" placeholder="O campo pode ser preechido com o Nº completo ou só com uma parte" id="nu_os" name="nu_os" value="<?php /* if(!isset($_SESSION['nu_osFiltro']) || $_SESSION['nu_osFiltro'] == '') {$_SESSION['nu_osFiltro'] = ''; echo '';} else {echo $_SESSION['nu_osFiltro'];}*/ ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <select name="tipo" class="form-control" id="tipo">
                                        <option selected="selected" value="">Selecione</option>
                            <?php /*
                            $consulta = mysql_query("SELECT * FROM ta_tipo_os ORDER BY ta_tipo_os ASC");
                            while($row = mysql_fetch_assoc($consulta)) {
                                echo "<option value=\"{$row['id']}\">{$row['ta_tipo_os']}</option>\n";
                            }
                            */ ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Situação</label>
                                    <select name="id_situacaoSS" class="form-control" id="id_situacao">
                                        <option selected="selected" value="">Selecione</option>
                                <?php /*
                                $consulta = mysql_query("SELECT * FROM ta_situacao_os ORDER BY ds_situacaoSS ASC");
                                while( $row = mysql_fetch_assoc($consulta) ) {
                                    if(!isset($_SESSION['id_situacaoSSFiltro'])) {$_SESSION['id_situacaoSSFiltro'] = '0';}
                                    if($row['id'] == $_SESSION['id_situacaoSSFiltro'] ){ $sel = " selected "; } else { $sel = ""; };

                                    echo "<option value=\"{$row['id']}\" $sel>{$row['ds_situacaoSS']}</option>\n";
                                } */ ?>
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
            <?php /* if ($_GET['acao'] == "pesquisa") { */ ?>
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
                            <th>Data OS</th>
                            <th>Local</th>
                            <th>Pavimento</th>
                            <th>Setor</th>
                            <th>Categoria</th>
                            <th>Serviço</th>
                            <th>GUT</th>
                            <th>Situação</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Total Validado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $data_inicial = implode("-",array_reverse(explode("/",$_GET['data_inicial'])))." 00:00:00";
                        $data_final = implode("-",array_reverse(explode("/",$_GET['data_final'])))." 23:59:59";

                        if($_GET['data_inicial'] != "" and $_GET['data_final'] != "") {
                            $b1 = "AND dt_os BETWEEN '$data_inicial' AND '$data_final'";

                            $_SESSION['dt_iniFiltro'] = $_GET['data_inicial'];
                            $_SESSION['dt_fimFiltro'] = $_GET['data_final'];
                        }
                        if($_GET['id_situacaoSS'] != "") {
                            $b2 = "AND id_situacao='".$_GET['id_situacaoSS']."'";

                            $_SESSION['id_situacaoSSFiltro'] = $_GET['id_situacaoSS'];
                        }
                        if($_GET['id_clienteLocal'] != "") { $b3 = "AND id_clienteLocal='".$_GET['id_clienteLocal']."'"; }
                        if($_GET['id_clientePavimento'] != "") { $b4 = "AND id_clientePavimento='".$_GET['id_clientePavimento']."'"; }
                        if($_GET['id_cliente'] != "") {
                            $b5 = "AND id_cliente='".$_GET['id_cliente']."'";
                            $_SESSION['cd_clienteFiltro'] = $_GET['id_cliente'];

                        }
                        if($_GET['tipo'] != "") { $b6 = "AND tipo='".$_GET['tipo']."'"; }
                        if($_GET['nu_os'] != "") {
                            $b8 = "AND id like '%".$_GET['nu_os']."%'";
                            $_SESSION['nu_osFiltro'] = $_GET['nu_os'];
                        }
                        $variaveis = "?data_inicial=".$_GET['data_inicial']."&data_final=".$_GET['data_final']."&id_situacaoSS=".$_GET['id_situacaoSS']."&id_clienteLocal=".$_GET['id_clienteLocal']."&id_clientePavimento=".$_GET['id_clientePavimento']."&id_cliente=".$_GET['id_cliente']."&tipo=".$_GET['tipo']."&nu_os=".$_GET['nu_os'];
                        $sql_consult2 = mysql_query("SELECT * FROM tb_ordem_servico WHERE id!='' $b1 $b2 $b3 $b4 $b5 $b6 $b8 ORDER BY id DESC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {
                            $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                            $row_cliente = mysql_fetch_assoc($sql_cliente);

                            $sql_model = mysql_query("SELECT * FROM ta_modelo_impressao_os WHERE id='".$row_cliente['modelo_os']."'") or die (mysql_error());
                            $row_model = mysql_fetch_assoc($sql_model);

                            $link_impressao = "../admin/".$row_model['arquivo']."?id=".$dados['id'];

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

                            $os = $dados['id']."-".$ano_os;

                            $sql_situSS = mysql_query("SELECT * FROM ta_situacao_os WHERE id='".$dados['id_situacao']."'") or die (mysql_error());
                            $row_situSS = mysql_fetch_assoc($sql_situSS);

                            $sql_tipo_os = mysql_query("SELECT * FROM ta_tipo_os WHERE id='".$dados['tipo']."'") or die (mysql_error());
                            $row_tipo_os = mysql_fetch_assoc($sql_tipo_os); */ ?>
                        <tr>
                            <td><?php /* echo $os */ ?></td>
                            <td><?php /* echo $row_tipo_os['ta_tipo_os'] */ ?></td>
                            <td><?php /* echo $dt_os */ ?></td>
                            <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                            <td><?php /* echo $row_pav['ds_clientePavimento'] */ ?></td>
                            <td><?php /* echo $row_set['ds_clienteSetor'] */ ?></td>
                            <td><?php /* echo $row_cat['ds_categoria'] */ ?></td>
                            <td><?php /* echo $row_catserv['ds_categoriaServico'] */ ?></td>
                            <td><?php /* echo $dados['total_urgencia']*/ ?></td>
                            <td><span class="badge" style="background:<?php /* echo $row_situSS['cor'] */ ?>; font-size:12px; padding:8px;"><?php /* echo $row_situSS['ds_situacaoSS'] */ ?></span></td>
                            <td><a href="assets/ficha_os.php?id=<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-info" title="Visualizar Solicitação" target="_blank"><i class="fa fa-search"></i></a></td>
                            <td>
                                <?php /*
                    //somente o perfil fiscal
		    if($dados['id_situacao'] == 1 and $_SESSION['operadorTipo'] == 2) {
		    */ ?>
                                <!--<a data-toggle="modal" data-target="#modal_aprova_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Aprovar OS"><i class="fa fa-legal"></i></a>-->
                                <?php /*
		    }
		    */ ?>
                            </td>
                            <td>
                                <?php /*
		    if($dados['id_situacao'] == 6 and $_SESSION['operadorTipo'] == 2 and $dados['usuario_assinatura_fiscal'] == '') {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_fisc_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-primary" title="Assinar OS (Fiscal)"><i class="fa fa-pencil-square-o"></i></a>
                                <?php /*
		    }
		    */ ?>
                            </td>
                            <td>
                                <?php /*
		    if($dados['id_situacao'] == 1 or $dados['id_situacao'] == 8) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_ban_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-danger" title="Cancelar OS"><i class="fa fa-ban"></i></a>
                                <?php /*
		    }
		    */ ?>
                            </td>
                            <td>
                                <?php /*
		    if($dados['id_situacao'] == 6 and $_SESSION['operadorTipo'] == 2 and $dados['usuario_assinatura_fiscal'] != '' and $dados['usuario_assinatura_cliente'] != '') {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_faturar_os_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Faturar OS"><i class="fa fa-usd"></i></a>
                                <?php /*
		    }
		    */ ?>
                            </td>
                            <td>
                                <?php /*
                        if($dados['id_situacao'] == 2) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_confirmar_servico_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Confirmar Execucao"><i class="fa fa-check"></i></a>
                                <?php /*
                        }
                        if($dados['id_situacao'] == 10) {
		    */ ?>
                                <a data-toggle="modal" data-target="#modal_confirmar_servico2_<?php /* echo $dados['id'] */ ?>" class="btn btn-sm btn-success" title="Confirmar Re-Execucao"><i class="fa fa-check"></i></a>
                            <?php /* } */ ?>
                            </td>
                            <td>
                                <a href="assets/<?php /* echo $link_impressao */ ?>" target="_blank" class="btn btn-sm btn-info" title="Imprimir OS"><i class="fa fa-print"></i></a>
                            </td>
                            <td>
                            <?php /*
                            if($dados['id_situacao'] == 9) {    echo '<span class="badge" style="background:#e7b73b;" title="Motivo Não Aprovação Serviço: '.$dados['motivo_recusa'].'"><i class="fa fa-exclamation-triangle"></i></span>';}
                            if($dados['id_situacao'] == 7) {    echo '<span class="badge" style="background:#2a8819"  title="Serviço Aprovado"><i class="fa fa-thumbs-o-up"></i></span>';}
                            if($dados['id_situacao'] == 8){
                                if($dados['ressalva_aprovacao'] == '') {
                                    echo '<span class="badge" style="background:#2a8819"  title="OS Aprovada Sem Resalva"><i class="fa fa-check-circle-o"></i></span>';
                                } else{
                                    echo '<span class="badge" style="background:#f7a614"  title="Resalva da OS: '.$dados['ressalva_aprovacao'].'"><i class="fa fa-dot-circle-o"></i></span>';
                                }
                            } */ ?>
                            </td>
                            <td><?php /* echo number_format($dados['total_validado'],2, ',', '.'); */ ?></td>
                        </tr>
                        <div class="modal" id="modal_aprova_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="autorizar_os.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Aprovar Ordem Serviço Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12" style="margin-top:15px;">
                                                    <div class="form-group">
                                                        <label>Aprovar</label>
                                                        <select class="form-control" id="fg_aprovado" name="fg_aprovado" required="required">
                                                            <option selected="selected" value="8">SIM</option>
                                                            <option value="3">NAO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <p>Tem certeza que deseja aprovar a Solicitação ?</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="resalva_aprovacao">Resalva na Aprovação</label>
                                                        <textarea rows="5" id="resalva_aprovacao" name="resalva_aprovacao" class="form-control" placeholder="Resalva"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
                                            <input type="submit" value="Salvar" class="btn btn-success" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
                        </div>
                        <div class="modal" id="modal_faturar_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="faturar_os.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Faturar OS Nº <?php /* echo $os */ ?> (Gerente)</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Faturar a Ordem de Serviço?</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dt_faturamento">Data para Faturamento</label>
                                                        <input type="text" class="form-control data" placeholder="Data para Faturamento" id="dt_faturamento" name="dt_faturamento" >
                                                    </div>
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
                        <div class="modal" id="modal_confirmar_servico_<?php /* echo $dados['id'] */ ?>">
                            <form action="confirmar_servico.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Confirmar a Execução do Serviço da Ordem Nº <?php /* echo $os */ ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12" style="margin-top:15px;">
                                                    <div class="form-group">
                                                        <label for="fg_confirma_os">Aprovar</label>
                                                        <select class="form-control" id="fg_confirma_os" name="fg_confirma_os" required="required">
                                                            <option selected="selected" value="S">SIM</option>
                                                            <option value="N">NAO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Confirmar a Execução do Serviço da Ordem?</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="motivo_recusa">Motivo da Não Aprovação</label>
                                                        <textarea rows="5" id="motivo_recusa" name="motivo_recusa" class="form-control" placeholder="Motivo"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
                                            <input type="submit" value="Salvar" class="btn btn-warning" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </form>
                        </div>
                        <div class="modal" id="modal_confirmar_servico2_<?php /* echo $dados['id'] */ ?>">
                            <form action="confirmar_servico2.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Confirmar a Re-Execução do Serviço da Ordem Nº <?php /* echo $os */ ?></h4>
                                        </div
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Confirmar a Execução do Serviço da Ordem?</p>
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
                        <div class="modal" id="modal_gere_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="assinar_os_gerente.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Assinar OS Nº <?php /* echo $os */ ?> (Gerente)</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja Assinar a Ordem de Serviço?</p>
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
                        <div class="modal" id="modal_fisc_os_<?php /* echo $dados['id'] */ ?>">
                            <form action="assinar_os_fiscal.php<?php /* echo $variaveis */ ?>" method="post" enctype="multipart/form-data" target="_self">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-blue">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Assinar OS Nº <?php /* echo $os */ ?> (Fiscal)</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_os" value="<?php /* echo $dados['id'] */ ?>" />
                                                <div class="col-md-12">
                                                    <p>Tem certeza que deseja assinar a Ordem de Serviço?</p>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="obs_os">Observações</label>
                                                            <textarea rows="5" id="obs_os" name="obs_os" class="form-control" placeholder="Observações" required="required"></textarea>
                                                        </div>
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="motivo_cancelamento">Motivo Cancelamento</label>
                                                        <textarea rows="5" id="motivo_cancelamento" name="motivo_cancelamento" class="form-control" placeholder="Motivo Cancelamento" required></textarea>
                                                    </div>
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
                        <?php /* } */ ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <?php /* } */ ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__ . '/../../templates/footer.php'; ?>
</div>
</body>
</html>