<?php
$type = $type ?? 'info';
$message = $message ?? '';
$dismissible = $dismissible ?? true;

$icons = [
    'success' => 'fa-check-circle',
    'error' => 'fa-exclamation-circle',
    'warning' => 'fa-exclamation-triangle',
    'info' => 'fa-info-circle'
];

$colors = [
    'success' => 'bg-green-50 dark:bg-green-900/20 border-green-500 text-green-800 dark:text-green-300',
    'error' => 'bg-red-50 dark:bg-red-900/20 border-red-500 text-red-800 dark:text-red-300',
    'warning' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-500 text-yellow-800 dark:text-yellow-300',
    'info' => 'bg-blue-50 dark:bg-blue-900/20 border-blue-500 text-blue-800 dark:text-blue-300'
];
?>

<div class="rounded-lg border-l-4 p-4 <?= $colors[$type] ?> relative animate-fade-in" role="alert">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <i class="fas <?= $icons[$type] ?> text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <div class="text-sm">
                <?= $message ?>
            </div>
        </div>
        <?php if ($dismissible): ?>
            <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        <?php endif; ?>
    </div>
</div>