<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class HomeController extends Controller
{
    public function index()
    {
        $features = [
            [
                'title' => 'Simple Routing',
                'description' => 'Clean and expressive routing system inspired by Laravel',
                'icon' => '🚀'
            ],
            [
                'title' => 'MVC Architecture',
                'description' => 'Model-View-Controller pattern for clean code organization',
                'icon' => '📦'
            ],
            [
                'title' => 'Blade-like Templating',
                'description' => 'Simple and powerful templating engine',
                'icon' => '🎨'
            ],
            [
                'title' => 'PSR-4 Autoloading',
                'description' => 'Modern PHP autoloading with Composer support',
                'icon' => '🔄'
            ]
        ];
        
        $this->view('home', [
            'title' => 'Takenncs Framework - Modern PHP Framework',
            'message' => 'Your custom PHP framework is running successfully!',
            'features' => $features,
            'stats' => [
                'version' => '1.0.0',
                'php_version' => PHP_VERSION,
                'environment' => getenv('APP_ENV') ?: 'development'
            ]
        ]);
    }

    public function about()
    {
        View::layout('app');
        
        $this->view('about', [
            'title' => 'About Takenncs Framework',
            'description' => 'A lightweight, custom-built PHP framework'
        ]);
    }
    
    public function docs()
    {
        View::layout('app');
        
        $this->view('docs', [
            'title' => 'Documentation - Takenncs Framework'
        ]);
    }
}