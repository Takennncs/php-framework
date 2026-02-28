<?php

/** @var \App\Core\Router $router */

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/docs', 'HomeController@docs');
$router->get('/blog', 'BlogController@index');
$router->get('/blog/{slug}', 'BlogController@show');

$router->post('/test-post', 'TestPostController@test');

$router->get('/plugins', 'PluginController@index');
$router->get('/plugins/install/{name}', 'PluginController@install');

$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/register', 'AuthController@showRegister');
$router->post('/register', 'AuthController@register');
$router->post('/logout', 'AuthController@logout');

$router->get('/dashboard', 'DashboardController@index');
$router->get('/profile', 'DashboardController@profile');
$router->post('/profile/update', 'DashboardController@updateProfile');
$router->post('/profile/password', 'DashboardController@updatePassword');
$router->get('/settings', 'DashboardController@settings');
$router->post('/settings/update', 'DashboardController@updateSettings');

$router->get('/admin', 'AdminController@dashboard');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/users/create', 'AdminController@createUser');
$router->post('/admin/users', 'AdminController@storeUser');
$router->get('/admin/users/{id}/edit', 'AdminController@editUser');
$router->post('/admin/users/{id}/update', 'AdminController@updateUser');
$router->post('/admin/users/{id}/delete', 'AdminController@deleteUser');
$router->get('/admin/settings', 'AdminController@settings');
$router->post('/admin/settings', 'AdminController@updateSettings');
$router->get('/admin/logs', 'AdminController@logs');
$router->get('/admin/cache', 'AdminController@cache');
$router->post('/admin/cache/clear', 'AdminController@clearCache');