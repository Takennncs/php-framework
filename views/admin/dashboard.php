<?php
\App\Core\View::layout('admin');
$user = $data['user'] ?? null;
?>

<div class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Admin Dashboard</h1>
    <p class="text-gray-600 dark:text-gray-400">Welcome back, <?= htmlspecialchars($user->name ?? 'Admin') ?>!</p>
</div>

<div class="grid md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-blue-600 dark:text-blue-400 text-xl"></i>
            </div>
            <span class="text-2xl font-bold">156</span>
        </div>
        <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</h3>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-file-alt text-purple-600 dark:text-purple-400 text-xl"></i>
            </div>
            <span class="text-2xl font-bold">43</span>
        </div>
        <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Posts</h3>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-plug text-green-600 dark:text-green-400 text-xl"></i>
            </div>
            <span class="text-2xl font-bold">12</span>
        </div>
        <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Plugins</h3>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-yellow-600 dark:text-yellow-400 text-xl"></i>
            </div>
            <span class="text-2xl font-bold">0.2s</span>
        </div>
        <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400">Avg. Load Time</h3>
    </div>
</div>

<div class="grid md:grid-cols-2 gap-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
        <h2 class="text-xl font-bold mb-4 flex items-center">
            <i class="fas fa-bolt text-blue-500 mr-2"></i>
            Quick Actions
        </h2>
        
        <div class="grid grid-cols-2 gap-4">
            <a href="<?= \App\Core\UI::url('admin/users/create') ?>" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition">
                <i class="fas fa-user-plus text-2xl text-gray-400 group-hover:text-blue-500 mb-2"></i>
                <p class="text-sm font-medium">Add User</p>
            </a>
            
            <a href="<?= \App\Core\UI::url('admin/settings') ?>" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition">
                <i class="fas fa-cog text-2xl text-gray-400 mb-2"></i>
                <p class="text-sm font-medium">Settings</p>
            </a>
            
            <a href="<?= \App\Core\UI::url('admin/cache') ?>" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition">
                <i class="fas fa-bolt text-2xl text-gray-400 mb-2"></i>
                <p class="text-sm font-medium">Clear Cache</p>
            </a>
            
            <a href="<?= \App\Core\UI::url('admin/logs') ?>" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition">
                <i class="fas fa-terminal text-2xl text-gray-400 mb-2"></i>
                <p class="text-sm font-medium">View Logs</p>
            </a>
        </div>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
        <h2 class="text-xl font-bold mb-4 flex items-center">
            <i class="fas fa-chart-line text-purple-500 mr-2"></i>
            System Health
        </h2>
        
        <div class="space-y-4">
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm">CPU Usage</span>
                    <span class="text-sm font-medium">45%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                </div>
            </div>
            
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm">Memory Usage</span>
                    <span class="text-sm font-medium">62%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: 62%"></div>
                </div>
            </div>
            
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm">Disk Usage</span>
                    <span class="text-sm font-medium">28%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 28%"></div>
                </div>
            </div>
        </div>
    </div>
</div>