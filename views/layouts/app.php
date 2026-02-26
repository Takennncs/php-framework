<!DOCTYPE html>
<html lang="et" class="<?= $_COOKIE['theme'] ?? 'light' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Takenncs Framework' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?= \App\Core\UI::css('app.css') ?>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .dark { color-scheme: dark; }
    </style>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col transition-colors duration-300">
    <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-lg dark:shadow-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-8">
                    <a href="<?= \App\Core\UI::url() ?>" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Takenncs
                    </a>
                    
                    <div class="hidden md:flex items-center space-x-2">
                        <a href="<?= \App\Core\UI::url() ?>"
                        class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                        <?= $currentPage === 'home'
                                ? 'bg-gradient-to-r from-blue-600/10 to-purple-600/10 text-blue-600 dark:text-blue-400'
                                : 'text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800'
                        ?>">
                            <i class="fas fa-home mr-2 text-xs"></i>
                            Home
                        </a>

                        <a href="<?= \App\Core\UI::url('about') ?>"
                        class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                        <?= $currentPage === 'about'
                                ? 'bg-gradient-to-r from-blue-600/10 to-purple-600/10 text-blue-600 dark:text-blue-400'
                                : 'text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800'
                        ?>">
                            <i class="fas fa-info-circle mr-2 text-xs"></i>
                            About
                        </a>

                        <a href="<?= \App\Core\UI::url('docs') ?>"
                        class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                        <?= $currentPage === 'docs'
                                ? 'bg-gradient-to-r from-blue-600/10 to-purple-600/10 text-blue-600 dark:text-blue-400'
                                : 'text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800'
                        ?>">
                            <i class="fas fa-book mr-2 text-xs"></i>
                            Docs
                        </a>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button id="theme-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                        <i class="fas fa-sun dark:hidden"></i>
                        <i class="fas fa-moon hidden dark:inline"></i>
                    </button>
                    
                    <button id="search-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition md:hidden">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <a href="docs" class="hidden md:block bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105">
                        <i class="fas fa-rocket mr-2"></i>Get Started
                    </a>
                    
                    <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-800">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <div class="hidden md:block pb-4">
                <div class="relative">
                    <input type="text" placeholder="Search documentation..." class="w-full px-4 py-2 pl-10 pr-4 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 dark:border-gray-800">
            <div class="px-4 py-2 space-y-1">
                <a href="<?= \App\Core\UI::url() ?>" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">Home</a>
                <a href="<?= \App\Core\UI::url('about') ?>" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">About</a>
                <a href="<?= \App\Core\UI::url('docs') ?>" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">Docs</a>
                <a href="<?= \App\Core\UI::url('blog') ?>" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">Blog</a>
                <a href="<?= \App\Core\UI::url('plugins') ?>" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">Plugins</a>
            </div>
        </div>
    </nav>
    
    <main class="flex-grow">
        <?= $content ?? '' ?>
    </main>
    
    <footer class="bg-gray-100 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Takenncs</h3>
                    <p class="text-gray-600 dark:text-gray-400">Modern PHP framework for building web applications.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">Documentation</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">API Reference</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">Examples</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Community</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">GitHub</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">Discord</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">Twitter</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="flex-1 px-3 py-2 rounded-l-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700 text-center text-gray-600 dark:text-gray-400">
                &copy; <?= date('Y') ?> Takenncs Framework. All rights reserved.
            </div>
        </div>
    </footer>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?= \App\Core\UI::js('app.js') ?>
    
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        
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
    
    <style>
        .nav-link {
            @apply px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition flex items-center;
        }
        .nav-link.active {
            @apply bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400;
        }
    </style>
</body>
</html>