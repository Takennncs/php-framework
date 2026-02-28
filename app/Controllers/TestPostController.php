<?php

namespace App\Controllers;

use App\Core\Controller;

class TestPostController extends Controller
{
    public function test()
    {
        echo "<h1>Test POST Controller</h1>";
        echo "<pre>";
        echo "POST data received:\n";
        print_r($_POST);
        echo "</pre>";
        exit;
    }
}