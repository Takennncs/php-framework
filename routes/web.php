<?php

/** @var \App\Core\Router $router */

$router->get('/', 'HomeController@index');

$router->get('/about', 'HomeController@about');

$router->get('/docs', 'HomeController@docs');

$router->get('/blog', 'HomeController@blog');

$router->get('/plugins', 'PluginController@index');
$router->get('/plugins/install/{name}', 'PluginController@install');