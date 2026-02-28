<?php
\App\Core\View::layout('app');
$currentPage = 'about';
?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-16" data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            About Takenncs Framework
        </h1>
        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
            Discover the story, philosophy, and features behind our modern PHP framework
        </p>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 space-y-6" data-aos="fade-right">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">Current Version</h3>
                    <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-400 rounded-full text-sm font-semibold">
                        Stable
                    </span>
                </div>
                <div class="text-4xl font-bold text-blue-500 mb-2">1.0.0</div>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Released February 26, 2026</p>
                
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-600 dark:text-gray-400">PHP Version</span>
                        <span class="font-semibold">8.0+</span>
                    </div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-600 dark:text-gray-400">License</span>
                        <span class="font-semibold">MIT</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400">Downloads</span>
                        <span class="font-semibold">10k+</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold mb-4">Connect With Us</h3>
                <div class="flex space-x-4">
                    <a href="https://github.com/takennncs" class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center hover:bg-blue-500 hover:text-white transition">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://discord.gg/whK88atrzd" class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center hover:bg-blue-500 hover:text-white transition">
                        <i class="fab fa-discord"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="lg:col-span-2 space-y-8" data-aos="fade-left">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="w-10 h-10 bg-blue-500 text-white rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-book-open"></i>
                    </span>
                    Our Story
                </h2>
                
                <div class="prose dark:prose-invert max-w-none">
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                        Takenncs Framework was born from a desire to understand the inner workings of modern PHP frameworks. 
                        What started as a learning project quickly evolved into a fully-featured framework that combines 
                        simplicity with power.
                    </p>
                    
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mt-4">
                        Our philosophy is simple: create a framework that's easy to understand, a joy to use, and powerful 
                        enough for real-world applications. We believe that understanding how your tools work makes you a 
                        better developer.
                    </p>
                </div>
                
                <div class="mt-8 relative">
                    <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200 dark:bg-gray-700"></div>
                    
                    <div class="relative pl-10 mb-6">
                        <div class="absolute left-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">🚀</div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h4 class="font-semibold">2026 - Version 1.0 Release</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">First stable release with core features</p>
                        </div>
                    </div>
                    
                    <div class="relative pl-10 mb-6">
                        <div class="absolute left-0 w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white">⚡</div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h4 class="font-semibold">2025 - Beta Testing</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Community testing and feedback</p>
                        </div>
                    </div>
                    
                    <div class="relative pl-10">
                        <div class="absolute left-0 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white">🌱</div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h4 class="font-semibold">2024 - Project Started</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Initial concept and development</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="w-10 h-10 bg-purple-500 text-white rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-crown"></i>
                    </span>
                    Core Features
                </h2>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="feature-card">
                        <div class="feature-icon">🚀</div>
                        <h3 class="font-semibold mb-2">Simple Routing</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Clean and expressive routing system inspired by Laravel</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">📦</div>
                        <h3 class="font-semibold mb-2">MVC Architecture</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Clean separation of concerns for better code organization</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">🔄</div>
                        <h3 class="font-semibold mb-2">PSR-4 Autoloading</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Modern PHP autoloading with Composer support</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">🎨</div>
                        <h3 class="font-semibold mb-2">Blade-like Templating</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Simple and powerful templating engine</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">⚙️</div>
                        <h3 class="font-semibold mb-2">Environment Config</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Easy configuration with .env files</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">🌙</div>
                        <h3 class="font-semibold mb-2">Dark Mode</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Built-in dark mode support</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">🔌</div>
                        <h3 class="font-semibold mb-2">Plugin System</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Extend functionality with plugins</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">📱</div>
                        <h3 class="font-semibold mb-2">Responsive UI</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Modern UI with Tailwind CSS</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-users"></i>
                    </span>
                    Core Team
                </h2>
                
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl">
                            TK
                        </div>
                        <div>
                            <h4 class="font-semibold">Takenncs</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Founder & Lead Developer</p>
                            <div class="flex space-x-2 mt-2">
                                <a href="https://github.com/takennncs" class="text-gray-400 hover:text-blue-500"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-lg p-8 text-white text-center">
                <h3 class="text-2xl font-bold mb-4">Ready to Get Started?</h3>
                <p class="mb-6 opacity-90">Join thousands of developers building with Takenncs</p>
                <div class="flex justify-center space-x-4">
                    <a href="/framework/docs" class="px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Read Docs
                    </a>
                    <a href="https://github.com/takennncs" class="px-6 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                        GitHub <i class="fab fa-github ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.feature-card {
    @apply p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:shadow-md transition;
}

.feature-icon {
    @apply text-3xl mb-2;
}

.prose h2 {
    @apply text-gray-900 dark:text-white;
}

.prose p {
    @apply text-gray-700 dark:text-gray-300;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stats = document.querySelectorAll('.stat-number');
    stats.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-target'));
        let current = 0;
        const increment = target / 50;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                stat.textContent = target + '+';
                clearInterval(timer);
            } else {
                stat.textContent = Math.floor(current) + '+';
            }
        }, 20);
    });
    
    const cards = document.querySelectorAll('.feature-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>