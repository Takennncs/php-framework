<?php

namespace App\Core;

class Request
{
    protected array $query;
    protected array $post;
    protected array $server;
    protected array $files;
    protected array $cookies;
    protected array $headers;
    protected ?array $json = null;
    
    public function __construct()
    {
        $this->query = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->files = $_FILES;
        $this->cookies = $_COOKIE;
        $this->headers = $this->parseHeaders();
        
        // Parse JSON input
        $contentType = $this->header('Content-Type');
        if (strpos($contentType, 'application/json') !== false) {
            $input = file_get_contents('php://input');
            $this->json = json_decode($input, true) ?? [];
        }
    }
    
    protected function parseHeaders(): array
    {
        $headers = [];
        
        foreach ($this->server as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $header = str_replace('_', '-', substr($key, 5));
                $headers[$header] = $value;
            }
        }
        
        return $headers;
    }
    
    public function getPath(): string
    {
        $path = $this->server['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        
        return $path;
    }
    
public function getMethod(): string
{
    $method = $this->server['REQUEST_METHOD'] ?? 'GET';
    
    if ($method === 'POST') {
        if (isset($this->post['_method'])) {
            $method = strtoupper($this->post['_method']);
        } elseif (($override = $this->header('X-HTTP-Method-Override')) !== null) {
            $method = strtoupper($override);
        }
    }
    
    return $method;
}
    
    public function all(): array
    {
        return array_merge($this->query, $this->post, $this->json ?? []);
    }
    
    public function input(string $key, $default = null)
    {
        $data = $this->all();
        return $data[$key] ?? $default;
    }
    
    public function query(string $key, $default = null)
    {
        return $this->query[$key] ?? $default;
    }
    
    public function post(string $key, $default = null)
    {
        return $this->post[$key] ?? $default;
    }
    
    public function json(string $key, $default = null)
    {
        return $this->json[$key] ?? $default;
    }
    
    public function file(string $key)
    {
        return $this->files[$key] ?? null;
    }
    
    public function cookie(string $key, $default = null)
    {
        return $this->cookies[$key] ?? $default;
    }
    
    public function header(string $key, $default = null)
    {
        return $this->headers[$key] ?? $default;
    }
    
    public function has(string $key): bool
    {
        return isset($this->all()[$key]);
    }
    
    public function only(array $keys): array
    {
        $data = $this->all();
        return array_intersect_key($data, array_flip($keys));
    }
    
    public function except(array $keys): array
    {
        $data = $this->all();
        return array_diff_key($data, array_flip($keys));
    }
    
    public function isMethod(string $method): bool
    {
        return strtoupper($method) === $this->getMethod();
    }
    
    public function isAjax(): bool
    {
        return $this->header('X-Requested-With') === 'XMLHttpRequest';
    }
    
    public function wantsJson(): bool
    {
        $accept = $this->header('Accept');
        return strpos($accept, 'application/json') !== false;
    }
    
    public function ip(): string
    {
        $headers = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
        
        foreach ($headers as $header) {
            if (isset($this->server[$header])) {
                return $this->server[$header];
            }
        }
        
        return '0.0.0.0';
    }
    
    public function userAgent(): string
    {
        return $this->server['HTTP_USER_AGENT'] ?? '';
    }
    
    public function url(): string
    {
        $scheme = isset($this->server['HTTPS']) && $this->server['HTTPS'] !== 'off' ? 'https' : 'http';
        $host = $this->server['HTTP_HOST'] ?? 'localhost';
        $path = $this->getPath();
        
        return "$scheme://$host$path";
    }
    
    public function validate(array $rules): array
    {
        $validator = new Validator($this->all(), $rules);
        
        if (!$validator->passes()) {
            throw new ValidationException($validator->errors());
        }
        
        return $validator->validated();
    }
}