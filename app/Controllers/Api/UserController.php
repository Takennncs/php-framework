<?php

namespace App\Controllers\Api;

use App\Core\Controller;

class UserController extends Controller
{
    public function index()
    {
        header('Content-Type: application/json');
        echo json_encode(['users' => []]);
    }
    
    public function show($id)
    {
        header('Content-Type: application/json');
        echo json_encode(['user' => ['id' => $id]]);
    }
    
    public function store()
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'User created']);
    }
    
    public function update($id)
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'User updated', 'id' => $id]);
    }
    
    public function destroy($id)
    {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'User deleted', 'id' => $id]);
    }
}