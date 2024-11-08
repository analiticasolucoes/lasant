$(document).ready( function() {
    /* Executa a requisição quando o campo CEP perder o foco */
    $('#cep').blur(function(){
        cep = $('#cep').val();
        $.ajax({
            url: `https://viacep.com.br/ws/${cep}/json/`,
            dataType: 'json',
            success: function(resposta) {
                if (!resposta.erro) {
                    $('#rua').val(resposta.logradouro);
                    $('#bairro').val(resposta.bairro);
                    $('#cidade').val(resposta.localidade);
                    $('#uf').append('<option value="'+resposta.uf+'" selected="selected">'+resposta.uf+'</option>');
                } else {
                    alert('CEP não encontrado.');
                    return false;
                }
            }
        });
    })
});

$(document).ready( function() {
    $('#cep_local').blur(function(){
        /* Configura a requisição AJAX */
        $.ajax({
            url : 'consultar_cep.php', /* URL que será chamada */
            type : 'POST', /* Tipo da requisição */
            data: 'cep=' + $('#cep_local').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function(data){
                if(data.sucesso === 1){
                    $('#rua_local').val(data.endereco);
                    $('#bairro_local').val(data.bairro);
                    $('#cidade_local').val(data.cidade);
                    $('#uf_local').append('<option value="'+data.estado+'" selected="selected">'+data.estado+'</option>');
                    $('#numero_local').focus();
                }
            }
        });
        return false;
    })

    $('#numero_local').blur(function() {
        var bairrobusca = $('#rua_local').val()+','+$('#numero_local').val()+','+$('#bairro_local').val()+','+$('#cidade_local').val()+','+$('#uf_local').val();
        $.getJSON('http://maps.google.com/maps/api/geocode/json?address='+bairrobusca, function(data) {
            var latitude = data.results[0].geometry.location.lat;
            var longitude = data.results[0].geometry.location.lng;
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
        });
    });
});// JavaScript Document