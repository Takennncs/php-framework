<?php
$user = \App\Core\Auth::user();
?>

<div class="space-y-8">
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl p-8 text-white shadow-xl">
        <h1 class="text-3xl font-bold mb-2">Welcome back, <?= htmlspecialchars($user->name ?? 'User') ?>! 👋</h1>
        <p class="text-white/90">Here's what's happening with your account today.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
        $stats = [
            ['icon' => 'file-alt', 'value' => '12', 'label' => 'Total Posts', 'change' => '+2', 'color' => 'blue'],
            ['icon' => 'users', 'value' => '342', 'label' => 'Followers', 'change' => '+18', 'color' => 'purple'],
            ['icon' => 'heart', 'value' => '1.2k', 'label' => 'Likes', 'change' => '+124', 'color' => 'green'],
            ['icon' => 'eye', 'value' => '5.6k', 'label' => 'Views', 'change' => '+23%', 'color' => 'yellow'],
        ];
        
        foreach ($stats as $stat):
        ?>
            <div class="stat-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-<?= $stat['color'] ?>-100 dark:bg-<?= $stat['color'] ?>-900/30 rounded-xl flex items-center justify-center">
                        <i class="fas fa-<?= $stat['icon'] ?> text-<?= $stat['color'] ?>-600 dark:text-<?= $stat['color'] ?>-400 text-xl"></i>
                    </div>
                    <span class="text-3xl font-bold text-gray-900 dark:text-white"><?= $stat['value'] ?></span>
                </div>
                <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400"><?= $stat['label'] ?></h3>
                <div class="mt-2 flex items-center text-xs text-green-600">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span><?= $stat['change'] ?> from last week</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="grid md:grid-cols-2 gap-6">
        <?php \App\Core\UI::component('card', [
            'title' => 'Quick Actions',
            'icon' => 'bolt',
            'slot' => '
                <div class="grid grid-cols-2 gap-4">
                    <a href="#" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-xl text-center hover:bg-blue-50 dark:hover:bg-blue-900/20 transition group">
                        <i class="fas fa-pen text-2xl text-gray-400 group-hover:text-blue-500 mb-2"></i>
                        <p class="text-sm font-medium">New Post</p>
                    </a>
                    <a href="#" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-xl text-center hover:bg-purple-50 dark:hover:bg-purple-900/20 transition group">
                        <i class="fas fa-image text-2xl text-gray-400 group-hover:text-purple-500 mb-2"></i>
                        <p class="text-sm font-medium">Upload Media</p>
                    </a>
                    <a href="/framework/settings" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-xl text-center hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition group">
                        <i class="fas fa-cog text-2xl text-gray-400 group-hover:text-yellow-500 mb-2"></i>
                        <p class="text-sm font-medium">Settings</p>
                    </a>
                    <a href="/framework/profile" class="p-4 bg-gray-50 dark:bg-gray-700 rounded-xl text-center hover:bg-green-50 dark:hover:bg-green-900/20 transition group">
                        <i class="fas fa-user text-2xl text-gray-400 group-hover:text-green-500 mb-2"></i>
                        <p class="text-sm font-medium">Profile</p>
                    </a>
                </div>
            '
        ]) ?>
        
        <?php \App\Core\UI::component('card', [
            'title' => 'Recent Activity',
            'icon' => 'history',
            'slot' => '
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-600 dark:text-blue-400 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">New post created</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-green-600 dark:text-green-400 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">New follower: John Doe</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">3 hours ago</p>
                        </div>
                    </div>
                </div>
            '
        ]) ?>
    </div>
    
    <?php if ($user && isset($user->role) && $user->role === 'admin'): ?>
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Admin Quick Access</h2>
                <?php \App\Core\UI::component('badge', ['text' => 'Admin Only', 'type' => 'warning']) ?>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="/framework/admin" class="p-3 bg-white/10 rounded-xl hover:bg-white/20 transition text-center">
                    <i class="fas fa-tachometer-alt text-2xl mb-2"></i>
                    <p class="text-sm">Dashboard</p>
                </a>
                <a href="/framework/admin/users" class="p-3 bg-white/10 rounded-xl hover:bg-white/20 transition text-center">
                    <i class="fas fa-users text-2xl mb-2"></i>
                    <p class="text-sm">Users</p>
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>