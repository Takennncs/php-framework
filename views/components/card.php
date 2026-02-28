<?php
$title = $title ?? '';
$icon = $icon ?? null;
$slot = $slot ?? '';
$padding = $padding ?? 'p-6';
$hover = $hover ?? true;
?>

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 <?= $padding ?> <?= $hover ? 'hover:shadow-xl transition-all duration-300 hover:-translate-y-1' : '' ?>">
    <?php if ($title): ?>
        <h3 class="text-xl font-bold mb-4 flex items-center">
            <?php if ($icon): ?>
                <i class="fas fa-<?= $icon ?> text-blue-500 mr-2"></i>
            <?php endif; ?>
            <?= $title ?>
        </h3>
    <?php endif; ?>
    
    <?= $slot ?>
</div>