<?php

namespace core\utils;


use core\View;

class ErrorHandler
{

    private function __construct()
    {
    }

    public static function handleError($code, $message = '')
    {
        View::renderError($code, $message);
    }


}