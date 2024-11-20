function dataTableInit(table, options = {}) {
    table = "#" + table;
    const defaultOptions = {
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/pt-BR.json',
        }
    };

    // Mescla as opções padrão com as opções personalizadas
    const settings = Object.assign({}, defaultOptions, options);

    $(table).DataTable(settings);
}

function formatarCampoMonetario(campo) {
    // Obtém o valor atual do campo
    let valor = campo.value;

    // Define o valor formatado no campo
    campo.value = formatarMoeda(valor);
}

function formatarCampoDecimal(campo, casasDecimais) {
    // Obtém o valor atual do campo
    let valor = parseFloat(campo.value);

    // Se o valor for inválido, define como zero
    if (isNaN(valor)) valor = 0;

    // Formata o valor com o número especificado de casas decimais
    campo.value = valor.toFixed(casasDecimais);
}

function formatarMoeda(valor) {
    if (!valor) return "0,00"; // Valor vazio retorna "0,00"

    // Remove tudo que não é dígito
    valor = valor.replace(/\D/g, "");

    // Se o valor for vazio após a limpeza, retorna "0,00"
    if (valor === "") return "0,00";

    // Converte o valor para moeda com duas casas decimais
    valor = (valor / 100).toFixed(2).replace(".", ",");

    // Adiciona o ponto a cada milhar
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    return valor;
}

function formatarCampo(input) {
    $(input).on('input', function() {
        // Permite apenas números, hífen e vírgula
        this.value = this.value.replace(/[^0-9\-,\.]/g, '');
    });
}

function formatarCelular(input) {
    $(input).keyup(function() {
        var celular = $(this).val().replace(/\D/g, '');

        // Formata o telefone para 11 dígitos (DDD + 9 dígitos)
        celular = celular.replace(/(\d{2})(\d{5})(\d{4})/, "$1 $2-$3");

        // Atualiza o valor do campo
        $(this).val(celular);
    });
}
function formatarTelefone(input) {
    $(input).keyup(function() {
        var telefone = $(this).val().replace(/\D/g, '');

        // Formata o telefone para 11 dígitos (DDD + 9 dígitos)
        telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, "$1 $2-$3");

        // Atualiza o valor do campo
        $(this).val(telefone);
    });
}
function formatarCEP(input) {
    $(input).keyup(function() {
        var cep = $(this).val().replace(/\D/g, ''); // Remove todos os caracteres não numéricos

        // Formata o CEP para 8 dígitos com hífen
        cep = cep.replace(/(\d{5})(\d{3})/, '$1-$2');

        // Atualiza o valor do campo
        $(this).val(cep);
    });
}

function formatarCNPJ(input) {
    $(input).keyup(function() {
        // Remove todos os caracteres não numéricos
        var cnpj = $(this).val().replace(/\D/g, '');

        // Formata o CNPJ
        cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");

        // Atualiza o valor do campo
        $(this).val(cnpj);
    });
}