<?php
\App\Core\View::layout('dashboard');
$user = $data['user'] ?? null;
?>

<div class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Profile Settings</h1>
    <p class="text-gray-600 dark:text-gray-400">Manage your account information</p>
</div>

<div class="grid md:grid-cols-3 gap-6">
    <div class="md:col-span-1">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
            <div class="text-center">
                <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                    <span class="text-white text-4xl font-bold"><?= strtoupper(substr($user->name ?? 'U', 0, 1)) ?></span>
                </div>
                <h2 class="text-xl font-bold"><?= htmlspecialchars($user->name ?? 'User') ?></h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4"><?= htmlspecialchars($user->email ?? '') ?></p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                    <?= ucfirst($user->role ?? 'user') ?>
                </span>
            </div>
            
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Member since</span>
                        <span class="text-sm font-medium">February 2026</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Last login</span>
                        <span class="text-sm font-medium">Today</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Posts</span>
                        <span class="text-sm font-medium">12</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="md:col-span-2">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
            <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>
            
            <form method="POST" action="<?= \App\Core\UI::url('profile/update') ?>">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Full Name
                        </label>
                        <input type="text" 
                               name="name" 
                               value="<?= htmlspecialchars($user->name ?? '') ?>"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email Address
                        </label>
                        <input type="email" 
                               name="email" 
                               value="<?= htmlspecialchars($user->email ?? '') ?>"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Bio
                        </label>
                        <textarea name="bio" 
                                  rows="4"
                                  class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700"
                                  placeholder="Tell us about yourself...">Full-stack developer passionate about PHP and modern web technologies.</textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="mt-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
            <h2 class="text-lg font-semibold mb-6">Change Password</h2>
            
            <form method="POST" action="<?= \App\Core\UI::url('profile/password') ?>">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Current Password
                        </label>
                        <input type="password" 
                               name="current_password" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            New Password
                        </label>
                        <input type="password" 
                               name="new_password" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Confirm New Password
                        </label>
                        <input type="password" 
                               name="confirm_password" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>