<?php

namespace App\Core;

class Hash
{
    public static function make(string $value, string $algo = 'sha256'): string
    {
        return hash($algo, $value);
    }
    
    public static function check(string $value, string $hash, string $algo = 'sha256'): bool
    {
        return hash($algo, $value) === $hash;
    }
    
    public static function bcrypt(string $value, array $options = []): string
    {
        return password_hash($value, PASSWORD_BCRYPT, $options);
    }
    
    public static function verifyBcrypt(string $value, string $hash): bool
    {
        return password_verify($value, $hash);
    }
    
    public static function random(int $length = 32): string
    {
        return bin2hex(random_bytes($length / 2));
    }
}