<?php

namespace App\Core;

class Cache
{
    protected string $path;
    protected int $defaultTtl = 3600;
    
    public function __construct()
    {
        $this->path = BASE_PATH . '/storage/cache';
        
        if (!is_dir($this->path)) {
            mkdir($this->path, 0755, true);
        }
    }
    
    protected function getPath(string $key): string
    {
        return $this->path . '/' . md5($key) . '.cache';
    }
    
    public function put(string $key, $value, ?int $ttl = null): bool
    {
        $ttl = $ttl ?? $this->defaultTtl;
        
        $data = [
            'expires' => time() + $ttl,
            'value' => $value
        ];
        
        $file = $this->getPath($key);
        return file_put_contents($file, serialize($data)) !== false;
    }
    
    public function get(string $key, $default = null)
    {
        $file = $this->getPath($key);
        
        if (!file_exists($file)) {
            return $default;
        }
        
        $data = unserialize(file_get_contents($file));
        
        if (time() > $data['expires']) {
            unlink($file);
            return $default;
        }
        
        return $data['value'];
    }
    
    public function has(string $key): bool
    {
        $file = $this->getPath($key);
        
        if (!file_exists($file)) {
            return false;
        }
        
        $data = unserialize(file_get_contents($file));
        
        if (time() > $data['expires']) {
            unlink($file);
            return false;
        }
        
        return true;
    }
    
    public function forget(string $key): bool
    {
        $file = $this->getPath($key);
        
        if (file_exists($file)) {
            return unlink($file);
        }
        
        return true;
    }
    
    public function flush(): bool
    {
        $files = glob($this->path . '/*.cache');
        
        foreach ($files as $file) {
            unlink($file);
        }
        
        return true;
    }
    
    public function remember(string $key, callable $callback, ?int $ttl = null)
    {
        if ($this->has($key)) {
            return $this->get($key);
        }
        
        $value = $callback();
        $this->put($key, $value, $ttl);
        
        return $value;
    }
}