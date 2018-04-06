<?php

use core\database\Repository;

Repository::setConfig([
    'user'    => [
        'base_table' => 'users',
        'model'      => '\entities\User',
        'role'       => [
            'base_table' => 'roles',
            'model'      => '\entities\Role',
        ],
    ],
    'post'    => [
        'base_table' => 'posts',
        'model'      => '\entities\Post',
    ],
    'comment' => [
        'base_table' => 'comments',
        'model'      => '\entities\Comments',
        'user'       => [
            'base_table' => 'users',
            'model'      => '\entities\User',
        ],
    ],
]);