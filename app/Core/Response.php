<?php

namespace App\Core;

class Response
{
    protected string $content = '';
    protected int $statusCode = 200;
    protected array $headers = [];
    
    public function __construct(string $content = '', int $statusCode = 200, array $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }
    
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent(): string
    {
        return $this->content;
    }
    
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
    
    public function header(string $key, string $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }
    
    public function withHeaders(array $headers): self
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this;
    }
    
    public function json(array $data, int $statusCode = 200): self
    {
        $this->content = json_encode($data);
        $this->statusCode = $statusCode;
        $this->headers['Content-Type'] = 'application/json';
        
        return $this;
    }
    
    public function redirect(string $url, int $statusCode = 302): self
    {
        $this->headers['Location'] = $url;
        $this->statusCode = $statusCode;
        $this->content = '';
        
        return $this;
    }
    
    public function back(): self
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        return $this->redirect($referer);
    }
    
    public function download(string $file, ?string $name = null): self
    {
        if (!file_exists($file)) {
            throw new \Exception("File not found: $file");
        }
        
        $name = $name ?? basename($file);
        
        $this->headers = [
            'Content-Type' => mime_content_type($file),
            'Content-Disposition' => 'attachment; filename="' . $name . '"',
            'Content-Length' => filesize($file),
            'Cache-Control' => 'private',
        ];
        
        $this->content = file_get_contents($file);
        
        return $this;
    }
    
    public function send(): void
    {
        http_response_code($this->statusCode);
        
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
        
        echo $this->content;
    }
    
    public static function make(string $content = '', int $statusCode = 200): self
    {
        return new self($content, $statusCode);
    }
    
    public static function view(string $view, array $data = [], int $statusCode = 200): self
    {
        ob_start();
        View::render($view, $data);
        $content = ob_get_clean();
        
        return new self($content, $statusCode);
    }
}