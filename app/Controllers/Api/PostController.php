<?php

namespace App\Controllers\Api;

use App\Core\Controller;

class PostController extends Controller
{
    public function index()
    {
        header('Content-Type: application/json');
        echo json_encode(['posts' => []]);
    }
    
    public function show($id)
    {
        header('Content-Type: application/json');
        echo json_encode(['post' => ['id' => $id]]);
    }
}