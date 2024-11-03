<?php

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router("http://localhost/conversor/", ":");

$router->namespace("Source\Controller");
$router->get("/", "Web:home");
$router->post("/", "Web:realizaConversao");

$router->dispatch();