<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Auth;

class User extends Model
{
    protected static string $table = 'users';
    protected string $primaryKey = 'id';
    protected array $fillable = ['name', 'email', 'password', 'role', 'remember_token'];
    protected array $hidden = ['password', 'remember_token'];
    protected array $casts = [
        'id' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    public function setPassword(string $password): void
    {
        $this->password = Auth::hash($password);
    }
    
    public function verifyPassword(string $password): bool
    {
        return Auth::verify($password, $this->password ?? '');
    }
    
    public function isAdmin(): bool
    {
        return ($this->role ?? 'user') === 'admin';
    }
    
    public function posts()
    {
        return [];
    }
}