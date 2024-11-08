<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança  
protegePagina(); // Chama a função que protege a página 
?>
<?php
    include "conexao.php";

	$id = $_POST['id_cliente'];
	$tipo = $_POST['tipo'];
	$nome_empresa = $_POST['nome_empresa'];
	$nome_fantasia = $_POST['nome_fantasia'];
	$ds_cliente = $_POST['ds_cliente'];
	$id_esfera = $_POST['id_esfera'];
	$cnpj = $_POST['cnpj'];
	$email_engenharia = $_POST['email_engenharia'];
	$email_os_cc = $_POST['email_os_cc'];
	$email_os_bcc = $_POST['email_os_bcc'];
	$email_ss_cc = $_POST['email_ss_cc'];
	$email_ss_bcc = $_POST['email_ss_bcc'];
	$email_compras = $_POST['email_compras'];	
	$dt_inicontrato = implode("-",array_reverse(explode("/",$_POST['dt_inicontrato'])));
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$complemento_endereco = $_POST['complemento_endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$inscricao_estadual = $_POST['inscricao_estadual'];
	$inscricao_municipal = $_POST['inscricao_municipal'];
	$telefone1 = $_POST['telefone1'];
	$telefone2 = $_POST['telefone2'];
	$telefone3 = $_POST['telefone3'];
	$telefone_celular = $_POST['telefone_celular'];
	$modelo_os = $_POST['modelo_os'];
	$celulares = $_POST['celulares'];
	$zap = $_POST['telefone_zap'];




 $_UP['extensoes'] = array('png','PNG','jpg','JPG','bmp','BMP','jpeg','JPEG','gif','GIF');
 $pasta = 'fotos/';

 $tmp_name = $_FILES["arquivo"]["tmp_name"];
 $temp = substr(md5(uniqid(time())), 0, 10);
 $titulo = $_FILES["arquivo"]["name"];
 $extensao = strtolower(end(explode('.',$_FILES["arquivo"]["name"])));
 $cod = $pasta . date('dmy') . '-' . $temp . '.' . $extensao;
 $uploadfile = $pasta . basename($cod);
 $uploadfile2 = 'fotos/' . basename($cod);
 if (array_search($extensao, $_UP['extensoes']) === false) {
	$logomarca_clifor = $_POST['arquivo_antigo'];
 } 
 else {
 move_uploaded_file($tmp_name, $uploadfile);
	$logomarca_clifor = $uploadfile2;
 }



	$sql_consult = mysql_query("UPDATE ta_cliente_fornecedor SET tipo='$tipo', nome_empresa='$nome_empresa', nome_fantasia='$nome_fantasia', ds_cliente='$ds_cliente', id_esfera='$id_esfera', cnpj='$cnpj', email_engenharia='$email_engenharia', email_os_cc='$email_os_cc', email_os_bcc='$email_os_bcc', email_ss_cc='$email_ss_cc', email_ss_bcc='$email_ss_bcc', dt_inicontrato='$dt_inicontrato', rua='$rua', numero='$numero', complemento_endereco='$complemento_endereco', bairro='$bairro', cidade='$cidade', uf='$uf', cep='$cep', inscricao_estadual='$inscricao_estadual', inscricao_municipal='$inscricao_municipal', telefone1='$telefone1', telefone2='$telefone2', telefone3='$telefone3', telefone_celular='$telefone_celular', logomarca_clifor='$logomarca_clifor', modelo_os='$modelo_os', celulares='$celulares', email_compras='$email_compras', zap='$zap' WHERE id='$id'") or die (mysql_error());



	echo "<script> alert('Cliente Atualizado com sucesso'); window.location.href = 'ficha_cliente.php?id=$id'; </script>";


?>
