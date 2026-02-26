<?php

/**
 * Takenncs Framework - Public Index
 * 
 * This is the front controller for the framework
 * All requests are routed through this file
 */

// Load autoloader
require_once __DIR__ . '/../app/Core/Autoload.php';

use App\Core\App;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('VIEWS_PATH', BASE_PATH . '/views');

if (file_exists(BASE_PATH . '/.env')) {
    $lines = file(BASE_PATH . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
            putenv(trim($key) . '=' . trim($value));
        }
    }
}

try {
    $app = new App();
    $app->run();
    
} catch (Exception $e) {
    http_response_code(500);
    
    if (getenv('APP_ENV') === 'development') {
        echo "<h1>Application Error</h1>";
        echo "<p><strong>Message:</strong> " . $e->getMessage() . "</p>";
        echo "<p><strong>File:</strong> " . $e->getFile() . ":" . $e->getLine() . "</p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    } else {
        echo "<h1>500 Internal Server Error</h1>";
        echo "<p>Something went wrong. Please try again later.</p>";
    }
}