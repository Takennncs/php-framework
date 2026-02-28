<!DOCTYPE html>
<html lang="en" class="<?= $_COOKIE['theme'] ?? 'light' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?= \App\Core\UI::css('app.css') ?>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="flex h-screen">
        <div class="w-64 bg-white dark:bg-gray-800 shadow-lg">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Admin Panel
                </h1>
            </div>
            
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="<?= \App\Core\UI::url('admin') ?>" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?= \App\Core\UI::url('admin/users') ?>" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-users w-5 mr-3"></i>
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="<?= \App\Core\UI::url('admin/settings') ?>" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-cog w-5 mr-3"></i>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="<?= \App\Core\UI::url('admin/logs') ?>" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-terminal w-5 mr-3"></i>
                            Logs
                        </a>
                    </li>
                    <li>
                        <a href="<?= \App\Core\UI::url('admin/cache') ?>" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-bolt w-5 mr-3"></i>
                            Cache
                        </a>
                    </li>
                    <li class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="<?= \App\Core\UI::url() ?>" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-arrow-left w-5 mr-3"></i>
                            Back to Site
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white dark:bg-gray-800 shadow-sm">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold"><?= $title ?? 'Dashboard' ?></h2>
                    
                    <div class="flex items-center space-x-4">
                        <button id="theme-toggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-sun dark:hidden"></i>
                            <i class="fas fa-moon hidden dark:inline"></i>
                        </button>
                        
                        <a href="<?= \App\Core\UI::url('logout') ?>" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </header>
            
            <main class="flex-1 overflow-y-auto p-6">
                <?= $content ?? '' ?>
            </main>
        </div>
    </div>
    
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;
        
        themeToggle.addEventListener('click', () => {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                document.cookie = 'theme=light; path=/';
            } else {
                html.classList.add('dark');
                document.cookie = 'theme=dark; path=/';
            }
        });
    </script>
</body>
</html>