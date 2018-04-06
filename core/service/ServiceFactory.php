<?php

namespace core\service;


use core\utils\ErrorHandler;

class ServiceFactory
{
    public static function createServiceByName($name)
    {
        $path = '\services\\' . ucfirst($name) . 'Service';
        if (class_exists($path)) {

            return new $path($name);
        } else {
            ErrorHandler::handleError(520,"$path not found.");
        }

        return null;
    }
}