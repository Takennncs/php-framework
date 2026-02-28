<?php

namespace App\Controllers\Api;

use App\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Login API']);
    }
    
    public function register()
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Register API']);
    }
    
    public function logout()
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Logout API']);
    }
}