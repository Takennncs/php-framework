<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-in">
        <div class="text-center">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                Create Account
            </h2>
            <p class="text-gray-600 dark:text-gray-400">Join the Takenncs community</p>
        </div>
        
        <?php 
        $error = \App\Core\Session::flash('error');
        if ($error): 
        ?>
            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-r-lg">
                <p class="text-red-700 dark:text-red-300"><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>
        
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <form method="POST" action="/framework/register" class="space-y-6">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           placeholder="Nickname or full name"
                           required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 
                                  focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                  transition-all duration-200">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           name="email" 
                           placeholder="your@email.com"
                           required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 
                                  focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                  transition-all duration-200">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                           name="password" 
                           placeholder="••••••••"
                           required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 
                                  focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                  transition-all duration-200">
                </div>
                
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-lg font-semibold 
                               hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105 
                               shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <i class="fas fa-user-plus mr-2"></i>
                    Create Account
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <a href="/framework/login" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">
                        Sign in here
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>