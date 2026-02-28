<?php

namespace App\Core;

class Auth
{
    protected static ?object $user = null;
    protected static string $sessionKey = 'user_id';
    
    public static function login($user): void
    {
        if (is_object($user)) {
            $_SESSION[self::$sessionKey] = $user->id ?? null;
            $_SESSION['user_name'] = $user->name ?? '';
            $_SESSION['user_email'] = $user->email ?? '';
            $_SESSION['user_role'] = $user->role ?? 'user';
            
            self::$user = $user;
        } elseif (is_array($user)) {
            $_SESSION[self::$sessionKey] = $user['id'] ?? null;
            $_SESSION['user_name'] = $user['name'] ?? '';
            $_SESSION['user_email'] = $user['email'] ?? '';
            $_SESSION['user_role'] = $user['role'] ?? 'user';
            
            self::$user = (object) $user;
        }
        
        session_regenerate_id(true);
    }
    
    public static function logout(): void
    {
        $_SESSION = [];
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_destroy();
        
        self::$user = null;
    }
    
    public static function user()
    {
        if (self::$user !== null) {
            return self::$user;
        }
        
        $userId = $_SESSION[self::$sessionKey] ?? null;
        
        if ($userId) {
            self::$user = (object)[
                'id' => $userId,
                'name' => $_SESSION['user_name'] ?? 'User',
                'email' => $_SESSION['user_email'] ?? '',
                'role' => $_SESSION['user_role'] ?? 'user'
            ];
            
            return self::$user;
        }
        
        return null;
    }
    
    public static function check(): bool
    {
        return isset($_SESSION[self::$sessionKey]);
    }
    
    public static function guest(): bool
    {
        return !self::check();
    }
    
    public static function id(): ?int
    {
        return $_SESSION[self::$sessionKey] ?? null;
    }
    
    public static function hash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }
    
    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}