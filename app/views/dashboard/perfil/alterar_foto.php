<?php
$_UP['extensoes'] = array('png','PNG','jpg','JPG','bmp','BMP','jpeg','JPEG','gif','GIF');
$pasta = 'fotos/';

$tmp_name = $_FILES["arquivo"]["tmp_name"];
$temp = substr(md5(uniqid(time())), 0, 10);
$titulo = $_FILES["arquivo"]["name"];
$extensao = strtolower(end(explode('.', $_FILES["arquivo"]["name"])));
$cod = $pasta . date('dmy') . '-' . $temp . '.' . $extensao;
$uploadfile = $pasta . basename($cod);
$uploadfile2 = 'fotos/' . basename($cod);
if (!in_array($extensao, $_UP['extensoes'])) {
    $foto = "";
}
else {
    move_uploaded_file($tmp_name, $uploadfile);
    $foto = $uploadfile2;
}
$uper = mysql_query("UPDATE tb_usuario SET foto='$foto' WHERE id='".$_SESSION['usuarioID']."'") or die (mysql_error());

echo "<script> alert('Foto alterada com sucesso!'); window.location.href = 'mudar_avatar.php'; </script>";