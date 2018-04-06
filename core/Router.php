<?php

namespace core;


use core\utils\ErrorHandler;

class Router
{

    protected static $routes = [];
    protected $params = [];

    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        return
            self::$instance === null
                ? self::$instance = new static()
                : self::$instance;
    }

    public static function configRoutes($routeConfig)
    {
        foreach ($routeConfig as $route => $param) {
            $route                = preg_replace('/{([a-z]+):([^\}]+)}/',
                '(?P<\1>\2)', $route);
            $route                = '#^' . $route . '$#';
            self::$routes[$route] = $param;
        }
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach (self::$routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;

                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $classController = ucfirst($this->params['controller'])
                               . 'Controller';
            $path            = '\controllers\\' . $classController;

            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';

                if (method_exists($path, $action)) {
                    $controllerInstance = new $path($this->params);
                    $controllerInstance->$action();
                } else {
                    $message = "Method $action() not exist in $path";
                    ErrorHandler::handleError(404, $message);
                }

            } else {
                $message = $path . ' not found';
                ErrorHandler::handleError(404, $message);
            }
        } else {
            ErrorHandler::handleError(404);
        }
    }
}