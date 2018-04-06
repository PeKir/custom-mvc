<?php

use core\database\DataBaseConfig;

/**
 * DataBase config must have
 *
 * @param $config
 *
 * Default properties:
 *
 * [
 * 'db_type' => 'mysql',
 * 'db_host' => 'localhost',
 * 'db_port' => '3306',
 * 'db_name' => 'test',
 * 'db_user' => 'root',
 * 'db_password' => '',
 * ]
 *
 */
DataBaseConfig::setConfig([
    'db_type'     => 'mysql',
    'db_host'     => 'localhost',
    'db_port'     => '3306',
    'db_name'     => 'test',
    'db_user'     => 'root',
    'db_password' => '',
]);