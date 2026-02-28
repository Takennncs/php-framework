<?php

namespace App\Middleware;

use App\Core\Auth;

class AdminMiddleware
{
    public function handle()
    {
        $user = Auth::user();
        
        if (!$user || !isset($user->role) || $user->role !== 'admin') {
            http_response_code(403);
            echo "<h1>403 - Access Denied</h1>";
            echo "<p>You don't have permission to access this page.</p>";
            exit;
        }
        
        return true;
    }
}