<?php

namespace Source\Model;

use Exception;

/**
 * Modelo base do sistema
 * @author  Djonatan R de Oliveira
 * @package Model
 * @since   1.0.0
 */
class Model
{
    /**
     * @param string $parametroConversao
     * @param string $data
     * @throws \Exception
     * @return array|null
     */
    protected function validaRequest(string $parametroConversao, string $data): array|null
    {
        (string) $sParametroUrl = '';
        (string) $url           = '';

        if(!empty($data)){
            $sParametroUrl = $data;
        }
        else {
            throw new Exception('Erro ao realizar a conversão, entre em contato com o suporte técnico');
        }

        if(!empty($parametroConversao)){
            if($parametroConversao == "conversaoMoeda"){
                $url = CONF_API_URL . 'last/' . $sParametroUrl;
            }
        }
        else{
            throw new Exception('Informe um parametro para a conversão dos valores');
        }

        $aDados = $this->requisitaApi($url);

        return $aDados;
    }

    /**
     * @param string $url
     * @throws \Exception
     * @return mixed
     */
    private function requisitaApi(string $url): ?array
    {
        try{
            $curl = curl_init($url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($curl);

            curl_close($curl);

            return json_decode($response, true);
        }catch(Exception $exception){
            throw new Exception("Erro ao se conectar ao serviço terceiro");
        }
    }
}