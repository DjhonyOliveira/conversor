<?php

namespace Source\Model;

class Conversor extends Model
{
    /**
     * @return array
     */
    public function getMoedasDisponiveis(): array
    {
        $aMoedas = [
            _REAL_BRASILEIRO => REAL_BRASILEIRO,
            _DOLAR_AMERICANO => DOLAR_AMERICANO,
            _EURO            => EURO,
            _BITCOIN         => BITCOIN,
            _PESO_ARGENTINO  => PESO_ARGENTINO,
            _IENE_JAPONES    => IENE_JAPONES
        ];

        return $aMoedas;
    }

    /**
     * @param array $moedas
     * @return array|bool
     */
    public function converteDados(array $moedas): array|bool
    {
        $sMoeda1             = '';
        $sMoeda2             = '';
        $sParametroConversao = 'conversaoMoeda';
        $aRetornoTerceiro    = [];

        foreach($moedas as $indice => $valor){
            if($indice == 'moeda1'){
                $sMoeda1 = $valor;
            }

            if($indice == 'moeda2'){
                $sMoeda2 = $valor;
            }
        }

        if($sMoeda1 != '' && $sMoeda2 != ''){
            $sParametroUrlGet = $sMoeda1 . '-' . $sMoeda2;

            $aRetornoTerceiro = $this->validaRequest($sParametroConversao, $sParametroUrlGet);

            return $aRetornoTerceiro;
        }

        return false;
    }

}