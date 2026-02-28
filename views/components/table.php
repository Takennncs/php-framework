<?php
$headers = $headers ?? [];
$rows = $rows ?? [];
$striped = $striped ?? true;
$hover = $hover ?? true;
?>

<div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <?php if (!empty($headers)): ?>
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <?php foreach ($headers as $header): ?>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <?= $header ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
        <?php endif; ?>
        
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            <?php foreach ($rows as $index => $row): ?>
                <tr class="<?= $striped && $index % 2 === 0 ? 'bg-gray-50 dark:bg-gray-700/50' : '' ?> <?= $hover ? 'hover:bg-gray-100 dark:hover:bg-gray-700 transition' : '' ?>">
                    <?php foreach ($row as $cell): ?>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            <?= $cell ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>