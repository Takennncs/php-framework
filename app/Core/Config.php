<?php

namespace App\Core;

class Config
{
    private static ?Config $instance = null;
    private array $config = [];
    
    private function __construct()
    {
        $this->config = [
            'app' => [
                'name' => 'Takenncs Framework',
                'env' => 'development',
                'debug' => true,
                'url' => 'http://localhost',
                'base_path' => '/framework',
                'timezone' => 'Europe/Tallinn',
            ],
            'database' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'port' => '3306',
                'database' => 'framework',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8mb4',
            ],
            'session' => [
                'driver' => 'file',
                'lifetime' => 120,
            ],
        ];
    }
    
    public static function getInstance(): Config
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function get(string $key, $default = null)
    {
        $parts = explode('.', $key);
        $config = $this->config;
        
        foreach ($parts as $part) {
            if (!isset($config[$part])) {
                return $default;
            }
            $config = $config[$part];
        }
        
        return $config;
    }
}