<?php
$type = $type ?? 'button';
$text = $text ?? 'Button';
$variant = $variant ?? 'primary';
$size = $size ?? 'md';
$icon = $icon ?? null;
$fullWidth = $fullWidth ?? false;

$variants = [
    'primary' => 'bg-gradient-to-r from-blue-500 to-purple-600 text-white hover:from-blue-600 hover:to-purple-700 shadow-lg hover:shadow-xl',
    'secondary' => 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600',
    'outline' => 'border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white',
    'danger' => 'bg-red-500 text-white hover:bg-red-600 shadow-lg hover:shadow-xl',
    'success' => 'bg-green-500 text-white hover:bg-green-600 shadow-lg hover:shadow-xl',
];

$sizes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-5 py-2.5',
    'lg' => 'px-7 py-3 text-lg',
];

$classes = "inline-flex items-center justify-center font-semibold rounded-lg transition-all transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 " . 
           $variants[$variant] . " " . 
           $sizes[$size] . " " . 
           ($fullWidth ? 'w-full' : '');
?>

<button type="<?= $type ?>" class="<?= $classes ?>">
    <?php if ($icon): ?>
        <i class="fas fa-<?= $icon ?> mr-2"></i>
    <?php endif; ?>
    <?= $text ?>
</button>