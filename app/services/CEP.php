<?php

namespace App\services;

/**
 * Classe para consulta de CEP via API do ViaCEP.
 *
 * Esta classe encapsula a lógica para consultar um CEP utilizando a API do ViaCEP e retorna as informações do endereço.
 */
class CEP {
    /**
     * Consulta o CEP informado e retorna as informações do endereço.
     *
     * @param string $cep O CEP a ser consultado.
     * @return array Um array associativo com os dados do endereço, ou uma mensagem de erro caso ocorra algum problema.
     */
    public static function consultar($cep) {
        // Validação básica do CEP
        if (!preg_match('/^\d{8}$/', $cep)) {
            return ['sucesso' => false, 'mensagem' => 'CEP inválido'];
        }

        $url = "http://viacep.com.br/ws/$cep/json/"; // Utilizando a API do ViaCEP

        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $data = json_decode($response, true);

            if ($data['erro']) {
                return ['sucesso' => false, 'mensagem' => 'CEP não encontrado'];
            }

            return [
                'sucesso' => true,
                'logradouro' => $data['logradouro'],
                'bairro' => $data['bairro'],
                'localidade' => $data['localidade'],
                'uf' => $data['uf'],
            ];
        } catch (Exception $e) {
            return ['sucesso' => false, 'mensagem' => 'Erro ao consultar o CEP'];
        }
    }
}