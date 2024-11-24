<?php

require __DIR__ . '/../bootstrap.php';

use KobeniFramework\Routing\Router;

function initializeRouter() {
    return new Router();
}

function handleRequest() {
    $router = initializeRouter();

    require __DIR__ . '/../src/App/Routes/web.php'; 

    $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
}

handleRequest();