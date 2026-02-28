<?php

/**
 * Takenncs Framework - Public Index
 * 
 * This is the front controller for the framework
 * All requests are routed through this file
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['debug'])) {
    echo "<pre>";
    echo "SESSION: ";
    print_r($_SESSION);
    echo "POST: ";
    print_r($_POST);
    echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'];
    echo "</pre>";
    exit;
}

define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('VIEWS_PATH', BASE_PATH . '/views');
define('STORAGE_PATH', BASE_PATH . '/storage');

require_once BASE_PATH . '/app/Core/Autoload.php';

if (file_exists(BASE_PATH . '/app/helpers.php')) {
    require_once BASE_PATH . '/app/helpers.php';
}

use App\Core\App;
use App\Core\Config;

error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Tallinn');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_URI'] === '/framework/test-direct' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h1>Direct POST Test</h1>";
    echo "<pre>";
    echo "POST data: ";
    print_r($_POST);
    echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'];
    echo "</pre>";
    exit;
}

try {
    $app = new App();
    $app->run();
} catch (Throwable $e) {

    
} catch (Throwable $e) {
    http_response_code(500);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application Error</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body class="bg-gray-100">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full overflow-hidden">
                <div class="bg-gradient-to-r from-red-500 to-pink-500 p-6">
                    <h1 class="text-2xl font-bold text-white">Application Error</h1>
                </div>
                
                <div class="p-6">
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                        <p class="text-red-700 font-medium"><?= htmlspecialchars($e->getMessage()) ?></p>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">
                            <strong>File:</strong> <?= htmlspecialchars($e->getFile()) ?>:<?= $e->getLine() ?>
                        </p>
                        
                        <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                            <pre class="text-sm text-green-400"><?= htmlspecialchars($e->getTraceAsString()) ?></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}