<?php

// $router->addRoute('GET', 'api/users/{id}', 'App\Controllers\ApiController@getUser');
$router->group(['prefix' => 'api'], function($router) {
    $router->get('users', 'App\Controllers\ApiController@index');
    $router->get('users/{id}', 'App\Controllers\ApiController@getUser');
});