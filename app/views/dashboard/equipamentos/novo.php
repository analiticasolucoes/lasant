<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança  
protegePagina(); // Chama a função que protege a página 
include 'conexao.php';
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
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


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
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>

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

   <script src="js/jquery.maskedinput.js"></script>
   <script src="js/jquery.maskMoney.js" type="text/javascript"></script>

<script src="dist/js/valor.js"></script>

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


<script>

$(document).ready(function() {
	
	$('#id_equipGrupoManutencao').change(function() {
	var id_equipGrupoManutencao = $(this).val();
	$('#id_equipSubgrupoManutencao').load('listar_subgrupos.php?id_equipGrupoManutencao='+id_equipGrupoManutencao);
	$('#id_marca_equipamento').load('listar_marcas.php?id_equipGrupoManutencao='+id_equipGrupoManutencao);
	});
	
	
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

	$('#id_marca_equipamento').change(function() {
	var id_marca_equipamento = $(this).val();
	$('#id_modelo_equipamento').load('listar_modelos.php?id_equipMarca='+id_marca_equipamento);
	});	
	
	
});

</script>  


</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<?php
include 'header.php';
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
	
           <form action="add_equipamento.php" method="post" enctype="multipart/form-data" target="_self">
     <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus"></i> Cadastrar Equipamento</h3>


          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          

		  
            <div class="col-md-12">
              <div class="form-group">
                <label>Situação</label>
		<select class="form-control" name="id_equipamentoSituacao" id="id_equipamentoSituacao" required="required">
		<option value="" selected>Selecione</option>		
		<?php
		$sql_cat = mysql_query("SELECT * FROM ta_equipamento_situacao ORDER BY ds_equipamentoSituacao ASC") or die (mysql_error());
		while($row_cat = mysql_fetch_array($sql_cat)) {
		?>
		<option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['ds_equipamentoSituacao'] ?></option>
		<?php
		}
		?>
		</select>
              </div>
            </div>
		  		  

				  
				  
            <div class="col-md-12">
              <div class="form-group">
                <label>Nome Equipamento</label>
					<input class="form-control" type="text" id="nm_equipamento" name="nm_equipamento" placeholder="Nome Equipamento" required="required" />
              </div>
            </div>				  
				  
				  
				  
            <div class="col-md-12">
              <div class="form-group">
                <label>Descrição</label>
					<textarea class="form-control" name="ds_equipamento" id="ds_equipamento" placeholder="Descrição"></textarea>
			  </div>
            </div>
			
				  
				  
            <div class="col-md-4">
              <div class="form-group">
                <label>Série</label>
					<input class="form-control" type="text" id="serie" name="serie" placeholder="Série" />
              </div>
            </div>				  
				  				  
            <div class="col-md-4">
              <div class="form-group">
                <label>Capacidade</label>
					<input class="form-control" type="text" id="sistema" name="sistema" placeholder="Capacidade" />
              </div>
            </div>				  
				  				  
            <div class="col-md-4">
              <div class="form-group">
                <label>Nº Patrimonial</label>
					<input class="form-control" type="text" id="nu_patrimonial" name="nu_patrimonial" placeholder="Nº Patrimonial" />
              </div>
            </div>			

            <div class="col-md-4">
              <div class="form-group">
                <label>Peso</label>
					<input class="form-control" type="text" id="peso" name="peso" placeholder="Peso" />
              </div>
            </div>				  
				  				  
            <div class="col-md-4">
              <div class="form-group">
                <label>Altura</label>
					<input class="form-control" type="text" id="altura" name="altura" placeholder="Altura" />
              </div>
            </div>				  
				  				  
            <div class="col-md-4">
              <div class="form-group">
                <label>Largura</label>
					<input class="form-control" type="text" id="largura" name="largura" placeholder="Largura" />
              </div>
            </div>						
				  				  
				  				  
            <div class="col-md-6">
              <div class="form-group">
                <label>Voltagem Equipamento</label>
					<input class="form-control" type="text" id="voltagem_equipamento" name="voltagem_equipamento" placeholder="Voltagem Equipamento" />
              </div>
            </div>				  
				  				  
            <div class="col-md-6">
              <div class="form-group">
                <label>Potência</label>
					<input class="form-control" type="text" id="potencia" name="potencia" placeholder="Potência" required="required" />
              </div>
            </div>				  
				  				  
				  				  

            <div class="col-md-12">
              <div class="form-group">
                <label>Cliente</label>
		<select class="form-control" id="id_cliente" name="id_cliente" required="required">
		<option value="" selected>Selecione</option>
		<?php
		foreach($clientes_listagem as $value) {
		$sql_cliente = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysql_error());
		$row_cliente = mysql_fetch_assoc($sql_cliente);
		?>
		<option value="<?php echo $row_cliente['id'] ?>"><?php echo $row_cliente['nome_empresa'] ?></option>
		<?php
		}
		?>
		</select>
              </div>
            </div>
 
		  
		  

   <div class="col-md-12">
              <div class="form-group">
                <label>Local</label>
		<select class="form-control" id="id_clienteLocal" name="id_clienteLocal" required="required">

		</select>
              </div>
            </div>


                  
            <div class="col-md-6">
              <div class="form-group">
                <label>Pavimento</label>
		<select class="form-control" id="id_clientePavimento" name="id_clientePavimento" required="required">
		<option value="" selected>Selecione</option>
		</select>
              </div>
            </div>


           <div class="col-md-6">
              <div class="form-group">
                <label>Setor</label>
		<select class="form-control" id="id_clienteSetor" name="id_clienteSetor" required="required">
		<option value="" selected>Selecione</option>
		</select>
              </div>
            </div>				  
				  

		  
            <div class="col-md-6">
              <div class="form-group">
                <label>Grupo</label>
		<select class="form-control" name="id_equipGrupoManutencao" id="id_equipGrupoManutencao" required="required">
		<option value="" selected>Selecione</option>		
		<?php
		$sql_cat = mysql_query("SELECT * FROM ta_equip_grupo_manutencao ORDER BY ds_equipGrupoManutencao ASC") or die (mysql_error());
		while($row_cat = mysql_fetch_array($sql_cat)) {
		?>
		<option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['ds_equipGrupoManutencao'] ?></option>
		<?php
		}
		?>
		</select>
              </div>
            </div>
		  


            <div class="col-md-6">
              <div class="form-group">
                <label>Subgrupo</label>
		<select class="form-control" name="id_equipSubgrupoManutencao" id="id_equipSubgrupoManutencao" required="required">
		</select>
              </div>
            </div>
			
            <div class="col-md-6">
              <div class="form-group">
                <label>Marca</label>
		<select class="form-control" name="id_marca_equipamento" id="id_marca_equipamento" required="required">
		</select>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Modelo</label>
		<select class="form-control" name="id_modelo_equipamento" id="id_modelo_equipamento" required="required">
		</select>
              </div>
            </div>			
			

            <div class="col-md-6">
              <div class="form-group">
                <label>Valor</label>
					<input class="form-control" type="text" id="valor" name="valor" placeholder="Valor" required="required" onkeypress="FormataValor(this.id, 10, event)" />
              </div>
            </div>

			
            <div class="col-md-6">
              <div class="form-group">
                <label>Data Aquisição</label>
					<input class="form-control data" type="text" id="dt_aquisicao" name="dt_aquisicao" placeholder="Data Aquisição" required="required" />
              </div> 
            </div>

			
		  
            <div class="col-md-12">
              <div class="form-group">
                <label>Plano de Manutenção</label>
		<select class="form-control" name="id_plano" id="id_plano" required="required">
		<option value="" selected>Selecione</option>		
		<?php
		$sql_cat = mysql_query("SELECT * FROM tb_plano_manutencao ORDER BY nm_plano ASC") or die (mysql_error());
		while($row_cat = mysql_fetch_array($sql_cat)) {
		?>
		<option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['nm_plano'] ?></option>
		<?php
		}
		?>
		</select>
              </div>
            </div>			
		

            <div class="col-md-4">
              <div class="form-group">
                <label>Foto 1</label>
					<input type="file" name="arquivo" />
			  </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Foto 2</label>
					<input type="file" name="arquivo2" />
			  </div>
            </div>
			
            <div class="col-md-4">
              <div class="form-group">
                <label>Foto 3</label>
					<input type="file" name="arquivo3" />
			  </div>
            </div>
						
            <div class="col-md-4">
              <div class="form-group">
                <label>Arquivo</label>
					<input type="file" name="arquivo4" />
			  </div>
            </div>
						
						
            <div class="col-md-12">
              <div class="form-group">
                <label>Responsável</label>
					<input class="form-control" type="text" id="responsavel" name="responsavel" placeholder="Responsável" required="required" />
              </div>
            </div>				  
				  						
						
			
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
			<div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Adicionar</button>
              </div>
      </div>
      <!-- /.box -->
      		<input type="hidden" value="pesquisar" name="pesquisar" />
		</form>
	
        
        
        
        
      
        
        
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'footer.php';
?>

      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->




</body>
</html>
