<?php


/**
 * Permission config must and looks like:
 *
 * [
 *  'admin' => [
 *      'controller_name' => true,
 *      'admin' => true,
 *      'main' => true,
 *   ],
 *  'user' => [
 *      'main' => true,
 *   ]
 * ]
 *
 */

use core\utils\AccessHandler;

AccessHandler::setPermissionConfig([

    'admin' => [
        'admin' => true,
        'main' => true,
    ],
    'user' => [
        'main' => true,
    ],
    'unauthorized' => [
        'main' => true,
    ],


]);