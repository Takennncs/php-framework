<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /framework/login');
            exit;
        }
        
        View::layout('dashboard');
        $this->view('admin/dashboard');
    }
}