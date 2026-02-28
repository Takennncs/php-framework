<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class PluginController extends Controller
{
    public function index()
    {
        View::layout('app');
        
        $this->view('plugins', [
            'title' => 'Plugin Marketplace - Takenncs Framework'
        ]);
    }
    
    public function install($plugin)
    {
        echo "Installing plugin: " . $plugin;
    }
}