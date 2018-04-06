<?php

namespace core\database;


use core\utils\ErrorHandler;

class RepositoryFactory
{

    public static function createRepositoryByName($name)
    {
        $path = '\repository\\' . ucfirst($name) . 'Repository';
        if (class_exists($path)) {

            return new $path($name);
        } else {
            ErrorHandler::handleError(520,"$path not found.");
        }

        return null;
    }

}