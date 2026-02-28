<?php

namespace App\Core;

class UI
{
    public static function component(string $name, array $data = [])
    {
        extract($data);
        require VIEWS_PATH . "/components/{$name}.php";
    }
    
        public static function url(string $path = ''): string
        {
            $base = Config::getInstance()->get('app.url', 'http://localhost');
            $basePath = Config::getInstance()->get('app.base_path', '/framework');
            
            if ($basePath && strpos($path, '/') === 0) {
                $path = substr($path, 1);
            }
            
            $url = rtrim($base, '/') . $basePath;
            if (!empty($path)) {
                $url .= '/' . ltrim($path, '/');
            }
            
            return $url;
        }
    
    public static function asset(string $path): string
    {
        return self::url('public/assets/' . ltrim($path, '/'));
    }
    
    public static function css(string $file): string
    {
        $filePath = PUBLIC_PATH . '/assets/css/' . $file;
        $version = file_exists($filePath) ? filemtime($filePath) : time();
        return '<link rel="stylesheet" href="' . self::asset('css/' . $file) . '?v=' . $version . '">';
    }
    
    public static function js(string $file): string
    {
        $filePath = PUBLIC_PATH . '/assets/js/' . $file;
        $version = file_exists($filePath) ? filemtime($filePath) : time();
        return '<script src="' . self::asset('js/' . $file) . '?v=' . $version . '"></script>';
    }
    
    public static function img(string $path, array $attributes = []): string
    {
        $src = self::asset('images/' . ltrim($path, '/'));
        $attrs = '';
        
        foreach ($attributes as $key => $value) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
        }
        
        return '<img src="' . $src . '"' . $attrs . '>';
    }
    
    public static function icon(string $name, string $class = ''): string
    {
        return '<i class="fas fa-' . $name . ' ' . $class . '"></i>';
    }
    
    public static function badge(string $text, string $type = 'default'): string
    {
        $colors = [
            'default' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
            'success' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
            'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
            'danger' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
            'info' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
            'primary' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
        ];
        
        $color = $colors[$type] ?? $colors['default'];
        
        return '<span class="px-2 py-1 text-xs font-semibold rounded-full ' . $color . '">' . htmlspecialchars($text) . '</span>';
    }
    
    public static function button(string $text, array $options = []): string
    {
        $type = $options['type'] ?? 'button';
        $variant = $options['variant'] ?? 'primary';
        $size = $options['size'] ?? 'md';
        $icon = $options['icon'] ?? null;
        $href = $options['href'] ?? null;
        $class = $options['class'] ?? '';
        $attributes = $options['attributes'] ?? [];
        
        $variants = [
            'primary' => 'bg-gradient-to-r from-blue-500 to-purple-600 text-white hover:from-blue-600 hover:to-purple-700',
            'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600',
            'outline' => 'border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white',
            'danger' => 'bg-red-500 text-white hover:bg-red-600',
            'success' => 'bg-green-500 text-white hover:bg-green-600',
        ];
        
        $sizes = [
            'sm' => 'px-3 py-1 text-sm',
            'md' => 'px-4 py-2',
            'lg' => 'px-6 py-3 text-lg',
        ];
        
        $btnClass = 'inline-flex items-center justify-center font-semibold rounded-lg transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ' . $variants[$variant] . ' ' . $sizes[$size] . ' ' . $class;
        
        $attrs = '';
        foreach ($attributes as $key => $value) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
        }
        
        $iconHtml = $icon ? '<i class="fas fa-' . $icon . ' mr-2"></i>' : '';
        
        if ($href) {
            return '<a href="' . htmlspecialchars($href) . '" class="' . $btnClass . '"' . $attrs . '>' . $iconHtml . $text . '</a>';
        }
        
        return '<button type="' . $type . '" class="' . $btnClass . '"' . $attrs . '>' . $iconHtml . $text . '</button>';
    }
    
    public static function form(string $action, string $method = 'POST', array $options = []): string
    {
        $method = strtoupper($method);
        $html = '<form action="' . htmlspecialchars($action) . '" method="' . ($method === 'GET' ? 'GET' : 'POST') . '"';
        
        if (isset($options['files']) && $options['files']) {
            $html .= ' enctype="multipart/form-data"';
        }
        
        if (isset($options['class'])) {
            $html .= ' class="' . $options['class'] . '"';
        }
        
        if (isset($options['id'])) {
            $html .= ' id="' . $options['id'] . '"';
        }
        
        $html .= '>';
        
        if ($method !== 'GET' && $method !== 'POST') {
            $html .= '<input type="hidden" name="_method" value="' . $method . '">';
        }
        
        return $html;
    }
    
    public static function input(string $name, string $type = 'text', $value = '', array $options = []): string
    {
        $classes = 'w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100';
        
        if (isset($options['class'])) {
            $classes .= ' ' . $options['class'];
        }
        
        $html = '<input type="' . $type . '" name="' . $name . '" value="' . htmlspecialchars($value) . '" class="' . $classes . '"';
        
        if (isset($options['placeholder'])) {
            $html .= ' placeholder="' . $options['placeholder'] . '"';
        }
        
        if (isset($options['required']) && $options['required']) {
            $html .= ' required';
        }
        
        if (isset($options['disabled']) && $options['disabled']) {
            $html .= ' disabled';
        }
        
        if (isset($options['id'])) {
            $html .= ' id="' . $options['id'] . '"';
        }
        
        $html .= '>';
        
        return $html;
    }
    
    public static function select(string $name, array $options, $selected = null, array $attributes = []): string
    {
        $classes = 'w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100';
        
        if (isset($attributes['class'])) {
            $classes .= ' ' . $attributes['class'];
        }
        
        $html = '<select name="' . $name . '" class="' . $classes . '"';
        
        if (isset($attributes['id'])) {
            $html .= ' id="' . $attributes['id'] . '"';
        }
        
        if (isset($attributes['required']) && $attributes['required']) {
            $html .= ' required';
        }
        
        $html .= '>';
        
        foreach ($options as $value => $label) {
            $html .= '<option value="' . htmlspecialchars($value) . '"';
            
            if ($selected == $value) {
                $html .= ' selected';
            }
            
            $html .= '>' . htmlspecialchars($label) . '</option>';
        }
        
        $html .= '</select>';
        
        return $html;
    }
    
    public static function textarea(string $name, string $value = '', array $options = []): string
    {
        $classes = 'w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100';
        
        if (isset($options['class'])) {
            $classes .= ' ' . $options['class'];
        }
        
        $html = '<textarea name="' . $name . '" class="' . $classes . '"';
        
        if (isset($options['placeholder'])) {
            $html .= ' placeholder="' . $options['placeholder'] . '"';
        }
        
        if (isset($options['rows'])) {
            $html .= ' rows="' . $options['rows'] . '"';
        }
        
        if (isset($options['id'])) {
            $html .= ' id="' . $options['id'] . '"';
        }
        
        $html .= '>' . htmlspecialchars($value) . '</textarea>';
        
        return $html;
    }
    
    public static function pagination(int $currentPage, int $totalPages, string $url): string
    {
        if ($totalPages <= 1) {
            return '';
        }
        
        $html = '<div class="flex justify-center items-center space-x-2 mt-8">';
        
        // Previous button
        if ($currentPage > 1) {
            $html .= '<a href="' . str_replace('{page}', $currentPage - 1, $url) . '" class="px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">';
            $html .= '<i class="fas fa-chevron-left"></i>';
            $html .= '</a>';
        }
        
        // Page numbers
        $start = max(1, $currentPage - 2);
        $end = min($totalPages, $currentPage + 2);
        
        if ($start > 1) {
            $html .= '<a href="' . str_replace('{page}', 1, $url) . '" class="px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">1</a>';
            if ($start > 2) {
                $html .= '<span class="px-3 py-2">...</span>';
            }
        }
        
        for ($i = $start; $i <= $end; $i++) {
            if ($i == $currentPage) {
                $html .= '<span class="px-3 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white border border-transparent rounded-lg">' . $i . '</span>';
            } else {
                $html .= '<a href="' . str_replace('{page}', $i, $url) . '" class="px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">' . $i . '</a>';
            }
        }
        
        if ($end < $totalPages) {
            if ($end < $totalPages - 1) {
                $html .= '<span class="px-3 py-2">...</span>';
            }
            $html .= '<a href="' . str_replace('{page}', $totalPages, $url) . '" class="px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">' . $totalPages . '</a>';
        }
        
        // Next button
        if ($currentPage < $totalPages) {
            $html .= '<a href="' . str_replace('{page}', $currentPage + 1, $url) . '" class="px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">';
            $html .= '<i class="fas fa-chevron-right"></i>';
            $html .= '</a>';
        }
        
        $html .= '</div>';
        
        return $html;
    }
}