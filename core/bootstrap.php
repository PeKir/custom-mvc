<?php

use core\Router;

function appStartUp()
{
    session_start();
//    session_unset();

    if ($_SESSION == null) {
//        $_SESSION['signedIn'] = false;
        $_SESSION['role'] = 'unauthorized';
    }

    Router::getInstance()->run();
}