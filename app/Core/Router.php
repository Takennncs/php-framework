<?php

namespace App\Core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, string $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(string $uri, string $method)
    {
        $uri = rtrim($uri, '/');
        if (empty($uri)) {
            $uri = '/';
        }
        
        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo "404 | Route not found: " . $uri;
            return;
        }

        [$controller, $method] = explode('@', $action);
        $controller = "App\\Controllers\\$controller";

        if (!class_exists($controller)) {
            http_response_code(500);
            echo "500 | Controller '$controller' not found";
            return;
        }

        $controllerInstance = new $controller();
        
        if (!method_exists($controllerInstance, $method)) {
            http_response_code(500);
            echo "500 | Method '$method' not found in controller";
            return;
        }

        $controllerInstance->$method();
    }
}