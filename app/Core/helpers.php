<?php

if (!function_exists('app')) {
    function app()
    {
        return \App\Core\App::getInstance();
    }
}

if (!function_exists('config')) {
    function config(string $key = null, $default = null)
    {
        $config = \App\Core\Config::getInstance();
        
        if ($key === null) {
            return $config->all();
        }
        
        return $config->get($key, $default);
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        $value = getenv($key);
        
        if ($value === false) {
            return $default;
        }
        
        return match (strtolower($value)) {
            'true' => true,
            'false' => false,
            'null' => null,
            default => $value,
        };
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        return \App\Core\UI::url($path);
    }
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return \App\Core\UI::asset($path);
    }
}

if (!function_exists('route')) {
    function route(string $name, array $params = []): ?string
    {
        return \App\Core\UI::route($name, $params);
    }
}

if (!function_exists('session')) {
    function session(string $key = null, $default = null)
    {
        if ($key === null) {
            return \App\Core\Session::all();
        }
        
        return \App\Core\Session::get($key, $default);
    }
}

if (!function_exists('auth')) {
    function auth()
    {
        return \App\Core\Auth::user();
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        $token = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        
        return '<input type="hidden" name="_token" value="' . $token . '">';
    }
}

if (!function_exists('method_field')) {
    function method_field(string $method): string
    {
        return '<input type="hidden" name="_method" value="' . strtoupper($method) . '">';
    }
}

if (!function_exists('old')) {
    function old(string $key, $default = null)
    {
        return $_SESSION['_old'][$key] ?? $default;
    }
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $var) {
            var_dump($var);
        }
        die(1);
    }
}

if (!function_exists('dump')) {
    function dump(...$vars)
    {
        foreach ($vars as $var) {
            var_dump($var);
        }
    }
}

if (!function_exists('now')) {
    function now(): \DateTime
    {
        return new \DateTime();
    }
}

if (!function_exists('today')) {
    function today(): \DateTime
    {
        return new \DateTime('today');
    }
}