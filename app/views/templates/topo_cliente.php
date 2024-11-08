<?php /*
$sql_pr_acesso = mysql_query("SELECT * FROM ta_cliente_operador WHERE id='".$_SESSION['operadorID']."'") or die (mysql_error());
$row_pr_acesso = mysql_fetch_assoc($sql_pr_acesso);

if($row_pr_acesso['primeiro_acesso'] == 0) { echo "<script> alert('Insira uma nova senha para o seu primeiro acesso!'); window.location.href='nova_senha.php'; </script>"; }
*/?>
<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <div class="logo-mini"><img src="assets/dist/img/logo_peq.png" class="img-responsive"></div>
        <!-- logo for regular state and mobile devices -->
        <div class="logo-lg"><img src="assets/dist/img/logo.png" class="img-responsive"></div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
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

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <?php
        /*$sql_cli = mysql_query("SELECT * FROM ta_cliente_fornecedor WHERE id='".$_SESSION['operadorIDCliente']."'") or die (mysql_error());
        $row_cli = mysql_fetch_assoc($sql_cli);

        if($row_pr_acesso['foto'] != '') { $foto = $row_pr_acesso['foto']; }
        if($row_pr_acesso['foto'] == '') { $foto = "assets/dist/img/avatar.png"; }

        if($_SESSION['operadorTipo'] == 1) { $tipo_user = "Simples"; }
        if($_SESSION['operadorTipo'] == 2) { $tipo_user = "Fiscal"; }
        if($_SESSION['operadorTipo'] == 3) { $tipo_user = "Gerente"; }*/
        ?>

        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo "Leandro Souza Ferreira";//echo $_SESSION['operadorNome'] ?></p>
                <?php echo "Operador";//echo $tipo_user ?>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i> <span>Equipamentos</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="solicitacao/equipamento/nova"><i class="fa fa-plus"></i> Criar Solicitação</a></li>
                    <li><a href="solicitacao/lista"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-warning"></i> <span>Solicitações de Serviço</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="solicitacao/servico/nova"><i class="fa fa-plus"></i> Criar Solicitação</a></li>
                    <li><a href="solicitacao/lista"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                    <li><a href="solicitacao/servico/autorizar"><i class="fa fa-thumbs-o-up"></i> Autorizar Solicitações</a></li>
                </ul>
            </li>

            <?php //if($_SESSION['operadorTipo'] != 1) : ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>Ordens de Serviço</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="ordem-servico/lista"><i class="fa fa-search"></i> Verificar OS</a></li>
                        <li><a href="ordem-servico/lista"><i class="fa fa-search"></i> Verificar OS Equipamentos</a></li>
                    </ul>
                </li>
            <?php //endif; ?>
            <li>
                <a href="/relatorios">
                    <i class="fa fa-file-text-o"></i> <span>Relatórios</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Configurações</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="perfil/senha"><i class="fa fa-unlock-alt"></i> Alterar Senha</a></li>
                    <li><a href="perfil/foto"><i class="fa fa-picture-o"></i> Alterar Foto</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Diário de Obras</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/obras"><i class="fa fa-search"></i> Verificar Obras</a></li>
                </ul>
            </li>

            <li>
                <a href="/pmoc">
                    <i class="fa fa-folder"></i> <span>PMOC</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>