<?php $features = [
    ['icon' => '🚀', 'title' => 'Simple Routing', 'desc' => 'Clean and expressive routing system'],
    ['icon' => '📦', 'title' => 'MVC Architecture', 'desc' => 'Separation of concerns for clean code'],
    ['icon' => '🎨', 'title' => 'Modern UI', 'desc' => 'Beautiful components with dark mode'],
    ['icon' => '🔒', 'title' => 'Authentication', 'desc' => 'Built-in auth system'],
]; ?>

<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-900 dark:to-gray-800">
    <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,transparent,black)] dark:bg-grid-slate-700/25"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-24 lg:py-32">
        <div class="text-center animate-fade-in">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="gradient-text">Takenncs Framework</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto">
                Modern PHP framework with beautiful UI, authentication, and developer-friendly features
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="/framework/docs" class="px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-rocket mr-2"></i>
                    Get Started
                </a>
                <a href="https://github.com/takennncs/php-framework" class="px-8 py-4 bg-gray-800 dark:bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-900 dark:hover:bg-gray-600 transition transform hover:scale-105 shadow-lg">
                    <i class="fab fa-github mr-2"></i>
                    GitHub
                </a>
            </div>
            
            <div class="flex justify-center space-x-8 mt-12">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-500">v1.0</div>
                    <div class="text-gray-500">Version</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-500">PHP 8+</div>
                    <div class="text-gray-500">Required</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-500">MIT</div>
                    <div class="text-gray-500">License</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 gradient-text">Powerful Features</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">Everything you need to build modern web applications</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($features as $index => $feature): ?>
                <div class="group relative animate-fade-in" style="animation-delay: <?= $index * 0.1 ?>s">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300 blur-xl"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100 dark:border-gray-700">
                        <div class="text-5xl mb-4 transform group-hover:scale-110 transition"><?= $feature['icon'] ?></div>
                        <h3 class="text-xl font-semibold mb-3"><?= $feature['title'] ?></h3>
                        <p class="text-gray-600 dark:text-gray-400"><?= $feature['desc'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 gradient-text">Quick Start in 3 Steps</h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg">1</div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Install</h3>
                            <p class="text-gray-600 dark:text-gray-400">Clone the repository and install dependencies</p>
                            <div class="mt-2 bg-gray-900 text-green-400 p-3 rounded-lg text-sm font-mono">composer create-project takenncs/framework my-app</div>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg">2</div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Configure</h3>
                            <p class="text-gray-600 dark:text-gray-400">Set up your environment and database</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg">3</div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Build</h3>
                            <p class="text-gray-600 dark:text-gray-400">Start building your application</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl p-8 shadow-2xl">
                <h3 class="text-2xl font-bold text-white mb-4">Ready to build something amazing?</h3>
                <p class="text-white/90 mb-6">Join thousands of developers using Takenncs Framework</p>
                <a href="/framework/docs" class="inline-block px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                    <i class="fas fa-book mr-2"></i>
                    Read Documentation
                </a>
            </div>
        </div>
    </div>
</section>