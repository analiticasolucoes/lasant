<?php
$id_cliente = $_POST['id_cliente'];
$id_clienteLocal = $_POST['id_clienteLocal'];
$dt_solicitacao = date("Y-m-d H:i:s");
$id_operador = $_SESSION['usuarioID'];
$id_situacao = "0";
$id_materialGrupo = $_POST['id_materialGrupo'];
$id_prioridade = $_POST['id_prioridade'];
$observacoes = $_POST['observacoes'];

$insert = mysqli_query(
"INSERT into
            tb_cotacao (
                id,
                id_cliente,
                id_clienteLocal,
                dt_solicitacao,
                id_operador,
                id_situacao,
                id_materialGrupo,
                id_prioridade,
                observacoes)
        VALUES (
            '',
            '$id_cliente',
            '$id_clienteLocal',
            '$dt_solicitacao',
            '$id_operador',
            '$id_situacao',
            '$id_materialGrupo',
            '$id_prioridade',
            '$observacoes')
        ") or die (mysql_error());

$sql_consult = mysql_query("SELECT * FROM tb_cotacao WHERE id_cliente='$id_cliente' AND id_clienteLocal='$id_clienteLocal' ORDER BY id DESC LIMIT 1");
$row_consult = mysql_fetch_assoc($sql_consult);
$id_compra = $row_consult['id'];

echo "<script> alert('Insira os materiais!'); window.location.href = 'cadastro_compra2.php?id=$id_compra'; </script>";