<?php
// Função para formatar a data no formato correto
function formatDate($date): string {
    if (empty($date)) {
        return '';
    } else {
        return substr($date, 3, 2) . '/' . substr($date, 0, 2) . '/' . substr($date, -4);
    }
}

// Função para sanitizar dados de entrada
function sanitizeInput($input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Capturando e sanitizando os dados do formulário
$pn = sanitizeInput($_POST['pn']);
$p0 = sanitizeInput($_POST['p0']);
$p1 = sanitizeInput($_POST['p1']);
$p2 = formatDate(sanitizeInput($_POST['p2']));
$p3 = formatDate(sanitizeInput($_POST['p3']));
$p4 = sanitizeInput($_POST['p4']);
$p5 = sanitizeInput($_POST['p5']);
$p6 = sanitizeInput($_POST['p6']); // Aparentemente não usado, mas incluído

// Validação simples para garantir que campos obrigatórios estão preenchidos
if (empty($pn) || empty($p0) || empty($p1)) {
    // Exibe uma mensagem de erro e interrompe a execução se houver campos obrigatórios faltando
    echo "Por favor, preencha todos os campos obrigatórios.";
    exit;
}

// URL do relatório
$url = "http://201.30.92.125:8090/relatorios_crystal/reportC.aspx?pn=$pn&p0=$p0&p1=$p1&p2=$p2&p3=$p3&p4=$p4&p5=$p5";

// Redirecionamento para a URL que gera o relatório
header("Location: " . $url);
exit;