<?php

namespace App\Core;

class App
{
    public function run()
    {
        $router = new Router();

        require_once __DIR__ . '/../../routes/web.php';

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $base_path = '/framework';
        if (strpos($uri, $base_path) === 0) {
            $uri = substr($uri, strlen($base_path));
        }
        
        if (strpos($uri, '/public') === 0) {
            $uri = substr($uri, strlen('/public'));
        }
        
        if ($uri === '' || $uri === '/') {
            $uri = '/';
        }

        $router->dispatch($uri, $method);
    }
}