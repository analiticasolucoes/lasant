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
    <?php include __DIR__ . '/../templates/header.php'; ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="pmoc.php" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="fa fa-search"></span> Pesquisar Equipamentos</h3>
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
                                            $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysql_error());
                                            $row_cliente = mysql_fetch_assoc($sql_cliente);
                                        */ ?>
                                        <option value="<?php /* echo $row_cliente['id'] */ ?>"><?php /* echo $row_cliente['nome_empresa'] */ ?></option>
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
                    <h3 class="box-title"><i class="fa fa-wrench"></i> Equipamentos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Equipamento</th>
                            <th>Cliente</th>
                            <th>Local</th>
                            <th>Pavimento</th>
                            <th>Setor</th>
                            <th>Grupo</th>
                            <th>Subgrupo</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*
                        $data_inicial = implode("-",array_reverse(explode("/",$_POST['data_inicial'])))." 00:00:00";
                        $data_final = implode("-",array_reverse(explode("/",$_POST['data_final'])))." 23:59:59";

                        if($_POST['data_inicial'] != "" and $_POST['data_final'] != "") { $b1 = "AND dt_os BETWEEN '$data_inicial' AND '$data_final'"; }
                        if($_POST['id_situacao'] != "") { $b2 = "AND id_situacao='".$_POST['id_situacao']."'"; }
                        if($_POST['id_clienteLocal'] != "") { $b3 = "AND id_clienteLocal='".$_POST['id_clienteLocal']."'"; }
                        if($_POST['id_clientePavimento'] != "") { $b4 = "AND id_clientePavimento='".$_POST['id_clientePavimento']."'"; }
                        if($_POST['id_clienteSetor'] != "") { $b5 = "AND id_clienteSetor='".$_POST['id_clienteSetor']."'"; }
                        if($_POST['id_cliente'] != "") { $b6 = "AND id_cliente='".$_POST['id_cliente']."'"; }

                        $sql_consult2 = mysql_query("SELECT * FROM tb_equipamento WHERE id!='' $b3 $b4 $b5 $b6 ORDER BY nm_equipamento ASC") or die (mysql_error());
                        while ($dados = mysql_fetch_array($sql_consult2)) {

                            $id_pet = $dados['id'];

                            $sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$dados['id_cliente']."'") or die (mysql_error());
                            $row_cliente = mysql_fetch_assoc($sql_cliente);

                            $sql_loc = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
                            $row_loc = mysql_fetch_assoc($sql_loc);

                            $sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
                            $row_pav = mysql_fetch_assoc($sql_pav);

                            $sql_set = mysql_query("SELECT * FROM ta_cliente_setor WHERE id='".$dados['id_clienteSetor']."'") or die (mysql_error());
                            $row_set = mysql_fetch_assoc($sql_set);

                            $sql_cat2 = mysql_query("SELECT * FROM ta_equip_subgrupo_manutencao WHERE id='".$dados['id_equipSubGrupoManutencao']."'") or die (mysql_error());
                            $row_cat2 = mysql_fetch_assoc($sql_cat2);

                            $sql_cat3 = mysql_query("SELECT * FROM ta_equip_grupo_manutencao WHERE id='".$dados['id_equipGrupoManutencao']."'") or die (mysql_error());
                            $row_cat3 = mysql_fetch_assoc($sql_cat3);
                        */ ?>
                        <tr>
                            <td><?php /* echo $dados['nm_equipamento'] */ ?></td>
                            <td><?php /* echo $row_cliente['nome_empresa'] */ ?></td>
                            <td><?php /* echo $row_loc['ds_clienteLocal'] */ ?></td>
                            <td><?php /* echo $row_pav['ds_clientePavimento'] */ ?></td>
                            <td><?php /* echo $row_set['ds_clienteSetor'] */ ?></td>
                            <td><?php /* echo $row_cat3['ds_equipGrupoManutencao'] */ ?></td>
                            <td><?php /* echo $row_cat2['ds_equipSubgrupoManutencao'] */ ?></td>
                            <td>
                                <a href="assets/ficha_pmoc.php?id=<?php /* echo $dados['id'] */ ?>">
                                    <button class="btn btn-sm btn-primary"><span class="fa fa-search"></span></button>
                                </a>
                            </td>
                        </tr>
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
    <?php include __DIR__ . '/../templates/footer.php'; ?>
</div>
</body>
</html>
