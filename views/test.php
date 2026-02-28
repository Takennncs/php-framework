<?php
\App\Core\View::layout('app');
$currentPage = 'test';
?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Test Page</h1>
        <p class="text-gray-600">If you can see this, routing is working!</p>
        
        <div class="mt-8 space-y-4">
            <div>
                <strong>Current URI:</strong> <?= $_SERVER['REQUEST_URI'] ?>
            </div>
            <div>
                <strong>Base URL:</strong> <?= \App\Core\UI::url() ?>
            </div>
            <div>
                <strong>About URL:</strong> <?= \App\Core\UI::url('about') ?>
            </div>
        </div>
    </div>
</div>