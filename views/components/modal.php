<div id="<?= $id ?? 'modal' ?>" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <?php if (isset($title)): ?>
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold" id="modal-title">
                    <?= $title ?>
                </h3>
            </div>
            <?php endif; ?>
            
            <div class="px-6 py-4">
                <?= $content ?? '' ?>
            </div>
            
            <?php if (isset($footer)): ?>
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 flex justify-end space-x-3">
                <?= $footer ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>