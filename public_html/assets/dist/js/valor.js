function formataValor(id, tammax, e) {
    const tecla = e.key; // Captura diretamente a tecla pressionada com 'e.key'

    // Remove caracteres indesejados usando regex de uma vez só
    let vr = document.getElementById(id).value.replace(/[\/.,]/g, '');
    let tam = vr.length;

    // Incrementa ou decrementa o tamanho baseado na tecla pressionada
    if (tam < tammax && tecla !== 'Backspace') tam++;
    if (tecla === 'Backspace') tam--;

    // Verifica se a tecla é um dígito ou Backspace
    if (/\d|Backspace/.test(tecla)) {
        let formattedValue = '';
        if (tam > 2) formattedValue = `${vr.substr(0, tam - 2)}.${vr.substr(tam - 2)}`;

        // Atualiza o valor formatado no campo
        document.getElementById(id).value = formattedValue || vr;
    }
}

function formatarMoeda(valor) {
    // Remove tudo que não é dígito
    valor = valor.replace(/\D/g, "");

    // Formata como moeda com duas casas decimais
    valor = (valor / 100).toFixed(2).replace(".", ",");

    // Adiciona o ponto a cada milhar
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    return valor;
}

function formataValor2(id, tammax, e) {
    const tecla = e.key;

    // Remove todos os caracteres indesejados de uma vez com regex
    let vr = document.getElementById(id).value.replace(/[\/.,]/g, '');
    let tam = vr.length;

    // Ajusta o tamanho com base na tecla pressionada
    if (tam < tammax && tecla !== 'Backspace') tam++;
    if (tecla === 'Backspace') tam--;

    // Verifica se a tecla pressionada é válida (números ou Backspace)
    if (/\d|Backspace/.test(tecla)) {
        let formattedValue = '';

        if (tam > 2) {
            formattedValue = `${vr.substr(0, tam - 2)}.${vr.substr(tam - 4)}`;
        }

        // Atualiza o valor formatado no campo
        document.getElementById(id).value = formattedValue || vr;
    }
}