<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lasant Construções">
    <meta name="description" content="Documento de pedido de compra para impressão">
    <title>Solicitação de Orçamento - Lasant Construções</title>
    <base href="<?= BASE_URL ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Estilos internos (idealmente, movidos para um arquivo externo) */
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            color: #000;
            margin: 20px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        header img {
            max-width: 200px;
            height: auto;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-transform: uppercase;
        }
        .highlight {
            background-color: #ffff99;
            font-weight: bold;
        }
        .right {
            float: right;
            width: 70%;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.print(); // Imprime a página automaticamente ao carregar
        });
    </script>
</head>
<body>
<header>
    <img src="assets/dist/img/logo-lasant-site.png" alt="Logo Lasant Construções">
    <h1>Solicitação de Orçamento</h1>
</header>
<main>
    <!-- Informações do Fornecedor -->
    <section>
        <table>
            <tr>
                <th>Fornecedor:</th>
                <td><?= htmlspecialchars($row_cliente['nome_empresa']) ?></td>
                <th>Data e Hora:</th>
                <td><?= date("d/m/Y H:i") ?></td>
            </tr>
        </table>
    </section>

    <!-- Informações da Empresa -->
    <section>
        <table>
            <tr>
                <th>Empresa:</th>
                <td colspan="3">Lasant Construções LTDA-EPP</td>
            </tr>
            <tr>
                <th>Contato:</th>
                <td>Edie Câmara</td>
                <td colspan="2">Departamento de Compras</td>
            </tr>
        </table>
    </section>

    <!-- Local de Entrega -->
    <section>
        <table>
            <tr class="highlight">
                <th>Local de Entrega:</th>
                <td>
                    <?= htmlspecialchars($row_loc_entrega['rua']) ?>,
                    <?= htmlspecialchars($row_loc_entrega['numero']) ?>,
                    <?= htmlspecialchars($row_loc_entrega['complemento_endereco']) ?> -
                    <?= htmlspecialchars($row_loc_entrega['bairro']) ?>,
                    <?= htmlspecialchars($row_loc_entrega['cidade']) ?> /
                    <?= htmlspecialchars($row_loc_entrega['uf']) ?>
                </td>
            </tr>
            <tr class="highlight">
                <th>Contato Entrega:</th>
                <td><?= htmlspecialchars($row_loc_entrega['contato']) ?> | <b>Tel.:</b> <?= htmlspecialchars($row_loc_entrega['tel_contato']) ?></td>
            </tr>
            <tr class="highlight">
                <th>Observação:</th>
                <td><?= htmlspecialchars($row_consult['observacoes_entrega']) ?></td>
            </tr>
        </table>
    </section>

    <!-- Descrição dos Itens -->
    <section>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Unidade</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($materiais as $material) : ?>
                    <td>
                        <?= htmlspecialchars($material->getDescricao()) ?> -
                        <?= htmlspecialchars($row_cl['classe']) ?> -
                        <?= htmlspecialchars($row_ma['marca']) ?>
                    </td>
                    <td><?= htmlspecialchars($row_unidade['ds_unidade']) ?></td>
                    <td><?= htmlspecialchars($dados['qtd']) ?></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Condição de Pagamento -->
    <section class="right">
        <table>
            <tr>
                <th>Condição de Pagamento:</th>
                <td><?= htmlspecialchars($row_fr['forma_de_pagamento']) ?></td>
            </tr>
        </table>
    </section>
</main>
</body>
</html>