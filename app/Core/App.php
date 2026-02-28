<?php

namespace App\Core;

class App
{
    protected Router $router;
    protected Request $request;
    protected Config $config;
    
    public function __construct()
    {
        $this->router = new Router();
        $this->request = new Request();
        $this->config = Config::getInstance();
    }
    
    public function run()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $uri = $this->request->getPath();
        $method = $this->request->getMethod();

        $basePath = $this->config->get('app.base_path', '');
        if ($basePath && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        
        if (strpos($uri, '/public') === 0) {
            $uri = substr($uri, strlen('/public'));
        }
        
        if ($uri === '' || $uri === '/' || $uri === false) {
            $uri = '/';
        } else {
            $uri = '/' . ltrim($uri, '/');
        }

        $router = $this->router;
        require_once BASE_PATH . '/routes/web.php';

        $this->router->dispatch($uri, $method);
    }
    
    public function handleError($level, $message, $file = '', $line = 0)
    {
        if (error_reporting() & $level) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }
    
    public function handleException($exception)
    {
        http_response_code(500);
        
        if ($this->config->get('app.debug', true)) {
            echo "<h1>Application Error</h1>";
            echo "<p><strong>Message:</strong> " . $exception->getMessage() . "</p>";
            echo "<p><strong>File:</strong> " . $exception->getFile() . ":" . $exception->getLine() . "</p>";
            echo "<pre>" . $exception->getTraceAsString() . "</pre>";
        } else {
            echo "<h1>500 Internal Server Error</h1>";
            echo "<p>Something went wrong. Please try again later.</p>";
        }
    }
}