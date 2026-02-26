<?php
\App\Core\View::layout('app');
$currentPage = 'docs';
?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Documentation
        </h1>
        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Everything you need to master the Takenncs Framework
        </p>
    </div>
    
    <div class="grid lg:grid-cols-4 gap-8">
        <div class="lg:col-span-1" data-aos="fade-right">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg sticky top-24 overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-600">
                    <h3 class="text-white font-semibold flex items-center">
                        <i class="fas fa-compass mr-2"></i>
                        Quick Navigation
                    </h3>
                </div>
                <div class="p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="#getting-started" class="doc-nav-link active">
                                <i class="fas fa-rocket w-5"></i>
                                Getting Started
                            </a>
                        </li>
                        <li>
                            <a href="#installation" class="doc-nav-link">
                                <i class="fas fa-download w-5"></i>
                                Installation
                            </a>
                        </li>
                        <li>
                            <a href="#configuration" class="doc-nav-link">
                                <i class="fas fa-cog w-5"></i>
                                Configuration
                            </a>
                        </li>
                        <li>
                            <a href="#routing" class="doc-nav-link">
                                <i class="fas fa-route w-5"></i>
                                Routing
                            </a>
                        </li>
                        <li>
                            <a href="#controllers" class="doc-nav-link">
                                <i class="fas fa-code w-5"></i>
                                Controllers
                            </a>
                        </li>
                        <li>
                            <a href="#views" class="doc-nav-link">
                                <i class="fas fa-eye w-5"></i>
                                Views
                            </a>
                        </li>
                        <li>
                            <a href="#models" class="doc-nav-link">
                                <i class="fas fa-database w-5"></i>
                                Models
                            </a>
                        </li>
                        <li>
                            <a href="#middleware" class="doc-nav-link">
                                <i class="fas fa-shield-alt w-5"></i>
                                Middleware
                            </a>
                        </li>
                        <li>
                            <a href="#api" class="doc-nav-link">
                                <i class="fas fa-cloud w-5"></i>
                                API Development
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="lg:col-span-3" data-aos="fade-left">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-800 dark:to-gray-800">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white" id="current-section">
                            Getting Started
                        </h2>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="far fa-clock mr-1"></i>
                                Last updated: 2026-02-26
                            </span>
                            <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition" id="edit-page">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="p-8 prose dark:prose-invert max-w-none">
                    <section id="getting-started" class="doc-section mb-12">
                        <h2 class="text-3xl font-bold mb-6 flex items-center">
                            <span class="bg-blue-500 text-white w-8 h-8 rounded-lg flex items-center justify-center text-lg mr-3">1</span>
                            Getting Started
                        </h2>
                        
                        <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg">
                            <div class="flex">
                                <i class="fas fa-info-circle text-blue-500 text-xl mr-3"></i>
                                <p class="text-blue-800 dark:text-blue-300">
                                    Welcome to Takenncs Framework! This guide will help you get started with your first project.
                                </p>
                            </div>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-3">Prerequisites</h3>
                        <ul class="list-disc pl-6 mb-6 space-y-2">
                            <li>PHP 8.0 or higher</li>
                            <li>Composer installed</li>
                            <li>Web server (Apache/Nginx)</li>
                            <li>MySQL/PostgreSQL (optional)</li>
                        </ul>
                        
                        <h3 class="text-xl font-semibold mb-3">Quick Installation</h3>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <div class="flex items-center justify-between px-4 py-2 bg-gray-800">
                                <span class="text-gray-400 text-sm">Terminal</span>
                                <button class="copy-btn text-gray-400 hover:text-white transition" data-code="composer create-project takenncs/framework my-app">
                                    <i class="far fa-copy"></i>
                                </button>
                            </div>
                            <pre class="p-4 text-sm text-green-400 overflow-x-auto"><code>composer create-project takenncs/framework my-app</code></pre>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-3">Directory Structure</h3>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <pre class="p-4 text-sm text-gray-300"><code>my-app/
├── app/
│   ├── Controllers/
│   ├── Core/
│   └── Models/
├── public/
│   └── index.php
├── routes/
│   └── web.php
├── views/
│   ├── layouts/
│   └── home.php
├── .env
└── composer.json</code></pre>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg opacity-50 cursor-not-allowed" disabled>
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </button>
                            <a href="#installation" class="next-section px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition">
                                Next: Installation <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </section>
                    
                    <section id="installation" class="doc-section mb-12 hidden">
                        <h2 class="text-3xl font-bold mb-6 flex items-center">
                            <span class="bg-purple-500 text-white w-8 h-8 rounded-lg flex items-center justify-center text-lg mr-3">2</span>
                            Installation
                        </h2>
                        
                        <h3 class="text-xl font-semibold mb-3">Manual Installation</h3>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <pre class="p-4 text-sm text-green-400"><code>git clone https://github.com/takenncs/framework.git
cd framework
composer install
cp .env.example .env
php artisan key:generate</code></pre>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-3">Environment Configuration</h3>
                        <p class="mb-4">Configure your <code>.env</code> file:</p>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <pre class="p-4 text-sm text-yellow-400"><code>APP_NAME=Takenncs
APP_ENV=development
APP_URL=http://localhost/framework

DB_HOST=localhost
DB_NAME=framework
DB_USER=root
DB_PASSWORD=</code></pre>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <a href="#getting-started" class="prev-section px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </a>
                            <a href="#configuration" class="next-section px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition">
                                Next: Configuration <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </section>
                    
                    <section id="routing" class="doc-section mb-12 hidden">
                        <h2 class="text-3xl font-bold mb-6 flex items-center">
                            <span class="bg-green-500 text-white w-8 h-8 rounded-lg flex items-center justify-center text-lg mr-3">3</span>
                            Routing
                        </h2>
                        
                        <p class="mb-4">Define your routes in <code>routes/web.php</code>:</p>
                        
                        <h3 class="text-xl font-semibold mb-3">Basic Routes</h3>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <div class="flex items-center justify-between px-4 py-2 bg-gray-800">
                                <span class="text-gray-400 text-sm">routes/web.php</span>
                                <button class="copy-btn text-gray-400 hover:text-white transition" data-code="&lt;?php

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->post('/contact', 'ContactController@store');">
                                    <i class="far fa-copy"></i>
                                </button>
                            </div>
                            <pre class="p-4 text-sm text-green-400"><code>&lt;?php

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->post('/contact', 'ContactController@store');</code></pre>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-3">Route Parameters</h3>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <pre class="p-4 text-sm text-green-400"><code>$router->get('/users/{id}', 'UserController@show');
$router->get('/posts/{slug}', 'PostController@show');
$router->get('/categories/{category}/posts', 'PostController@byCategory');</code></pre>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-3">Route Groups</h3>
                        <div class="bg-gray-900 rounded-xl overflow-hidden mb-6">
                            <pre class="p-4 text-sm text-green-400"><code>$router->group('/admin', function($router) {
    $router->get('/', 'AdminController@index');
    $router->get('/users', 'AdminController@users');
    $router->get('/settings', 'AdminController@settings');
});</code></pre>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <a href="#configuration" class="prev-section px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </a>
                            <a href="#controllers" class="next-section px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition">
                                Next: Controllers <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </section>
                                        
                </div>
            </div>
            
            <div class="mt-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-4 border border-gray-100 dark:border-gray-700">
                <h4 class="font-semibold mb-2 flex items-center">
                    <i class="fas fa-list mr-2 text-blue-500"></i>
                    On This Page
                </h4>
                <div class="flex flex-wrap gap-2" id="on-this-page">
                    <a href="#getting-started" class="text-sm px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full hover:bg-blue-100 dark:hover:bg-blue-900 transition">Getting Started</a>
                    <a href="#installation" class="text-sm px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full hover:bg-blue-100 dark:hover:bg-blue-900 transition">Installation</a>
                    <a href="#configuration" class="text-sm px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full hover:bg-blue-100 dark:hover:bg-blue-900 transition">Configuration</a>
                    <a href="#routing" class="text-sm px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full hover:bg-blue-100 dark:hover:bg-blue-900 transition">Routing</a>
                    <a href="#controllers" class="text-sm px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full hover:bg-blue-100 dark:hover:bg-blue-900 transition">Controllers</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.doc-nav-link {
    @apply flex items-center px-3 py-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition;
}
.doc-nav-link.active {
    @apply bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400;
}
.doc-nav-link i {
    @apply mr-3 text-gray-400;
}
.doc-nav-link.active i {
    @apply text-blue-500;
}
.prose pre {
    @apply bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto;
}
.prose code {
    @apply bg-gray-100 dark:bg-gray-800 text-red-500 dark:text-red-400 px-1 py-0.5 rounded text-sm;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.doc-section');
    const navLinks = document.querySelectorAll('.doc-nav-link');
    const progressBar = document.getElementById('doc-progress-bar');
    const progressText = document.getElementById('doc-progress');
    const currentSectionTitle = document.getElementById('current-section');
    
    function updateProgress() {
        let visibleCount = 0;
        sections.forEach(section => {
            if (!section.classList.contains('hidden')) {
                visibleCount++;
            }
        });
        
        const total = sections.length;
        const progress = (visibleCount / total) * 100;
        progressBar.style.width = progress + '%';
        progressText.textContent = Math.round(progress) + '%';
        
        const visibleSection = Array.from(sections).find(s => !s.classList.contains('hidden'));
        if (visibleSection) {
            const title = visibleSection.querySelector('h2').textContent;
            currentSectionTitle.textContent = title;
        }
    }
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            const targetId = this.getAttribute('href').substring(1);
            
            sections.forEach(section => {
                section.classList.add('hidden');
            });
            
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.remove('hidden');
                
                // Smooth scroll
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
            updateProgress();
        });
    });
    
    document.querySelectorAll('.next-section').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            const targetLink = document.querySelector(`.doc-nav-link[href="${href}"]`);
            if (targetLink) {
                targetLink.click();
            }
        });
    });
    
    document.querySelectorAll('.prev-section').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            const targetLink = document.querySelector(`.doc-nav-link[href="${href}"]`);
            if (targetLink) {
                targetLink.click();
            }
        });
    });
    
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            const code = this.getAttribute('data-code');
            await navigator.clipboard.writeText(code);
            
            const originalHtml = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check"></i>';
            
            setTimeout(() => {
                this.innerHTML = originalHtml;
            }, 2000);
        });
    });
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                const onThisPageLink = document.querySelector(`#on-this-page a[href="#${id}"]`);
                if (onThisPageLink) {
                    onThisPageLink.classList.add('bg-blue-100', 'dark:bg-blue-900');
                }
            }
        });
    }, { threshold: 0.5 });
    
    sections.forEach(section => {
        observer.observe(section);
    });
    
    updateProgress();
});
</script>