<!DOCTYPE html>
<html lang="en" class="<?= $_COOKIE['theme'] ?? 'light' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Takenncs Framework' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .dark {
            color-scheme: dark;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .dark ::-webkit-scrollbar-track {
            background: #2d3748;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46a1);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <nav class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/framework" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">T</span>
                    </div>
                    <span class="text-xl font-bold gradient-text">Takenncs</span>
                </a>
                
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/framework" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="/framework/about" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <i class="fas fa-info-circle mr-2"></i>About
                    </a>
                    <a href="/framework/docs" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <i class="fas fa-book mr-2"></i>Docs
                    </a>
                </div>
                
                <div class="flex items-center space-x-3">
                    <button id="theme-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                        <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
                        <i class="fas fa-moon text-blue-400 hidden dark:block"></i>
                    </button>
                    
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold">
                                    <?= strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1)) ?>
                                </div>
                                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                            </button>
                            
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-1 z-50">
                                <a href="/framework/dashboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <i class="fas fa-tachometer-alt w-5 mr-2"></i>Dashboard
                                </a>
                                <a href="/framework/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <i class="fas fa-user w-5 mr-2"></i>Profile
                                </a>
                                <a href="/framework/settings" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <i class="fas fa-cog w-5 mr-2"></i>Settings
                                </a>
                                <hr class="border-gray-200 dark:border-gray-700">
                                <a href="/framework/logout" class="block px-4 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">
                                    <i class="fas fa-sign-out-alt w-5 mr-2"></i>Logout
                                </a>
                            </div>
                        </div>
                    <?php else: ?>

                        <a href="/framework/login" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 transition">
                            Login
                        </a>
                        <a href="/framework/register" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition shadow-lg hover:shadow-xl">
                            <i class="fas fa-user-plus mr-2"></i>Register
                        </a>
                    <?php endif; ?>
                    
                    <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-700">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 dark:border-gray-700">
            <div class="px-4 py-2 space-y-1">
                <a href="/framework" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">Home</a>
                <a href="/framework/about" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">About</a>
                <a href="/framework/docs" class="block px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">Docs</a>
            </div>
        </div>
    </nav>
    
    <?php 
    $success = \App\Core\Session::flash('success');
    $error = \App\Core\Session::flash('error');
    $info = \App\Core\Session::flash('info');
    ?>
    
    <?php if ($success): ?>
        <div class="fixed top-20 right-4 z-50 animate-fade-in">
            <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-xl flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <?= htmlspecialchars($success) ?>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="fixed top-20 right-4 z-50 animate-fade-in">
            <div class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-xl flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        </div>
    <?php endif; ?>
    
    <main class="flex-grow">
        <?= $content ?? '' ?>
    </main>
    
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">T</span>
                        </div>
                        <span class="font-bold gradient-text">Takenncs</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Modern PHP framework for building beautiful web applications.
                    </p>
                </div>
                
                <div>
                    <h3 class="font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/framework/docs" class="text-gray-600 dark:text-gray-400 hover:text-blue-600">Documentation</a></li>
                        <li><a href="/framework/about" class="text-gray-600 dark:text-gray-400 hover:text-blue-600">About</a></li>
                        <li><a href="/framework/blog" class="text-gray-600 dark:text-gray-400 hover:text-blue-600">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold mb-4">Community</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600"><i class="fab fa-github mr-2"></i>GitHub</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600"><i class="fab fa-discord mr-2"></i>Discord</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600"><i class="fab fa-twitter mr-2"></i>Twitter</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold mb-4">Newsletter</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Get the latest updates</p>
                    <form class="flex">
                        <input type="email" placeholder="Email" class="flex-1 px-3 py-2 rounded-l-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm">
                        <button class="px-3 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-r-lg hover:from-blue-600 hover:to-purple-700">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-600 dark:text-gray-400">
                &copy; <?= date('Y') ?> Takenncs Framework. MIT License.
            </div>
        </div>
    </footer>
    
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
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
        
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        setTimeout(() => {
            document.querySelectorAll('.fixed.top-20.right-4').forEach(el => {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>