<?php

namespace App\Middleware;

use App\Core\Auth;

class GuestMiddleware
{
    public function handle()
    {
        if (Auth::check()) {
            header('Location: ' . \App\Core\UI::url('dashboard'));
            exit;
        }
        
        return true;
    }
}