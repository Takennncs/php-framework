<?php

namespace App\Core;

class Router
{
    protected array $routes = [];
    protected array $params = [];
    protected array $middleware = [];
    protected ?string $groupPrefix = null;
    protected array $groupMiddleware = [];
    
    public function get(string $uri, string $action, array $options = [])
    {
        $this->addRoute('GET', $uri, $action, $options);
    }
    
    public function post(string $uri, string $action, array $options = [])
    {
        $this->addRoute('POST', $uri, $action, $options);
    }
    
    public function put(string $uri, string $action, array $options = [])
    {
        $this->addRoute('PUT', $uri, $action, $options);
    }
    
    public function patch(string $uri, string $action, array $options = [])
    {
        $this->addRoute('PATCH', $uri, $action, $options);
    }
    
    public function delete(string $uri, string $action, array $options = [])
    {
        $this->addRoute('DELETE', $uri, $action, $options);
    }
    
    protected function addRoute(string $method, string $uri, string $action, array $options = [])
    {
        if ($this->groupPrefix) {
            $uri = $this->groupPrefix . $uri;
        }
        
        $this->routes[$method][$uri] = [
            'action' => $action,
            'middleware' => array_merge($this->groupMiddleware, $options['middleware'] ?? []),
            'name' => $options['name'] ?? null
        ];
    }
    
    public function group(string $prefix, callable $callback, array $options = [])
    {
        $previousPrefix = $this->groupPrefix;
        $previousMiddleware = $this->groupMiddleware;
        
        $this->groupPrefix = ($previousPrefix ?? '') . $prefix;
        $this->groupMiddleware = array_merge($previousMiddleware, $options['middleware'] ?? []);
        
        call_user_func($callback, $this);
        
        $this->groupPrefix = $previousPrefix;
        $this->groupMiddleware = $previousMiddleware;
    }
    
    public function middleware($middleware): self
    {
        if (is_array($middleware)) {
            $this->groupMiddleware = array_merge($this->groupMiddleware, $middleware);
        } else {
            $this->groupMiddleware[] = $middleware;
        }
        
        return $this;
    }
    
    public function dispatch(string $uri, string $method)
    {
        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        
        $uri = '/' . ltrim($uri, '/');
        
         if (!isset($this->routes[$method])) {
            $this->handleNotFound($uri);
            return;
        }
        
        foreach ($this->routes[$method] as $routeUri => $routeData) {
            $routePattern = $this->compileRoute($routeUri);
            
            if (preg_match($routePattern, $uri, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                
                $this->runMiddleware($routeData['middleware']);
                
                $this->callAction($routeData['action'], $params);
                return;
            }
        }
        
        $this->handleNotFound($uri);
    }
    
    protected function compileRoute(string $route): string
    {
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $route);
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\?\}/', '(?P<$1>[^/]*)', $route);
        
        return '#^' . $route . '$#';
    }
    
    protected function callAction(string $action, array $params = [])
    {
        [$controller, $method] = explode('@', $action);
        $controller = "App\\Controllers\\$controller";
        
        if (!class_exists($controller)) {
            $this->handleError("Controller '$controller' not found", 500);
            return;
        }
        
        $controllerInstance = new $controller();
        
        if (!method_exists($controllerInstance, $method)) {
            $this->handleError("Method '$method' not found in controller", 500);
            return;
        }
        
        call_user_func_array([$controllerInstance, $method], $params);
    }
    
    protected function runMiddleware(array $middleware)
    {
        foreach ($middleware as $middlewareClass) {
            if (is_string($middlewareClass)) {
                $middlewareMap = [
                    'auth' => \App\Middleware\AuthMiddleware::class,
                    'guest' => \App\Middleware\GuestMiddleware::class,
                    'admin' => \App\Middleware\AdminMiddleware::class,
                ];
                
                $class = $middlewareMap[$middlewareClass] ?? $middlewareClass;
            } else {
                $class = $middlewareClass;
            }
            
            if (class_exists($class)) {
                $instance = new $class();
                if (method_exists($instance, 'handle')) {
                    $response = $instance->handle();
                    if ($response === false) {
                        exit;
                    }
                }
            }
        }
    }
    
    protected function handleNotFound(string $uri)
    {
        http_response_code(404);
        echo "404 - Route not found: " . htmlspecialchars($uri);
    }
    
    protected function handleError(string $message, int $code)
    {
        http_response_code($code);
        echo "$code - Error: " . htmlspecialchars($message);
    }
}