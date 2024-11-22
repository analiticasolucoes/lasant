<?php

namespace App\Services;

use Exception;

class UploadArquivos
{
    /**
     * Processa o upload de arquivos.
     *
     * @param array $arquivo O arquivo enviado ($_FILES['campo']).
     * @param string $diretorioDestino Diretório de destino para salvar o arquivo.
     * @param string|null $nomeArquivo Nome do arquivo a ser salvo (opcional). Se não informado, será gerado automaticamente.
     * @return string Retorna o caminho completo do arquivo salvo.
     * @throws Exception Lança exceções em caso de erros no upload ou na movimentação do arquivo.
     */
    public static function processarUpload(array $arquivo, string $diretorioDestino, ?string $nomeArquivo = null): string
    {
        // Validar se houve erro no envio do arquivo
        self::validarArquivo($arquivo);

        // Gerar nome automaticamente, se necessário
        if ($nomeArquivo === null) {
            $nomeArquivo = self::gerarNomeArquivo($arquivo['name']);
        }

        // Garantir que o diretório de destino termina com uma barra
        $diretorioDestino = rtrim($diretorioDestino, '/') . '/';

        // Criar o diretório se não existir
        if (!is_dir($diretorioDestino)) {
            if (!mkdir($diretorioDestino, 0755, true)) {
                throw new Exception('Não foi possível criar o diretório de destino.');
            }
        }

        // Caminho completo do arquivo de destino
        $caminhoDestino = $diretorioDestino . $nomeArquivo;

        // Mover o arquivo enviado para o diretório de destino
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
            throw new Exception('Erro ao mover o arquivo para o diretório de destino.');
        }

        return $caminhoDestino;
    }

    /**
     * Valida o arquivo enviado verificando erros comuns.
     *
     * @param array $arquivo O arquivo enviado ($_FILES['campo']).
     * @return void
     * @throws Exception Lança exceção se houver erro no envio do arquivo.
     */
    private static function validarArquivo(array $arquivo): void
    {
        if (!isset($arquivo['error']) || is_array($arquivo['error'])) {
            throw new Exception('Parâmetro de upload inválido.');
        }

        switch ($arquivo['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new Exception('O arquivo excede o tamanho máximo permitido.');
            case UPLOAD_ERR_PARTIAL:
                throw new Exception('O arquivo foi enviado parcialmente.');
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('Nenhum arquivo foi enviado.');
            case UPLOAD_ERR_NO_TMP_DIR:
                throw new Exception('Diretório temporário ausente.');
            case UPLOAD_ERR_CANT_WRITE:
                throw new Exception('Falha ao escrever o arquivo em disco.');
            case UPLOAD_ERR_EXTENSION:
                throw new Exception('Upload interrompido por uma extensão.');
            default:
                throw new Exception('Erro desconhecido no upload.');
        }
    }

    /**
     * Gera um nome único para o arquivo baseado no timestamp e em um hash do nome original.
     *
     * @param string $nomeOriginal Nome original do arquivo.
     * @return string Nome gerado automaticamente.
     */
    private static function gerarNomeArquivo(string $nomeOriginal): string
    {
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
        return uniqid('upload_', true) . ($extensao ? '.' . $extensao : '');
    }
}