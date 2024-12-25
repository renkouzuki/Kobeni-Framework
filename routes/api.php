<?php

// $router->addRoute('GET', 'api/users/{id}', 'App\Controllers\ApiController@getUser');
$router->group(['prefix' => 'api'], function ($router) {
    $router->get('/users', 'App\Controllers\ApiController@index');
    $router->get('/users/{id}', 'App\Controllers\ApiController@show');
    $router->post('/users', 'App\Controllers\ApiController@store');
    $router->put('/users/{id}', 'App\Controllers\ApiController@update');
    $router->delete('/users/{id}', 'App\Controllers\ApiController@delete');
});

// $router->get('test', [
//     'uses' => 'App\Controllers\ApiController@test',
//     'middleware' => ['Test']
// ]);

// Or with group
$router->group(['middleware' => ['Test']], function ($router) {
    $router->get('test', 'App\Controllers\ApiController@test');
});

$router->post('/testquery', 'App\Controllers\ApiController@testing');

$router->post('/register', 'App\Controllers\AuthController@register');
$router->post('/login', 'App\Controllers\AuthController@login');

$router->group(['middleware' => ['Kobeni:Auth']], function ($router) {
    $router->get('/user', 'App\Controllers\AuthController@user');
    $router->post('/logout', 'App\Controllers\AuthController@logout');
    
});
