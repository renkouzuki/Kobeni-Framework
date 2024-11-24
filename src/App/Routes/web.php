<?php

$router->addRoute('GET', '/', 'App\Controllers\HomeController@index');
$router->addRoute('GET', '/api/user', 'App\Controllers\ApiController@getUser');
