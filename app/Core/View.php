<?php

namespace App\Core;

class View
{
    protected static string $layout = 'app';
    
    /**
     * Set the layout to use
     */
    public static function layout(string $layout): void
    {
        self::$layout = $layout;
    }
    
    /**
     * Render a view with optional layout
     */
    public static function render(string $view, array $data = [])
    {
        extract($data);
        
        ob_start();
        $view_file = VIEWS_PATH . "/{$view}.php";
        
        if (!file_exists($view_file)) {
            die("View not found: {$view}");
        }
        
        require $view_file;
        $content = ob_get_clean();
        
        $layout_file = VIEWS_PATH . "/layouts/" . self::$layout . ".php";
        if (file_exists($layout_file)) {
            require $layout_file;
        } else {
            echo $content;
        }
    }
}