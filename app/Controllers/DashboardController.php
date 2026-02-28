<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /framework/login');
            exit;
        }
        
        View::layout('dashboard');
        $this->view('dashboard/index');
    }
    
    public function profile()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /framework/login');
            exit;
        }
        
        View::layout('dashboard');
        $this->view('dashboard/profile');
    }
    
    public function settings()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /framework/login');
            exit;
        }
        
        View::layout('dashboard');
        $this->view('dashboard/settings');
    }
}