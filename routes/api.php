<?php

// $router->addRoute('GET', 'api/users/{id}', 'App\Controllers\ApiController@getUser');
$router->group(['prefix' => 'api'], function ($router) {
    $router->get('/users', 'App\Controllers\ApiController@index');
    $router->get('/users/{id}', 'App\Controllers\ApiController@show');
    $router->post('/users', 'App\Controllers\ApiController@store');
    $router->put('/users/{id}', 'App\Controllers\ApiController@update');
    $router->delete('/users/{id}', 'App\Controllers\ApiController@delete');
});
