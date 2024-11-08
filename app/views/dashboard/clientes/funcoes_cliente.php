<!-- FUNÇÕES DE LOCAIS  -->
<?php
$sql_consult = mysql_query("SELECT * FROM ta_cliente_local WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {
    ?>
    <script>
        $(document).ready( function() {
            $('#cep_local_<?php echo $dados['id'] ?>').blur(function(){
                /* Configura a requisição AJAX */
                $.ajax({
                    url : 'consultar_cep.php', /* URL que será chamada */
                    type : 'POST', /* Tipo da requisição */
                    data: 'cep=' + $('#cep_local_<?php echo $dados['id'] ?>').val(), /* dado que será enviado via POST */
                    dataType: 'json', /* Tipo de transmissão */
                    success: function(data){
                        if(data.sucesso == 1){
                            $('#rua_local_<?php echo $dados['id'] ?>').val(data.endereco);
                            $('#bairro_local_<?php echo $dados['id'] ?>').val(data.bairro);
                            $('#cidade_local_<?php echo $dados['id'] ?>').val(data.cidade);
                            $('#uf_local_<?php echo $dados['id'] ?>').append('<option value="'+data.estado+'" selected="selected">'+data.estado+'</option>');

                            $('#numero_local_<?php echo $dados['id'] ?>').focus();
                        }
                    }
                });
                return false;
            })

            $('#numero_local_<?php echo $dados['id'] ?>').blur(function() {
                var bairrobusca = $('#rua_local_<?php echo $dados['id'] ?>').val()+','+$('#numero_local_<?php echo $dados['id'] ?>').val()+','+$('#bairro_local_<?php echo $dados['id'] ?>').val()+','+$('#cidade_local_<?php echo $dados['id'] ?>').val()+','+$('#uf_local_<?php echo $dados['id'] ?>').val();
                $.getJSON('http://maps.google.com/maps/api/geocode/json?address='+bairrobusca, function(data) {
                    var latitude = data.results[0].geometry.location.lat;
                    var longitude = data.results[0].geometry.location.lng;

                    $('#latitude_<?php echo $dados['id'] ?>').val(latitude);
                    $('#longitude_<?php echo $dados['id'] ?>').val(longitude);
                });
            });
        });// JavaScript Document
    </script>

    <div class="modal" id="modal_local_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_local_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Local</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_local" value="<?php echo $dados['id'] ?>" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Local</label>
                                <input type="text" name="ds_clienteLocal" class="form-control" placeholder="Local" value="<?php echo $dados['ds_clienteLocal'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CEP *</label>
                                <input type="text" name="cep" class="form-control" placeholder="CEP" id="cep_local_<?php echo $dados['id'] ?>" value="<?php echo $dados['cep'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" name="bairro" id="bairro_local_<?php echo $dados['id'] ?>" class="form-control" placeholder="Bairro" value="<?php echo $dados['bairro'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logradouro *</label>
                                <input type="text" name="rua" id="rua_local_<?php echo $dados['id'] ?>" class="form-control" placeholder="Rua" value="<?php echo $dados['rua'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nº</label>
                                <input type="text" name="numero" id="numero_local_<?php echo $dados['id'] ?>" class="form-control" placeholder="Nº" value="<?php echo $dados['numero'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" name="complemento_endereco" id="complemento_endereco_local_<?php echo $dados['id'] ?>" class="form-control" placeholder="Complemento" value="<?php echo $dados['complemento_endereco'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>UF</label>
                                <select name="uf" class="form-control" id="uf_local_<?php echo $dados['id'] ?>" >
                                    <option selected="selected" value="<?php echo $dados['uf'] ?>"><?php echo $dados['uf'] ?></option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AM">AM</option>
                                    <option value="AP">AP</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MG">MG</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="PR">PR</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="RS">RS</option>
                                    <option value="SC">SC</option>
                                    <option value="SE">SE</option>
                                    <option value="SP">SP</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" name="cidade" id="cidade_local_<?php echo $dados['id'] ?>" class="form-control" placeholder="Cidade" value="<?php echo $dados['cidade'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" id="latitude_<?php echo $dados['id'] ?>" class="form-control" placeholder="Latitude" value="<?php echo $dados['latitude'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" id="longitude_<?php echo $dados['id'] ?>" class="form-control" placeholder="Longitude" value="<?php echo $dados['longitude'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Área Total</label>
                                <input type="text" name="area_total" id="area_total" class="form-control" placeholder="Área Total" value="<?php echo $dados['area_total'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Área Construída</label>
                                <input type="text" name="area_construida" id="area_construida" class="form-control" placeholder="Área Construída" value="<?php echo $dados['area_construida'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contato</label>
                                <input type="text" name="contato" id="contato" class="form-control" placeholder="Contato" value="<?php echo $dados['contato'] ?>"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tel Contato</label>
                                <input type="text" name="tel_contato" id="tel_contato" class="form-control" placeholder="Tel Contato" value="<?php echo $dados['tel_contato'] ?>"  />
                            </div>
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
        $(document).on("submit", "#form_local_<?php echo $dados['id'] ?>", function(evt)
        {
            var dados = $("#form_local_<?php echo $dados['id'] ?>").serialize();
            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_local.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){
                    $('#locais').load('exibir_locais.php?id=<?php echo $_GET['id'] ?>',function(){ $('#locais').trigger('create'); });
                    $('#modal_local_<?php echo $dados["id"] ?>').modal('hide');
                    $('#id_clienteLocal').empty();
                    $('#id_clienteLocal').load('listar_locais_cliente.php?id=<?php echo $_GET['id'] ?>');
                }
            });
            return false;
        });
    </script>
    <?php
}
?>

<script>
    $(document).on("submit", "#form_local", function(evt)
    {
        var dados = $('#form_local').serialize();
        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_local.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){
                $('#locais').load('exibir_locais.php?id=<?php echo $_GET['id'] ?>',function(){ $('#locais').trigger('create'); });
                $('#form_local').trigger("reset");
                $('#id_clienteLocal').empty();
                $('#id_clienteLocal').load('listar_locais_cliente.php?id=<?php echo $_GET['id'] ?>');
            }
        });
        return false;
    });

    $('.del_local').click(function() {
        var id_local = $(this).attr("id_local");
        $.get("delete_local.php", {id: id_local+""}, function(resposta){
            $('#pop_local_excluir_'+id_local).modal('hide');
            $('#locais').load('exibir_locais.php?id=<?php echo $_GET['id'] ?>',function(){ $('#locais').trigger('create'); });
            $('#id_clienteLocal').empty();
            $('#id_clienteLocal').load('listar_locais_cliente.php?id=<?php echo $_GET['id'] ?>');
        })
    });
</script>

<!-- FUNÇÕES DE LOCAIS ENTREGA -->
<script>
    $(document).ready( function() {
        $('#cep_entrega').blur(function(){
            /* Configura a requisição AJAX */
            $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */
                data: 'cep=' + $('#cep_entrega').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua_entrega').val(data.endereco);
                        $('#bairro_entrega').val(data.bairro);
                        $('#cidade_entrega').val(data.cidade);
                        $('#uf_entrega').append('<option value="'+data.estado+'" selected="selected">'+data.estado+'</option>');
                        $('#numero_entrega').focus();
                    }
                }
            });
            return false;
        })
    });// JavaScript Document
</script>

<?php
$sql_consult = mysql_query("SELECT * FROM ta_cliente_local_entrega WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {
    ?>

    <script>
        $(document).ready( function() {

            $('#cep_entrega_<?php echo $dados['id'] ?>').blur(function(){
                /* Configura a requisição AJAX */
                $.ajax({
                    url : 'consultar_cep.php', /* URL que será chamada */
                    type : 'POST', /* Tipo da requisição */
                    data: 'cep=' + $('#cep_entrega_<?php echo $dados['id'] ?>').val(), /* dado que será enviado via POST */
                    dataType: 'json', /* Tipo de transmissão */
                    success: function(data){
                        if(data.sucesso == 1){
                            $('#rua_entrega_<?php echo $dados['id'] ?>').val(data.endereco);
                            $('#bairro_entrega_<?php echo $dados['id'] ?>').val(data.bairro);
                            $('#cidade_entrega_<?php echo $dados['id'] ?>').val(data.cidade);
                            $('#uf_entrega_<?php echo $dados['id'] ?>').append('<option value="'+data.estado+'" selected="selected">'+data.estado+'</option>');

                            $('#numero_entrega_<?php echo $dados['id'] ?>').focus();
                        }
                    }
                });
                return false;
            })


        });// JavaScript Document

    </script>


    <div class="modal" id="modal_local_entrega_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_local_entrega_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Local de Entrega</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_local_entrega" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Local</label>
                                <input type="text" name="local" class="form-control" placeholder="Local" value="<?php echo $dados['local'] ?>" />
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CEP *</label>
                                <input type="text" name="cep" class="form-control" placeholder="CEP" id="cep_entrega_<?php echo $dados['id'] ?>" value="<?php echo $dados['cep'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" name="bairro" id="bairro_entrega_<?php echo $dados['id'] ?>" class="form-control" placeholder="Bairro" value="<?php echo $dados['bairro'] ?>"  />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logradouro *</label>
                                <input type="text" name="rua" id="rua_entrega_<?php echo $dados['id'] ?>" class="form-control" placeholder="Rua" value="<?php echo $dados['rua'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nº</label>
                                <input type="text" name="numero" id="numero_entrega_<?php echo $dados['id'] ?>" class="form-control" placeholder="Nº" value="<?php echo $dados['numero'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" name="complemento_endereco" id="complemento_entrega_local_<?php echo $dados['id'] ?>" class="form-control" placeholder="Complemento" value="<?php echo $dados['complemento_endereco'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>UF</label>
                                <select name="uf" class="form-control" id="uf_entrega_<?php echo $dados['id'] ?>" >
                                    <option selected="selected" value="<?php echo $dados['uf'] ?>"><?php echo $dados['uf'] ?></option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AM">AM</option>
                                    <option value="AP">AP</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MG">MG</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="PR">PR</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="RS">RS</option>
                                    <option value="SC">SC</option>
                                    <option value="SE">SE</option>
                                    <option value="SP">SP</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" name="cidade" id="cidade_entrega_<?php echo $dados['id'] ?>" class="form-control" placeholder="Cidade" value="<?php echo $dados['cidade'] ?>"  />
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contato</label>
                                <input type="text" name="contato" id="contato" class="form-control" placeholder="Contato" value="<?php echo $dados['contato'] ?>"  />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tel Contato</label>
                                <input type="text" name="tel_contato" id="tel_contato" class="form-control" placeholder="Tel Contato" value="<?php echo $dados['tel_contato'] ?>"  />
                            </div>
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
        $(document).on("submit", "#form_local_entrega_<?php echo $dados['id'] ?>", function(evt)
        {


            var dados = $("#form_local_entrega_<?php echo $dados['id'] ?>").serialize();

            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_local_entrega.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){

                    $('#locais_entrega').load('exibir_locais_entrega.php?id=<?php echo $_GET['id'] ?>',function(){ $('#locais_entrega').trigger('create'); });
                    $('#modal_local_entrega_<?php echo $dados["id"] ?>').modal('hide');


                }
            });



            return false;

        });

    </script>


    <?php
}
?>







<script>

    $(document).on("submit", "#form_local_entrega", function(evt)
    {


        var dados = $('#form_local_entrega').serialize();

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_local_entrega.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){

                $('#locais_entrega').load('exibir_locais_entrega.php?id=<?php echo $_GET['id'] ?>',function(){ $('#locais_entrega').trigger('create'); });
                $('#form_local_entrega').trigger("reset");


            }
        });



        return false;

    });

    $('.del_local_entrega').click(function() {

        var id_local_entrega = $(this).attr("id_local_entrega");

        $.get("delete_local_entrega.php", {id: id_local_entrega+""}, function(resposta){
            $('#pop_local_entrega_excluir_'+id_local_entrega).modal('hide');
            $('#locais_entrega').load('exibir_locais_entrega.php?id=<?php echo $_GET['id'] ?>',function(){ $('#locais_entrega').trigger('create'); });
        })


    });

</script>





































<!-- FUNÇÕES DE LOCAIS  -->

<?php
$sql_consult = mysql_query("SELECT * FROM ta_financeiro_fornecedor WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {

    ?>

    <div class="modal" id="modal_financeiro_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_banco_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Banco</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_banco" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Banco</label>
                                <input type="text" name="banco" class="form-control" placeholder="Banco" value="<?php echo $dados['banco'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Agência</label>
                                <input type="text" name="agencia" class="form-control" placeholder="Agência" value="<?php echo $dados['agencia'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Conta</label>
                                <input type="text" name="conta" class="form-control" placeholder="Conta" value="<?php echo $dados['conta'] ?>" />
                            </div>
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
        $(document).on("submit", "#form_banco_<?php echo $dados['id'] ?>", function(evt)
        {


            var dados = $("#form_banco_<?php echo $dados['id'] ?>").serialize();

            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_banco.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){

                    $('#bancos').load('exibir_bancos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#bancos').trigger('create'); });
                    $('#modal_financeiro_<?php echo $dados["id"] ?>').modal('hide');



                }
            });



            return false;

        });

    </script>


    <?php
}
?>







<script>

    $(document).on("submit", "#form_banco", function(evt)
    {


        var dados = $('#form_banco').serialize();

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_banco.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){

                $('#bancos').load('exibir_bancos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#bancos').trigger('create'); });
                $('#form_banco').trigger("reset");

            }
        });



        return false;

    });

    $('.del_banco').click(function() {

        var id_banco = $(this).attr("id_banco");

        $.get("delete_banco.php", {id: id_banco+""}, function(resposta){
            $('#pop_financeiro_excluir_'+id_banco).modal('hide');
            $('#bancos').load('exibir_bancos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#bancos').trigger('create'); });
        })


    });

</script>








































<!-- FUNÇÕES DE PAVIMENTOS  -->


<?php
$sql_consult = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {

    $sql_local = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$dados['id_clienteLocal']."'") or die (mysql_error());
    $row_local = mysql_fetch_assoc($sql_local);
    $local = $row_local['ds_clienteLocal'];

    ?>

    <div class="modal" id="modal_pav_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_pavimento_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Pavimento</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_pavimento" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Local</label>
                                <select class="form-control" id="id_clienteLocal" name="id_clienteLocal">
                                    <option value="<?php echo $dados['id_clienteLocal'] ?>" selected><?php echo $local ?></option>
                                    <?php
                                    $sql_grupo = mysql_query("SELECT * FROM ta_cliente_local ORDER BY ds_clienteLocal") or die (mysql_error());
                                    while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                        ?>
                                        <option value="<?php echo $row_grupo['id'] ?>"><?php echo $row_grupo['ds_clienteLocal'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pavimento</label>
                                <input type="text" name="ds_clientePavimento" class="form-control" placeholder="Pavimento" id="ds_clientePavimento" value="<?php echo $dados['ds_clientePavimento'] ?>" />
                            </div>
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
        $(document).on("submit", "#form_pavimento_<?php echo $dados['id'] ?>", function(evt)
        {


            var dados = $("#form_pavimento_<?php echo $dados['id'] ?>").serialize();

            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_pavimento.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){

                    $('#pavimentos').load('exibir_pavimentos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
                    $('#modal_pav_<?php echo $dados["id"] ?>').modal('hide');
                    $('#id_clientePavimento').empty();
                    $('#id_clientePavimento').load('listar_pavimentos_cliente.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });


                }
            });



            return false;

        });

    </script>


    <?php
}
?>








<script>

    $(document).on("submit", "#form_pavimento", function(evt)
    {


        var dados = $('#form_pavimento').serialize();

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_pavimento.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){

                $('#pavimentos').load('exibir_pavimentos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
                $('#form_pavimento').trigger("reset");
                $('#id_clientePavimento').empty();
                $('#id_clientePavimento').load('listar_pavimentos_cliente.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });


            }
        });



        return false;

    });


    $('.ativ_pavimento').click(function() {

        var id_pavimento = $(this).attr("id_pavimento");

        $.get("ativar_pavimento.php", {id: id_pavimento+""}, function(resposta){
            $('#pop_pav_ativ_'+id_pavimento).modal('hide');
            $('#pavimentos').load('exibir_pavimentos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
            $('#id_clientePavimento').empty();
            $('#id_clientePavimento').load('listar_pavimentos_cliente.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
        })


    });

    $('.desa_pavimento').click(function() {

        var id_pavimento = $(this).attr("id_pavimento");

        $.get("desativar_pavimento.php", {id: id_pavimento+""}, function(resposta){
            $('#pop_pav_desa_'+id_pavimento).modal('hide');
            $('#pavimentos').load('exibir_pavimentos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
            $('#id_clientePavimento').empty();
            $('#id_clientePavimento').load('listar_pavimentos_cliente.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
        })


    });


    $('.del_pavimento').click(function() {

        var id_pavimento = $(this).attr("id_pavimento");

        $.get("delete_pavimento.php", {id: id_pavimento+""}, function(resposta){
            $('#pop_pav_excluir_'+id_pavimento).modal('hide');
            $('#pavimentos').load('exibir_pavimentos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
            $('#id_clientePavimento').empty();
            $('#id_clientePavimento').load('listar_pavimentos_cliente.php?id=<?php echo $_GET['id'] ?>',function(){ $('#pavimentos').trigger('create'); });
        })


    });

</script>



























<!-- FUNÇÕES DE SETORES  -->
<?php

if($_POST['nm_setor'] == ''){
    $sql_consult = mysql_query("SELECT cs.*,cp.ds_clientePavimento, cl.ds_clienteLocal FROM ta_cliente_setor cs, ta_cliente_pavimento cp, ta_cliente_local cl WHERE cs.id_clientePavimento = cp.id AND cp.id_clienteLocal=cl.id AND cs.id_cliente='".$_GET['id']."' AND cs.id = 0 ORDER BY cs.id ASC") or die (mysql_error());
}
else{
    //$sql_consult = mysql_query("SELECT cs.*,cp.ds_clientePavimento, cl.ds_clienteLocal FROM ta_cliente_setor cs, ta_cliente_pavimento cp, ta_cliente_local cl WHERE cs.id_clientePavimento = cp.id AND cp.id_clienteLocal=cl.id AND cs.id_cliente='".$_GET['id']."' AND cs.ds_clienteSetor like '%".$_POST['nm_setor']."%' AND cp.ds_clientePavimento like '%".$_POST['nm_setor']."%' ORDER BY cs.id ASC") or die (mysql_error());
    $sql_consult = mysql_query("SELECT cs.*,cp.ds_clientePavimento, cl.ds_clienteLocal FROM ta_cliente_setor cs, ta_cliente_pavimento cp, ta_cliente_local cl WHERE cs.id_clientePavimento = cp.id AND cp.id_clienteLocal=cl.id AND cs.id_cliente='".$_GET['id']."' AND cs.ds_clienteSetor like '%".$_POST['nm_setor']."%' ORDER BY cs.id ASC") or die (mysql_error());
}

//$sql_consult = mysql_query("SELECT * FROM ta_cliente_setor WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {

//$sql_pav = mysql_query("SELECT * FROM ta_cliente_pavimento WHERE id='".$dados['id_clientePavimento']."'") or die (mysql_error());
//$row_pav = mysql_fetch_assoc($sql_pav);
//$pavimento = $row_pav['ds_clientePavimento'];  
    ?>

    <form method="post" enctype="multipart/form-data" target="_self" id="form_setor_<?php echo $dados['id'] ?>">
        <div class="modal" id="modal_set_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Setor</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_setor" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pavimento</label>
                                <select class="form-control" id="id_clientePavimento" name="id_clientePavimento">
                                    <option value="<?php echo $dados['id_clientePavimento'] ?>" selected><?php echo $dados['ds_clientePavimento'] ?></option>
                                    <?php
                                    $sql_grupo = mysql_query("SELECT * FROM ta_cliente_pavimento ORDER BY ds_clientePavimento") or die (mysql_error());
                                    while ($row_grupo = mysql_fetch_array($sql_grupo)) {

                                        $sql_local = mysql_query("SELECT * FROM ta_cliente_local WHERE id='".$row_grupo['id_clienteLocal']."'") or die (mysql_error());
                                        $row_local = mysql_fetch_assoc($sql_local);
                                        ?>
                                        <option value="<?php echo $row_grupo['id'] ?>">(<?php echo $row_local['ds_clienteLocal'] ?>) <?php echo $row_grupo['ds_clientePavimento'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Setor</label>
                                <input type="text" name="ds_clienteSetor" class="form-control" placeholder="Setor" id="ds_clienteSetor" value="<?php echo $dados['ds_clienteSetor'] ?>" />
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ocupantes Fixos</label>
                                <input type="text" name="ocupantes_fixos" class="form-control" placeholder="Ocupantes Fixos" id="ocupantes_fixos" value="<?php echo $dados['ocupantes_fixos'] ?>" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ocupantes Flutuantes</label>
                                <input type="text" name="ocupantes_flutuantes" class="form-control" placeholder="Ocupantes Flutuantes" id="ocupantes_flutuantes" value="<?php echo $dados['ocupantes_flutuantes'] ?>" />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Largura</label>
                                <input type="text" name="largura" class="form-control" placeholder="Largura" id="largura" value="<?php echo $dados['largura'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Comprimento</label>
                                <input type="text" name="comprimento" class="form-control" placeholder="Comprimento" id="comprimento" value="<?php echo $dados['comprimento'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Altura</label>
                                <input type="text" name="altura" class="form-control" placeholder="Altura" id="altura" value="<?php echo $dados['altura'] ?>" />
                            </div>
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
        </div>
    </form>

    <script>
        $(document).on("submit", "#form_setor_<?php echo $dados['id'] ?>", function(evt)
        {


            var dados = $("#form_setor_<?php echo $dados['id'] ?>").serialize();

            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_setor.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){

                    $('#setores').load('exibir_setores.php?id=<?php echo $_GET["id"] ?>&nm_setor=',function(){ $('#setores').trigger('create'); });
                    $('#modal_set_<?php echo $dados["id"] ?>').modal('hide');


                }
            });



            return false;

        });

    </script>

    <?php
}
?>

<script>

    $(document).on("submit", "#form_setor", function(evt)
    {


        var dados = $('#form_setor').serialize();

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_setor.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){

                $('#setores').load('exibir_setores.php?id=<?php echo $_GET['id'] ?>&nm_setor=',function(){ $('#setores').trigger('create'); });
                $('#form_setor').trigger("reset");


            }
        });



        return false;

    });


    $('.ativ_setor').click(function() {

        var id_setor = $(this).attr("id_setor");

        $.get("ativar_setor.php", {id: id_setor+""}, function(resposta){
            $('#pop_set_ativ_'+id_setor).modal('hide');
            $('#setores').load('exibir_setores.php?id=<?php echo $_GET['id'] ?>&nm_setor=',function(){ $('#setores').trigger('create'); });
        })


    });


    $('.desa_setor').click(function() {

        var id_setor = $(this).attr("id_setor");

        $.get("desativar_setor.php", {id: id_setor+""}, function(resposta){
            $('#pop_set_desa_'+id_setor).modal('hide');
            $('#setores').load('exibir_setores.php?id=<?php echo $_GET['id'] ?>&nm_setor=',function(){ $('#setores').trigger('create'); });
        })


    });



    $('.del_setor').click(function() {

        var id_setor = $(this).attr("id_setor");

        $.get("delete_setor.php", {id: id_setor+""}, function(resposta){
            $('#pop_set_excluir_'+id_setor).modal('hide');
            $('#setores').load('exibir_setores.php?id=<?php echo $_GET['id'] ?>&nm_setor=',function(){ $('#setores').trigger('create'); });
        })


    });



</script>

























<!-- FUNÇÕES DE PROFISSIONAIS  -->


<?php
$sql_consult = mysql_query("SELECT * FROM ta_cliente_profissional WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {

    $sql_pav = mysql_query("SELECT * FROM ta_profissional WHERE id='".$dados['id_profissional']."'") or die (mysql_error());
    $row_pav = mysql_fetch_assoc($sql_pav);
    $nome_profissional = $row_pav['nm_profissional'];

    $dt_inicio = implode("/",array_reverse(explode("-",$dados['dt_inicio'])));
    $dt_termino = implode("/",array_reverse(explode("-",$dados['dt_termino'])));

    ?>


    <div class="modal" id="modal_profi_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_profissional_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Profissional</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_profissional_cliente" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Profissional</label>
                                <select class="form-control" id="id_profissional" name="id_profissional">
                                    <option value="<?php echo $dados['id_profissional'] ?>" selected><?php echo $nome_profissional ?></option>
                                    <?php
                                    $sql_grupo = mysql_query("SELECT * FROM ta_profissional WHERE status='Ativo' ORDER BY nm_profissional") or die (mysql_error());
                                    while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                        ?>
                                        <option value="<?php echo $row_grupo['id'] ?>"><?php echo $row_grupo['nm_profissional'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de Início</label>
                                <input class="form-control data" type="text" id="dt_inicio" name="dt_inicio" placeholder="Data de Início" value="<?php echo $dt_inicio ?>" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de Término</label>
                                <input class="form-control data" type="text" id="dt_termino" name="dt_termino" placeholder="Data de Término" value="<?php echo $dt_termino ?>" />
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="<?php echo $dados['status'] ?>" selected><?php echo $dados['status'] ?></option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
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
        $(document).on("submit", "#form_profissional_<?php echo $dados['id'] ?>", function(evt)
        {


            var dados = $("#form_profissional_<?php echo $dados['id'] ?>").serialize();

            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_profissional_cliente.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){

                    $('#profissionais').load('exibir_profissionais.php?id=<?php echo $_GET["id"] ?>',function(){ $('#profissionais').trigger('create'); });
                    $('#modal_profi_<?php echo $dados["id"] ?>').modal('hide');


                }
            });



            return false;

        });

    </script>

    <?php
}
?>

<script>

    $(document).on("submit", "#form_profissional", function(evt)
    {


        var dados = $('#form_profissional').serialize();

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_profissional_cliente.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){

                $('#profissionais').load('exibir_profissionais.php?id=<?php echo $_GET['id'] ?>',function(){ $('#profissionais').trigger('create'); });
                $('#form_profissional').trigger("reset");


            }
        });



        return false;

    });

    $('.del_profissional').click(function() {

        var id_profissional = $(this).attr("id_profissional");

        $.get("delete_profissional_cliente.php", {id: id_profissional+""}, function(resposta){
            $('#pop_profi_excluir_'+id_profissional).modal('hide');
            $('#profissionais').load('exibir_profissionais.php?id=<?php echo $_GET['id'] ?>',function(){ $('#profissionais').trigger('create'); });
        })


    });

</script>






























<!-- FUNÇÕES DE CONTRATOS  -->


<?php
$sql_consult = mysql_query("SELECT * FROM ta_contrato WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {


    $dt_inicio = implode("/",array_reverse(explode("-",$dados['dt_inicio'])));
    $dt_fim = implode("/",array_reverse(explode("-",$dados['dt_fim'])));

    ?>


    <div class="modal" id="modal_contra_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_contrato_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Contrato</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_contrato" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nº Contrato</label>
                                <input type="text" name="numero" class="form-control" placeholder="Nº Contrato" value="<?php echo $dados['numero'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea rows="5" name="ds_contrato" class="form-control" placeholder="Descrição"><?php echo $dados['ds_contrato'] ?></textarea>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de Início</label>
                                <input class="form-control data" type="text" id="dt_inicio" name="dt_inicio" placeholder="Data de Início" value="<?php echo $dt_inicio ?>" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data Fim</label>
                                <input class="form-control data" type="text" id="dt_fim" name="dt_fim" placeholder="Data Fim" value="<?php echo $dt_fim ?>" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>BDI</label>
                                <input class="form-control" type="text" id="BDI_<?php echo $dados['id'] ?>" name="BDI" placeholder="BDI" onkeypress="FormataValor(this.id, 10, event)" value="<?php echo $dados['BDI'] ?>" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor Base</label>
                                <input class="form-control" type="text" id="valor_base_<?php echo $dados['id'] ?>" name="valor_base" placeholder="Valor Base" onkeypress="FormataValor(this.id, 10, event)" value="<?php echo $dados['valor_base'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor Base 2</label>
                                <input class="form-control" type="text" id="valor_base2_<?php echo $dados['id'] ?>" name="valor_base2" placeholder="Valor Base" onkeypress="FormataValor(this.id, 10, event)" value="<?php echo $dados['valor_base2'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor Base 3</label>
                                <input class="form-control" type="text" id="valor_base3_<?php echo $dados['id'] ?>" name="valor_base3" placeholder="Valor Base" onkeypress="FormataValor(this.id, 10, event)" value="<?php echo $dados['valor_base3'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mês SCO</label>
                                <select class="form-control" id="mes_sco" name="mes_sco" required="required">
                                    <option value="<?php echo $dados['mes_sco'] ?>" selected><?php echo $dados['mes_sco'] ?></option>
                                    <?php
                                    $sql_grupo = mysql_query("SELECT * FROM i0_sco GROUP BY mes_i0_sco ORDER BY mes_i0_sco") or die (mysql_error());
                                    while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                        ?>
                                        <option value="<?php echo $row_grupo['mes_i0_sco'] ?>"><?php echo $row_grupo['mes_i0_sco'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ano SCO</label>
                                <select class="form-control" id="ano_sco" name="ano_sco" required="required">
                                    <option value="<?php echo $dados['ano_sco'] ?>" selected><?php echo $dados['ano_sco'] ?></option>
                                    <?php
                                    $sql_grupo = mysql_query("SELECT * FROM i0_sco GROUP BY ano_i0_sco ORDER BY ano_i0_sco") or die (mysql_error());
                                    while ($row_grupo = mysql_fetch_array($sql_grupo)) {
                                        ?>
                                        <option value="<?php echo $row_grupo['ano_i0_sco'] ?>"><?php echo $row_grupo['ano_i0_sco'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
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
        $(document).on("submit", "#form_contrato_<?php echo $dados['id'] ?>", function(evt)
        {


            var dados = $("#form_contrato_<?php echo $dados['id'] ?>").serialize();

            $.ajax({
                type : 'POST', /* Tipo da requisi��o */
                url : 'atualizar_contrato.php', /* URL que ser� chamada */
                data: dados,
                dataType: 'json',
                success: function(data){

                    $('#contratos').load('exibir_contratos.php?id=<?php echo $_GET["id"] ?>',function(){ $('#contratos').trigger('create'); });
                    $('#modal_contra_<?php echo $dados["id"] ?>').modal('hide');


                }
            });



            return false;

        });

    </script>

    <?php
}
?>




<script>

    $(document).on("submit", "#form_contrato", function(evt)
    {


        var dados = $('#form_contrato').serialize();

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_contrato.php', /* URL que ser� chamada */
            data: dados,
            dataType: 'json',
            success: function(data){

                $('#contratos').load('exibir_contratos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#contratos').trigger('create'); });
                $('#form_contrato').trigger("reset");


            }
        });



        return false;
    });

    $('.del_contrato').click(function() {

        var id_contrato = $(this).attr("id_contrato");

        $.get("delete_contrato.php", {id: id_contrato+""}, function(resposta){
            $('#pop_contra_excluir_'+id_contrato).modal('hide');
            $('#contratos').load('exibir_contratos.php?id=<?php echo $_GET['id'] ?>',function(){ $('#contratos').trigger('create'); });
        })


    });

</script>



















<!-- FUNÇÕES DE OPERADORES  -->

<?php
$sql_consult = mysql_query("SELECT * FROM ta_cliente_operador WHERE id_cliente='".$_GET['id']."' ORDER BY id ASC") or die (mysql_error());
while ($dados = mysql_fetch_array($sql_consult)) {


    if($dados['tipo'] == 1) { $tipo = "Simples"; }
    if($dados['tipo'] == 2) { $tipo = "Fiscal"; }
    if($dados['tipo'] == 3) { $tipo = "Gerente"; }

    ?>



    <div class="modal" id="modal_oper_<?php echo $dados['id'] ?>">
        <form method="post" enctype="multipart/form-data" target="_self" id="form_operador_<?php echo $dados['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Operador</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>" />
                        <input type="hidden" name="id_operador" value="<?php echo $dados['id'] ?>" />


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipo de Operador</label>
                                <select class="form-control" id="tipo" name="tipo" required="required">
                                    <option value="<?php echo $dados['tipo'] ?>" selected><?php echo $tipo ?></option>
                                    <option value="1">Simples</option>
                                    <option value="2">Fiscal</option>
                                    <option value="3">Gerente</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="nm_operador" class="form-control" placeholder="Nome" value="<?php echo $dados['nm_operador'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control cpf" placeholder="CPF" value="<?php echo $dados['cpf'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Matrícula</label>
                                <input type="text" name="matricula" class="form-control" placeholder="Matrícula" value="<?php echo $dados['matricula'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ramal</label>
                                <input type="text" name="ramal" class="form-control" placeholder="Ramal" value="<?php echo $dados['ramal'] ?>" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="<?php echo $dados['telefone'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $dados['email'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" name="login" class="form-control" placeholder="Login" value="<?php echo $dados['login'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" name="psw" class="form-control" placeholder="Senha" value="<?php echo Bcrypt::hash(addslashes($dados['psw'])); ?>" />
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Assinatura</label>
                                <input type="file" id="arquivo" name="arquivo" />
                                <input type="hidden" name="assinatura_antiga" value="<?php echo $dados['assinatura_digitalizada'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Rúbrica</label>
                                <input type="file" id="arquivo2" name="arquivo2" />
                                <input type="hidden" name="rubrica_antiga" value="<?php echo $dados['rubrica_digital'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status" required="required">
                                    <option value="<?php echo $dados['status'] ?>" selected><?php echo $dados['status'] ?></option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
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
        $(document).on("submit", "#form_operador_<?php echo $dados['id'] ?>", function(evt)
        {


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

                    $('#operadores').load('exibir_operadores.php?id=<?php echo $_GET['id'] ?>',function(){ $('#operadores').trigger('create'); });
                    $('#modal_oper_<?php echo $dados["id"] ?>').modal('hide');


                }
            });



            return false;

        });

    </script>


    <?php
}
?>


<script>

    $(document).on("submit", "#form_operador", function(evt)
    {


        evt.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            type : 'POST', /* Tipo da requisi��o */
            url : 'add_operador.php', /* URL que ser� chamada */
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data){

                if(data.sucesso == 1){

                    $('#operadores').load('exibir_operadores.php?id=<?php echo $_GET['id'] ?>',function(){ $('#operadores').trigger('create'); });
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
            $('#operadores').load('exibir_operadores.php?id=<?php echo $_GET['id'] ?>',function(){ $('#operadores').trigger('create'); });
        })
    });
</script>