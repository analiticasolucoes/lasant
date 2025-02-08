<?php
$sql_consult = mysqli_query("SELECT * FROM tb_cotacao WHERE id='".$_GET['id']."'") or die (mysqli_error());
$row_consult = mysqli_fetch_assoc($sql_consult);

if($row_consult['tipo'] == 0) { $titulo_solicitacao = "Ficha Solicitação Compra"; }
if($row_consult['tipo'] == 1) { $titulo_solicitacao = "Ficha Levantamento"; }

$dt_solicitacao = date('d/m/Y H:i:s', strtotime($row_consult['dt_solicitacao']));

$sql_cliente = mysqli_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$row_consult['id_cliente']."'") or die (mysqli_error());
$row_cliente = mysqli_fetch_assoc($sql_cliente);

$sql_loc = mysqli_query("SELECT * FROM ta_cliente_local WHERE id='".$row_consult['id_clienteLocal']."'") or die (mysqli_error());
$row_loc = mysqli_fetch_assoc($sql_loc);

$sql_situ = mysqli_query("SELECT * FROM tb_situacao_cotacao WHERE id='".$row_consult['id_situacao']."'") or die (mysqli_error());
$row_situ = mysqli_fetch_assoc($sql_situ);

$sql_operador = mysqli_query("SELECT * FROM tb_usuario WHERE id='".$row_consult['id_operador']."'") or die (mysqli_error());
$row_operador = mysqli_fetch_assoc($sql_operador);

$sql_gr = mysqli_query("SELECT * FROM ta_material_grupo WHERE id='".$row_consult['id_materialGrupo']."'") or die (mysqli_error());
$row_gr = mysqli_fetch_assoc($sql_gr);
$grupo = $row_gr['ds_materialGrupo'];

$sql_priori = mysqli_query("SELECT * FROM tb_prioridade_compra WHERE id='".$row_consult['id_prioridade']."'") or die (mysqli_error());
$row_priori = mysqli_fetch_assoc($sql_priori);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Lasant - Administrativo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script src="dist/js/cep.js"></script>
    <script src="dist/js/cep.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#telefone').focusout(function(){
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
            $("#cpf").inputmask("999.999.999-99");
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
        $(document).ready(function() {
            $('#id_cliente').change(function() {
                var id_cliente = $(this).val();
                $('#id_clienteLocal').load('listar_locais.php?id_cliente='+id_cliente);
                $('#id_contrato').load('listar_contratos.php?id_cliente='+id_cliente);
            });
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?php
    include "topo.php";
    ?>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="atualizar_compra2.php?id_compra=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data" target="_self">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-legal"></i> <?php echo $titulo_solicitacao ?> (Nº <?php echo $_GET['id'] ?>)</h3>

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
                                    <p><?php echo $row_cliente['nome_empresa'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Local</label>
                                    <p><?php echo $row_loc['ds_clienteLocal'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data</label>
                                    <p><?php echo $dt_solicitacao ?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Operador</label>
                                    <p><?php echo $row_operador['nome'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Situação</label>
                                    <p>Solicitando</p>
                                </div>
                            </div>
                            <?php if($row_consult['tipo'] == 0) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Grupo</label>
                                        <p><?php echo $grupo ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prioridade</label>
                                    <p><?php echo $row_priori['prioridade'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observações</label>
                                    <textarea name="observacoes" class="form-control" rows="4" id="observacoes" placeholder="Observações"><?php echo $row_consult['observacoes'] ?></textarea>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-refresh"></span> Atualizar</button>
                    </div>
                </div>
                <!-- /.box -->
            </form>
            <!-- /.box -->

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Materiais</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form id="form_add_material_compra" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_cotacao" value="<?php echo $_GET['id'] ?>" />
                            <input type="hidden" name="id_materialGrupo" value="<?php echo $row_consult['id_materialGrupo'] ?>" />
                            <input type="hidden" name="tipo" value="<?php echo $row_consult['tipo'] ?>" />
                            <div class="col-md-3">
                                <label>Código</label>
                                <div class="input-group">
                                    <input type="text" name="referencia" class="form-control pull-left" placeholder="Código" id="referencia_est" />
                                    <span class="input-group-btn">
                                        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#pop_produto_est"><i class="fa fa-search"></i></a>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                            <div class="col-md-3">
                                <label>Material</label>
                                <div class="form-group">
                                    <input type="text" name="material" class="form-control pull-left" placeholder="Material" id="material" />
                                </div><!-- /input-group -->
                            </div>
                            <div class="col-md-4">
                                <label>Marca</label>
                                <div class="form-group">
                                    <select class="form-control" id="id_marca" name="id_marca">
                                        <option value="" selected>Selecione</option>
                                        <?php
                                        $sql_marca = mysqli_query("SELECT * FROM ta_material_marca WHERE id_grupo='".$row_consult['id_materialGrupo']."' ORDER BY marca") or die (mysqli_error());
                                        while ($row_marca = mysqli_fetch_array($sql_marca)) {
                                            ?>
                                            <option value="<?php echo $row_marca['id'] ?>"><?php echo $row_marca['marca'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div><!-- /input-group -->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Qtd</label>
                                    <input type="text" name="qtd" class="form-control" placeholder="Qtd" id="qtd" onkeypress="FormataValor(this.id, 10, event)" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observações</label>
                                    <input type="text" name="obs_solicitante" class="form-control" placeholder="Observações Solicitante" id="obs_solicitante" maxlength="30" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Foto Do Material</label>
                                    <input type="file" name="documento[]" />
                                    <!--  <input type="file" name="documento[]" />
                                      <input type="file" name="documento[]" /> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="btn btn-primary pull-right" style="margin-top:25px;">Adicionar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row" style="margin-top:15px;" id="materiais_compra">
                        <div class="col-md-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table">
                                    <tbody><tr>
                                        <th width="10%">Cód.</th>
                                        <th width="45%">Material / Serviço</th>
                                        <th width="10%">Classe</th>
                                        <th width="10%">Marca</th>
                                        <th width="10%">Un.</th>
                                        <th width="10%">Qtd.</th>
                                        <th width="10%">Foto</th>
                                        <th width="5%"></th>
                                    </tr>
                                    <?php
                                    $sql_materiais = mysqli_query("SELECT * FROM tb_materiais_cotacao WHERE id_cotacao='".$_GET['id']."' ORDER BY id ASC") or die (mysqli_error());
                                    while ($dados = mysqli_fetch_array($sql_materiais)) {

                                        $sql_consult2 = mysqli_query("SELECT * FROM ta_material WHERE id='".$dados['id_material']."'") or die (mysqli_error());
                                        $row_consult2 = mysqli_fetch_assoc($sql_consult2);

                                        $sql_cl = mysqli_query("SELECT * FROM ta_material_classe WHERE id='".$row_consult2['id_materialClasse']."'") or die (mysqli_error());
                                        $row_cl = mysqli_fetch_assoc($sql_cl);
                                        $classe = $row_cl['classe'];

                                        $sql_ma = mysqli_query("SELECT * FROM ta_material_marca WHERE id='".$dados['id_marca']."'") or die (mysqli_error());
                                        $row_ma = mysqli_fetch_assoc($sql_ma);
                                        if($row_ma['marca'] == '') { $marca = "Sem marca"; } else { $marca = $row_ma['marca']; }

                                        $sql_unidade = mysqli_query("SELECT * FROM ta_unidade WHERE id='".$row_consult2['id_unidade']."'") or die (mysqli_error());
                                        $row_unidade = mysqli_fetch_array($sql_unidade);

                                        $total_materiais += $dados['vl_total'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row_consult2['cd_material'] ?></td>
                                            <td><?php echo $row_consult2['ds_material'] ?></td>
                                            <td><?php echo $row_cl['classe'] ?></td>
                                            <td><?php echo $row_ma['marca'] ?></td>
                                            <td><?php echo $row_unidade['ds_unidade'] ?></td>
                                            <td><?php echo $dados['qtd'] ?></td>
                                            <td>
                                                <?php
                                                if($dados['imagem'] != ""){
                                                    echo "<a class='btn btn-info btn-circle btn-sm' href='fotos/".$dados['imagem']."'target='_blank' title='Foto 1'><span class='fa fa-cloud-download' aria-hidden='true'></span></a>";
                                                }else{
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#pop_mat_compra_excluir_<?php echo $dados['id'] ?>"><button class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
                                            </td>
                                        </tr>

                                        <div class="modal" id="pop_mat_compra_excluir_<?php echo $dados['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Excluir Material</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>Tem certeza que deseja Excluir o Material <b><?php echo $row_consult2['ds_material'] ?></b>?</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                                        <a id_material="<?php echo $dados['id'] ?>" class="btn btn-primary pull-right del_material_compra">Sim</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="modal modal-default" id="pop_produto_est">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-navy">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Pesquisar Material</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <input type="text" name="referencia_busca" id="referencia_busca_est" class="form-control" placeholder="Código" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Nome Material / Produto</label>
                                    <div class="input-group">
                                        <input type="text" name="descricao_busca" class="form-control pull-left" placeholder="Descrição" id="descricao_busca_est" />
                                        <span class="input-group-btn">
                                            <a class="btn btn-primary pull-right" onClick="pesquisar_produto_est()"><i class="fa fa-search"></i> Pesquisar</a>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-12 table-responsive" id="resultado_produtos_est"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <script>
                function pesquisar_produto_est() {
                    $("#resultado_produtos_est").html('<div align="center"><img src="dist/img/load.gif"</div>');

                    var descricao_busca = $("#descricao_busca_est").val();
                    var referencia_busca = $("#referencia_busca_est").val();
                    var url = 'busca_produtos_compra.php?&descricao_busca=' + descricao_busca + '&referencia_busca=' + referencia_busca + '&id_materialGrupo=<?php echo $row_consult['id_materialGrupo'] ?>&tipo=<?php echo $row_consult['tipo'] ?>';

                    $('#resultado_produtos_est').load(url , function(){ $('#resultado_produtos_est').trigger('create'); });
                }

                function SelecionaProdutoEst(valor,mt_sel) {
                    $("#referencia_est").val(valor);
                    $('#material').val(mt_sel);
                    $('#resultado_produtos_est').empty();
                    $(".modal").modal('hide');
                    $("#qtd").val("1");
                    $("#qtd").focus();
                }

                $(document).on("submit", "#form_add_material_compra", function(evt) {
                    evt.preventDefault(); // Evita o comportamento padrão de envio do formulário

                    var formData = new FormData($(this)[0]); // Cria um objeto FormData para enviar os dados do formulário

                    $.ajax({
                        type: 'POST',
                        url: 'add_material_compra.php',
                        data: formData,
                        processData: false, // Não processar os dados
                        contentType: false, // Não definir o tipo de conteúdo
                        dataType: 'json',
                        success: function(data) {
                            if (data.sucesso == 1) {
                                $('#materiais_compra').load('exibir_materiais_compra.php?id=<?php echo $_GET['id'] ?>', function() {
                                    $('#materiais_est').trigger('create');
                                });
                                $('#form_add_material_compra').trigger("reset");
                            }

                            if (data.sucesso == 2) {
                                alert('Material não disponível na categoria ou inexistente!');
                            }
                        }
                    });
                    return false;
                });


                $('.del_material_compra').click(function() {
                    var id_material = $(this).attr("id_material");
                    $.get("delete_material_compra.php", {id: id_material+""}, function(resposta){
                        $('#pop_mat_compra_excluir_'+id_material).modal('hide');
                        $('#materiais_compra').load('exibir_materiais_compra.php?id=<?php echo $_GET['id'] ?>',function(){ $('#materiais_compra').trigger('create'); });
                    })
                });
            </script>
            <div class="row">
                <div class="col-md-12">
                    <a href="fechar_solicitacao_compra.php?id_compra=<?php echo $_GET['id'] ?>" class="btn btn-primary btn-block">Finalizar Solicitação</a>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include "rodape.php";
    ?>

</div>
</body>
</html>