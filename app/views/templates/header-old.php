<?php /*
$sql_privi = mysqli_query("SELECT * FROM tb_privilegios WHERE id_usuario='".$_SESSION['usuarioID']."'") or die (mysqli_error());
$row_privi = mysqli_fetch_assoc($sql_privi);

$sql_user_foto = mysqli_query("SELECT * FROM tb_usuario WHERE id='".$_SESSION['usuarioID']."'");
$row_user_foto = mysqli_fetch_assoc($sql_user_foto);

if ($row_user_foto['foto'] == "") { $avatar = "dist/img/avatar.png"; }
if ($row_user_foto['foto'] != "") { $avatar = $row_user_foto['foto']; }
*/ ?>
<header class="main-header">
    <!-- Logo -->
    <a href="/dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <div class="logo-mini" align="center"><img src="assets/dist/img/logo_peq.png" class="img-responsive"></div>
        <!-- logo for regular state and mobile devices -->
        <div class="logo-lg" align="center"><img src="assets/dist/img/logo.png" class="img-responsive"></div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle fa-solid fa-bars" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li>
                    <a href="/logout"><i class="fa fa-power-off"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>