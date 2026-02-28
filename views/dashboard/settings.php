<?php
\App\Core\View::layout('dashboard');
$user = $data['user'] ?? null;
?>

<div class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Account Settings</h1>
    <p class="text-gray-600 dark:text-gray-400">Manage your preferences and account settings</p>
</div>

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700">
    <div class="border-b border-gray-200 dark:border-gray-700">
        <nav class="flex space-x-8 px-6" aria-label="Tabs">
            <button class="tab-button active py-4 px-1 border-b-2 border-blue-500 text-blue-600 dark:text-blue-400 font-medium text-sm">
                General
            </button>
            <button class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 font-medium text-sm">
                Notifications
            </button>
            <button class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 font-medium text-sm">
                Privacy
            </button>
            <button class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 font-medium text-sm">
                Security
            </button>
        </nav>
    </div>
    
    <div class="tab-content p-6" id="general">
        <form method="POST" action="<?= \App\Core\UI::url('settings/update') ?>">
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Language
                    </label>
                    <select name="language" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                        <option value="en">English</option>
                        <option value="et">Eesti</option>
                        <option value="ru">Русский</option>
                        <option value="fi">Suomi</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Timezone
                    </label>
                    <select name="timezone" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                        <option value="Europe/Tallinn">Europe/Tallinn</option>
                        <option value="Europe/Helsinki">Europe/Helsinki</option>
                        <option value="Europe/Riga">Europe/Riga</option>
                        <option value="Europe/Vilnius">Europe/Vilnius</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Date Format
                    </label>
                    <select name="date_format" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700">
                        <option value="Y-m-d">2026-02-28</option>
                        <option value="d.m.Y">28.02.2026</option>
                        <option value="m/d/Y">02/28/2026</option>
                    </select>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="tab-content p-6 hidden" id="notifications">
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-medium">Email Notifications</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Receive email updates about your account</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                </label>
            </div>
            
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-medium">Browser Notifications</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Get notified in your browser</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                </label>
            </div>
            
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-medium">Weekly Newsletter</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Receive weekly updates and news</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                </label>
            </div>
            
            <div class="flex justify-end pt-4">
                <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition">
                    Save Preferences
                </button>
            </div>
        </div>
    </div>
    
    <div class="tab-content p-6 hidden" id="privacy">
        <div class="space-y-6">
            <div>
                <h3 class="font-medium mb-2">Profile Visibility</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="privacy" class="w-4 h-4 text-blue-600" checked>
                        <span class="ml-2 text-sm">Public - Everyone can see your profile</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="privacy" class="w-4 h-4 text-blue-600">
                        <span class="ml-2 text-sm">Private - Only registered users</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="privacy" class="w-4 h-4 text-blue-600">
                        <span class="ml-2 text-sm">Hidden - Only you can see your profile</span>
                    </label>
                </div>
            </div>
            
            <div>
                <h3 class="font-medium mb-2">Activity Status</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 rounded" checked>
                        <span class="ml-2 text-sm">Show when you're active</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 rounded" checked>
                        <span class="ml-2 text-sm">Show read receipts</span>
                    </label>
                </div>
            </div>
            
            <div class="flex justify-end pt-4">
                <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition">
                    Save Privacy Settings
                </button>
            </div>
        </div>
    </div>
    
    <div class="tab-content p-6 hidden" id="security">
        <div class="space-y-6">
            <div>
                <h3 class="font-medium mb-2">Two-Factor Authentication</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Add an extra layer of security to your account</p>
                <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Enable 2FA
                </button>
            </div>
            
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <h3 class="font-medium mb-2">Active Sessions</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div>
                            <p class="font-medium">Chrome on Windows</p>
                            <p class="text-xs text-gray-500">Current session</p>
                        </div>
                        <span class="text-xs text-green-600">Active now</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div>
                            <p class="font-medium">Firefox on MacOS</p>
                            <p class="text-xs text-gray-500">Tallinn, Estonia</p>
                        </div>
                        <span class="text-xs text-gray-500">2 days ago</span>
                    </div>
                </div>
                <button class="mt-3 text-sm text-red-600 dark:text-red-400 hover:underline">
                    Log out all other sessions
                </button>
            </div>
            
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <h3 class="font-medium mb-2 text-red-600 dark:text-red-400">Delete Account</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Permanently delete your account and all data</p>
                <button class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Delete Account
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active', 'border-blue-500', 'text-blue-600', 'dark:text-blue-400');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            
            button.classList.add('active', 'border-blue-500', 'text-blue-600', 'dark:text-blue-400');
            button.classList.remove('border-transparent', 'text-gray-500');
            
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            const tabId = button.textContent.trim().toLowerCase();
            document.getElementById(tabId).classList.remove('hidden');
        });
    });
</script>