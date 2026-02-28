<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-in">
        <div class="text-center">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                Welcome Back
            </h2>
            <p class="text-gray-600 dark:text-gray-400">Sign in to your account</p>
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
            <form method="POST" action="/framework/login" class="space-y-6">
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
                
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                    
                    <a href="/framework/password/reset" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                        Forgot password?
                    </a>
                </div>
                
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-lg font-semibold 
                               hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105 
                               shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Sign In
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?
                    <a href="/framework/register" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">
                        Register here
                    </a>
                </p>
            </div>
            
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <p class="text-xs text-center text-gray-500 dark:text-gray-400 mb-3">Demo credentials</p>
                <div class="flex flex-col space-y-2">
                    <span class="inline-flex justify-center px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300">
                        admin@example.com / password
                    </span>
                    <span class="inline-flex justify-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                        user@example.com / password
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fadeIn 0.5s ease-out;
}
</style>