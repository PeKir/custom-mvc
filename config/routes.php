<?php

use core\Router;

Router::configRoutes([
    // MainController
    '' => [
        'controller' => 'main',
        'action'     => 'index',
    ],
    '{page:\d+}' => [
        'controller' => 'main',
        'action'     => 'index',
    ],
    'sign_up' => [
        'controller' => 'main',
        'action'     => 'sign_up',
    ],
    'sign_in' => [
        'controller' => 'main',
        'action'     => 'sign_in',
    ],
    'sign_out' => [
        'controller' => 'main',
        'action'     => 'sign_out',
    ],
    'post/{post:\w+}' => [
        'controller' => 'main',
        'action'     => 'post',
    ],
    'about' => [
        'controller' => 'main',
        'action'     => 'about',
    ],

    // AdminController
    'admin' => [
        'controller' => 'admin',
        'action'     => 'index',
    ],
    'admin/add_post' => [
        'controller' => 'admin',
        'action'     => 'add_post',
    ],
    'admin/edit_post/{id:\d+}' => [
        'controller' => 'admin',
        'action'     => 'edit_post',
    ],
    'admin/delete_post/{id:\d+}' => [
        'controller' => 'admin',
        'action'     => 'delete_post',
    ],

]);
