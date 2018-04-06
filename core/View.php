<?php

namespace core;


class View
{

    private $path;
    private $template = '';

    public function __construct($route)
    {
        $this->path = $route['controller'] . '/' . $route['action'] . '.php';
    }

    function setTemplate($template = 'default')
    {
        $this->template = $template;
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'resources/web/' . $this->path;
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require "resources/templates/$this->template/$this->template.php";
        } else {
            $message = "Path: '$path' not found";
            self::renderError(404, $message);
        }
    }

    public static function renderError($code, $message = '')
    {
        http_response_code($code);
        $path = "resources/web/errors/$code.php";
        if (file_exists($path)) {
            require $path;
            exit;
        }
    }
}