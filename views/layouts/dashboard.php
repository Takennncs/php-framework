<!DOCTYPE html>
<html lang="en" class="<?= $_COOKIE['theme'] ?? 'light' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - Takenncs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .dark {
            color-scheme: dark;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        .dark .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background: #4b5563;
        }
        
        .menu-item {
            transition: all 0.2s ease;
        }
        
        .menu-item:hover {
            transform: translateX(4px);
        }
        
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <?php
    $user = \App\Core\Auth::user();
    $currentRoute = $_SERVER['REQUEST_URI'];
    ?>
    
    <div class="flex h-screen overflow-hidden">
        <aside class="w-72 bg-white dark:bg-gray-800 shadow-2xl flex-shrink-0 overflow-y-auto sidebar-scrollbar border-r border-gray-200 dark:border-gray-700">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <a href="/framework/dashboard" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-xl">T</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold gradient-text">Takenncs</h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Dashboard</p>
                    </div>
                </a>
            </div>
            
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/10 dark:to-purple-900/10">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                        <?= strtoupper(substr($user->name ?? 'U', 0, 1)) ?>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-lg"><?= htmlspecialchars($user->name ?? 'User') ?></p>
                        <p class="text-sm text-gray-500 dark:text-gray-400"><?= htmlspecialchars($user->email ?? '') ?></p>
                        <span class="inline-flex items-center px-2 py-1 mt-2 rounded-full text-xs font-medium 
                            <?= ($user->role ?? 'user') === 'admin' ? 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' ?>">
                            <i class="fas fa-circle text-xs mr-1"></i>
                            <?= ucfirst($user->role ?? 'user') ?>
                        </span>
                    </div>
                </div>
            </div>
            
            <nav class="p-4">
                <div class="mb-6">
                    <h4 class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                        Main
                    </h4>
                    <ul class="space-y-1">
                        <li>
                            <a href="/framework/dashboard" 
                               class="menu-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 
                               <?= strpos($currentRoute, '/dashboard') !== false ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' ?>">
                                <i class="fas fa-tachometer-alt w-6 text-lg"></i>
                                <span class="ml-3">Dashboard</span>
                                <?php if (strpos($currentRoute, '/dashboard') !== false): ?>
                                    <span class="ml-auto bg-white/20 text-white text-xs px-2 py-1 rounded-full">Current</span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li>
                            <a href="/framework/profile" 
                               class="menu-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 
                               <?= strpos($currentRoute, '/profile') !== false ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' ?>">
                                <i class="fas fa-user w-6 text-lg"></i>
                                <span class="ml-3">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="/framework/settings" 
                               class="menu-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 
                               <?= strpos($currentRoute, '/settings') !== false ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' ?>">
                                <i class="fas fa-cog w-6 text-lg"></i>
                                <span class="ml-3">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="mb-6">
                    <h4 class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                        Content
                    </h4>
                    <ul class="space-y-1">
                        <li>
                            <a href="#" class="flex items-center px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <i class="fas fa-file-alt w-6 text-lg text-gray-400"></i>
                                <span class="ml-3">Posts</span>
                                <span class="ml-auto bg-gray-200 dark:bg-gray-700 text-xs px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <i class="fas fa-image w-6 text-lg text-gray-400"></i>
                                <span class="ml-3">Media</span>
                                <span class="ml-auto bg-gray-200 dark:bg-gray-700 text-xs px-2 py-1 rounded-full">8</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <?php if ($user && isset($user->role) && $user->role === 'admin'): ?>
                <div class="mb-6">
                    <h4 class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                        Admin
                    </h4>
                    <ul class="space-y-1">
                        <li>
                            <a href="/framework/admin" 
                               class="menu-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 
                               <?= strpos($currentRoute, '/admin') !== false ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' ?>">
                                <i class="fas fa-shield-alt w-6 text-lg"></i>
                                <span class="ml-3">Admin Panel</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
                
                <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="/framework/logout" class="flex items-center px-4 py-3 rounded-xl text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                        <i class="fas fa-sign-out-alt w-6 text-lg"></i>
                        <span class="ml-3">Logout</span>
                    </a>
                </div>
            </nav>
        </aside>
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="sidebar-toggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <i class="fas fa-bars"></i>
                        </button>
                        
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" 
                                   placeholder="Search..." 
                                   class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button id="theme-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
                            <i class="fas fa-moon text-blue-400 hidden dark:block"></i>
                        </button>
                        
                        <button class="relative p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-semibold">
                                <?= strtoupper(substr($user->name ?? 'U', 0, 1)) ?>
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-medium"><?= htmlspecialchars($user->name ?? 'User') ?></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400"><?= htmlspecialchars($user->email ?? '') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto animate-slide-in">
                    <?= $content ?? '' ?>
                </div>
            </main>
        </div>
    </div>
    
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>
    
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;
        
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    document.cookie = 'theme=light; path=/';
                } else {
                    html.classList.add('dark');
                    document.cookie = 'theme=dark; path=/';
                }
            });
        }
        
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('aside');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        }
    </script>
</body>
</html>