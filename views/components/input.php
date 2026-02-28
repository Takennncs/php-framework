<?php
$type = $type ?? 'text';
$name = $name ?? '';
$label = $label ?? '';
$value = $value ?? '';
$placeholder = $placeholder ?? '';
$required = $required ?? false;
$error = $error ?? null;
?>

<div class="mb-4">
    <?php if ($label): ?>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            <?= $label ?>
            <?php if ($required): ?>
                <span class="text-red-500">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>
    
    <input type="<?= $type ?>" 
           name="<?= $name ?>" 
           value="<?= htmlspecialchars($value) ?>"
           placeholder="<?= $placeholder ?>"
           <?= $required ? 'required' : '' ?>
           class="w-full px-4 py-3 rounded-lg border <?= $error ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' ?> 
                  focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                  transition-all duration-200">
    
    <?php if ($error): ?>
        <p class="mt-1 text-sm text-red-600 dark:text-red-400"><?= $error ?></p>
    <?php endif; ?>
</div>