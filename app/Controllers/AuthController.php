<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /framework/dashboard');
            exit;
        }
        
        View::layout('app');
        $this->view('auth/login');
    }
    
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($email === 'admin@example.com' && $password === 'password') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = 'Admin User';
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = 'admin';
            
            header('Location: /framework/dashboard');
            exit;
        }
        
        if ($email === 'user@example.com' && $password === 'password') {
            $_SESSION['user_id'] = 2;
            $_SESSION['user_name'] = 'Regular User';
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = 'user';
            
            header('Location: /framework/dashboard');
            exit;
        }
        
        $_SESSION['_flash']['error'] = 'Invalid email or password';
        header('Location: /framework/login');
        exit;
    }
    
    public function showRegister()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /framework/dashboard');
            exit;
        }
        
        View::layout('app');
        $this->view('auth/register');
    }
    
    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['_flash']['error'] = 'All fields are required';
            header('Location: /framework/register');
            exit;
        }
        
        $_SESSION['user_id'] = rand(100, 999);
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = 'user';
        
        header('Location: /framework/dashboard');
        exit;
    }
    
    public function logout()
    {
        session_destroy();
        header('Location: /framework/');
        exit;
    }
}