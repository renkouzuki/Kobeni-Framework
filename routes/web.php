<?php

$router->get('/', 'App\Controllers\HellowController@hello');

$router->get('/comp' , 'App\Controllers\WebController@comp');

$router->get('examples', 'App\Controllers\WebController@index');
$router->get('examples/create', 'App\Controllers\WebController@create');
$router->post('examples', 'App\Controllers\WebController@store');
$router->get('examples/{id}/edit', 'App\Controllers\WebController@edit');
$router->post('examples/{id}', 'App\Controllers\WebController@update');
$router->post('examples/{id}/delete', 'App\Controllers\WebController@delete');