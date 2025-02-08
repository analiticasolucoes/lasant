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
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome -->
    <script defer src="assets/fontawesome/js/brands.js"></script>
    <script defer src="assets/fontawesome/js/solid.js"></script>
    <script defer src="assets/fontawesome/js/fontawesome.js"></script>
    <!-- jQuery 3.7.1 --> 
    <script src="assets/jquery/3.7.1/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <script src="assets/dist/js/valor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include __DIR__ . '/../../../templates/header.php'; ?>
    <?php include __DIR__ . '/../../../templates/aside.php'; ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> Operadores</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="margin-top:15px;" id="operadores">
                        <div class="col-md-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody><tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Login</th>
                                        <th>Data Cadastro</th>
                                        <th>Data Alteração</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php /* 
                                    $sql_consult = mysql_query("SELECT * FROM ta_cliente_operador ORDER BY id ASC") or die (mysql_error());
                                    while ($dados = mysql_fetch_array($sql_consult)) {
                                        $dt_cadastro = date('d/m/Y H:i:s', strtotime($dados['dt_cadastro']));
                                        $dt_alteracao = date('d/m/Y H:i:s', strtotime($dados['dt_alteracao']));

                                        if($dados['tipo'] == 1) { $tipo = "Simples"; }
                                        if($dados['tipo'] == 2) { $tipo = "Fiscal"; }
                                        if($dados['tipo'] == 3) { $tipo = "Gerente"; }
                                         */  ?>
                                        <tr>
                                            <td><?php /*  echo $dados['nm_operador']  */  ?></td>
                                            <td><?php /*  echo $tipo  */  ?></td>
                                            <td><?php /*  echo $dados['login']  */  ?></td>
                                            <td><?php /*  echo $dt_cadastro  */  ?></td>
                                            <td><?php /*  echo $dt_alteracao  */  ?></td>
                                            <td><?php /*  echo $dados['status']  */  ?></td>
                                            <td><a href="operadores_edit.php?id=<?php /*  echo $dados['id']  */  ?>" class="btn btn-sm btn-info" title="Editar Operador" target="_blank"><span class="fa fa-search"></span></a></td>
                                            <td><a data-toggle="modal" data-target="#pop_oper_excluir_<?php /*  echo $dados['id']  */  ?>"><button class="btn btn-danger"><span class="fa fa-trash"></span></button></a></td>
                                        </tr>
                                        <div class="modal" id="pop_oper_excluir_<?php /*  echo $dados['id']  */  ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Excluir Operador</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>Tem certeza que deseja Excluir o Operador <b><?php /*  echo $dados['nm_operador']  */  ?></b>?</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                                        <a id_operador="<?php /*  echo $dados['id']  */  ?>" class="btn btn-primary pull-right del_operador">Sim</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <?php /*
                                    }
                                     */  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
            <!-- FUNÇÕES DE OPERADORES  -->
            <?php /*
            $sql_consult = mysql_query("SELECT * FROM ta_cliente_operador WHERE id < 0 ORDER BY id ASC") or die (mysql_error());
            while ($dados = mysql_fetch_array($sql_consult)) {
                if($dados['tipo'] == 1) { $tipo = "Simples"; }
                if($dados['tipo'] == 2) { $tipo = "Fiscal"; }
                if($dados['tipo'] == 3) { $tipo = "Gerente"; }

                $id_cliente = explode(" , ",$dados['id_cliente']);
                $locais = explode(" , ",$dados['locais']);
                 */  ?>
                <div class="modal" id="modal_oper_<?php /*  echo $dados['id']  */  ?>">
                    <form method="post" enctype="multipart/form-data" target="_self" id="form_operador_<?php /*  echo $dados['id']  */  ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Editar Operador</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_operador" value="<?php /*  echo $dados['id']  */  ?>" />
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tipo de Operador</label>
                                            <select class="form-control" id="tipo" name="tipo" required="required">
                                                <option value="<?php /*  echo $dados['tipo']  */  ?>" selected><?php /*  echo $tipo  */  ?></option>
                                                <option value="1">Simples</option>
                                                <option value="2">Fiscal</option>
                                                <option value="3">Gerente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" name="nm_operador" class="form-control" placeholder="Nome" value="<?php /*  echo $dados['nm_operador']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" class="form-control cpf" placeholder="CPF" value="<?php /*  echo $dados['cpf']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Matrícula</label>
                                            <input type="text" name="matricula" class="form-control" placeholder="Matrícula" value="<?php /*  echo $dados['matricula']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ramal</label>
                                            <input type="text" name="ramal" class="form-control" placeholder="Ramal" value="<?php /*  echo $dados['ramal']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="<?php /*  echo $dados['telefone']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php /*  echo $dados['email']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Login</label>
                                            <input type="text" name="login" class="form-control" placeholder="Login" value="<?php /*  echo $dados['login']  */  ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" name="psw" class="form-control" placeholder="Senha" value="<?php /*  echo base64_decode($dados['psw']);  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Assinatura</label>
                                            <input type="file" id="arquivo" name="arquivo" />
                                            <input type="hidden" name="assinatura_antiga" value="<?php /*  echo $dados['assinatura_digitalizada']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Rúbrica</label>
                                            <input type="file" id="arquivo2" name="arquivo2" />
                                            <input type="hidden" name="rubrica_antiga" value="<?php /*  echo $dados['rubrica_digital']  */  ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" id="status" name="status" required="required">
                                                <option value="<?php /*  echo $dados['status']  */  ?>" selected><?php /*  echo $dados['status']  */  ?></option>
                                                <option value="Ativo">Ativo</option>
                                                <option value="Inativo">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr style="border-bottom:1px dotted #ccc;" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Clientes para Acesso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <?php /*
                                        $sql_consult3 = mysql_query("SELECT * FROM ta_cliente_fornecedor ORDER BY id ASC") or die (mysql_error());
                                        while ($row = mysql_fetch_array($sql_consult3)) {
                                            if (in_array($row['id'],$id_cliente) == true) { $checked = "checked"; } else { $checked = ""; }
                                         */  ?>
                                            <div class="col-md-3">
                                                <input type="checkbox" name="id_cliente[]" value="<?php /*  echo $row['id']  */  ?>" <?php /*  echo $checked  */  ?> />  <?php /*  echo $row['nome_empresa']  */  ?>
                                            </div>
                                        <?php /* } */  ?>
                                    </div>
                                    <div class="col-md-12">
                                        <hr style="border-bottom:1px dotted #ccc;" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Locais para Acesso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <?php /*
                                        $sql_consult3 = mysql_query("SELECT * FROM ta_cliente_local ORDER BY ds_clienteLocal ASC") or die (mysql_error());
                                        while ($row = mysql_fetch_array($sql_consult3)) {
                                            if (in_array($row['id'],$locais) == true) { $checked = "checked"; } else { $checked = ""; }
                                             */  ?>
                                            <div class="col-md-4">
                                                <input type="checkbox" name="locais[]" value="<?php /*  echo $row['id']  */  ?>" <?php /*  echo $checked  */  ?> /> <?php /*  echo $row['ds_clienteLocal']  */  ?>
                                            </div>
                                            <?php /* } */  ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    <input type="submit" value="Atualizar" class="btn btn-primary" />
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </form>
                </div>
                <script>
                    $(document).on("submit", "#form_operador_<?php /*  echo $dados['id']  */  ?>", function(evt) {
                        evt.preventDefault();

                        var formData = new FormData($(this)[0]);

                        $.ajax({
                            type : 'POST', /* Tipo da requisi��o */
                            url : 'atualizar_operador.php', /* URL que ser� chamada */
                            data: formData,
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(data){

                                $('#operadores').load('exibir_operadores.php',function(){ $('#operadores').trigger('create'); });
                                $('#modal_oper_<?php /*  echo $dados["id"]  */  ?>').modal('hide');
                            }
                        });

                        return false;
                    });
                </script>
                <?php /* } */  ?>

            <script>
                $(document).on("submit", "#form_operador", function(evt)
                {
                    evt.preventDefault();

                    var formData = new FormData($(this)[0]);

                    $.ajax({
                        type : 'POST', /* Tipo da requisicao */
                        url : 'add_operador.php', /* URL que sera chamada */
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(data){

                            if(data.sucesso == 1){
                                $('#operadores').load('exibir_operadores.php',function(){ $('#operadores').trigger('create'); });
                                $('#form_operador').trigger("reset");
                            }

                            if(data.sucesso == 2){
                                alert('Login ja cadastrado! Por favor escolha outro login!');
                            }
                        }
                    });

                    return false;
                });

                $('.del_operador').click(function() {
                    var id_operador = $(this).attr("id_operador");

                    $.get("delete_operador.php", {id: id_operador+""}, function(resposta){
                        $('#pop_oper_excluir_'+id_operador).modal('hide');
                        $('#operadores').load('exibir_operadores.php',function(){ $('#operadores').trigger('create'); });
                    })
                });
            </script>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    //include "funcoes_cliente.php";

    include __DIR__ . '/../../../templates/footer.php';
    ?>
</div>
</body>
</html>