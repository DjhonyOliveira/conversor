<?php

namespace Source\Controller;

use Source\Controller\Controller;
use Source\Model\Conversor;

/**
 * Controller Web
 * @package Controller
 * @author  Djonatan R de Oliveira
 * @since   1.0.0
 */
class Web extends Controller
{
    /**
     * @return \Source\Model\Conversor
     */
    private function getModelConversor(): Conversor
    {
        return new Conversor();
    }

    /**
     * @return void
     */
    public function home(): void
    {
        echo $this->View->render("home", [
            "moedas" => $this->getModelConversor()->getMoedasDisponiveis()
        ]);
    }

    /**     
     * @param array $request
     * @return void
     */
    public function realizaConversao(array $request): void
    {
        $xRetorno = $this->getModelConversor()->converteDados($request);

        if($xRetorno){
            echo json_encode($xRetorno);
        }
        else{
            echo 'Falha ao realizar a conversão dos dados, contate a equipe técnica';
        }
    }
}