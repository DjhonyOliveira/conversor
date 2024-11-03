<?php

namespace Source\Controller;

use Source\View\View;

/**
 * Controller Principal do sistema
 * @package Controller
 * @author  Djonatan R de Oliveira
 * @since   1.0.0
 */
class Controller
{
    /** @var View */
    protected $View;

    public function __construct(){
        $this->View = new View();
    }

}