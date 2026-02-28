<?php

namespace App\Core;

class Autoload
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $base_dir = BASE_PATH . '/';
            
            $file = $base_dir . str_replace('\\', '/', $class) . '.php';
            
            if (!file_exists($file)) {
                $file = $base_dir . 'app/' . str_replace('App\\', '', $class) . '.php';
                $file = str_replace('\\', '/', $file);
            }
            
            if (!file_exists($file)) {
                $file = $base_dir . 'app/Core/' . str_replace('App\\Core\\', '', $class) . '.php';
                $file = str_replace('\\', '/', $file);
            }
            
            if (!file_exists($file)) {
                $file = $base_dir . 'app/Controllers/' . str_replace('App\\Controllers\\', '', $class) . '.php';
                $file = str_replace('\\', '/', $file);
            }
            
            if (file_exists($file)) {
                require $file;
                return true;
            }
            
            return false;
        });
    }
}

Autoload::register();