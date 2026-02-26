<?php
\App\Core\View::layout('app');
$currentPage = 'home';
?>

<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-900 dark:to-gray-800">
    <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,transparent,black)] dark:bg-grid-slate-700/25"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-24 lg:py-32">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                <?= $title ?>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto">
                <?= $message ?>
            </p>
            
            <div class="flex justify-center space-x-8 mb-12">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-500">v<?= $stats['version'] ?></div>
                    <div class="text-gray-500">Version</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-500">PHP <?= $stats['php_version'] ?></div>
                    <div class="text-gray-500">PHP Version</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-500"><?= ucfirst($stats['environment']) ?></div>
                    <div class="text-gray-500">Environment</div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="/framework/docs" class="group relative px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105">
                    <span class="relative z-10">Get Started</span>
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                </a>
                <a href="https://github.com/takennncs" class="px-8 py-4 bg-gray-800 dark:bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-900 dark:hover:bg-gray-600 transition transform hover:scale-105">
                    <i class="fab fa-github mr-2"></i>GitHub
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Powerful Features</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Everything you need to build modern web applications
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($features as $index => $feature): ?>
            <div class="group relative" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300 blur-xl"></div>
                <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100 dark:border-gray-700">
                    <div class="text-5xl mb-4 transform group-hover:scale-110 transition"><?= $feature['icon'] ?></div>
                    <h3 class="text-xl font-semibold mb-3"><?= $feature['title'] ?></h3>
                    <p class="text-gray-600 dark:text-gray-400"><?= $feature['description'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Quick Start in 3 Steps</h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">1</div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Installation</h3>
                            <p class="text-gray-600 dark:text-gray-400">Clone the repository and install dependencies</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold">2</div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Configure</h3>
                            <p class="text-gray-600 dark:text-gray-400">Set up your environment and database</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">3</div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Build</h3>
                            <p class="text-gray-600 dark:text-gray-400">Start building your application</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-2xl p-8 shadow-2xl" data-aos="fade-left">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-gray-400 text-sm ml-2">routes/web.php</span>
                </div>
                <pre class="text-sm text-green-400 overflow-x-auto"><code>&lt;?php

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/docs', 'HomeController@docs');

$router->post('/contact', 'ContactController@store');
$router->get('/users/{id}', 'UserController@show');</code></pre>
            </div>
        </div>
    </div>
</section>
