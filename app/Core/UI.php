<?php

namespace App\Core;

class UI
{

    public static function component(string $name, array $data = [])
    {
        extract($data);
        require VIEWS_PATH . "/components/{$name}.php";
    }
    
    public static function url(string $path = '')
    {
        $base = getenv('APP_URL') ?: 'http://localhost/framework';
        return rtrim($base, '/') . '/' . ltrim($path, '/');
    }
    
    public static function asset(string $path)
    {
        return self::url('public/assets/' . ltrim($path, '/'));
    }
    
    public static function css(string $file)
    {
        return '<link rel="stylesheet" href="' . self::asset('css/' . $file) . '">';
    }
    

    public static function js(string $file)
    {
        return '<script src="' . self::asset('js/' . $file) . '"></script>';
    }
}