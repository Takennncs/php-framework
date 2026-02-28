<?php

namespace App\Middleware;

use App\Core\Auth;

class AuthMiddleware
{
    public function handle()
    {
        if (!Auth::check()) {
            header('Location: ' . \App\Core\UI::url('login'));
            exit;
        }
        
        return true;
    }
}