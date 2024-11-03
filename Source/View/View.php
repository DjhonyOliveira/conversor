<?php

namespace Source\View;

use League\Plates\Engine;

/**
 * Classe abstrata para renderização do frontend
 * @package View
 * @author  Djonatan R de Oliveira
 * @since   1.0.0
 */
class View
{
    
    /** @var Engine */
    private $engine;

    public function __construct(string $path = CONF_VIEW_PATH, string $ext = CONF_VIEW_EXT)
    {
        $this->engine = new Engine($path, $ext);
    }

    public function render(string $templateName, array $data): string
    {
        return $this->engine->render($templateName, $data);
    }

    public function engine(): Engine
    {
        return $this->engine();
    }

}