<?php

namespace core\database;


class DataBaseConfig
{

    private static $type = 'mysql';
    private static $host = 'localhost';
    private static $port = '3306';
    private static $user = 'test';
    private static $password = '';

    private static $config = [];

    private function __construct()
    {
    }

    public static function getConfigString()
    {
        if (empty(self::$config)) {
            echo 'DB config is empty';
        } else {
            return self::$config['db_type'] . ':host='
                   . self::$config['db_host']
                   . ';dbname=' . self::$config['db_name'];
        }
    }

    public static function parseConfig($config)
    {
        self::$type     = $config['db_type'] ?? self::$type;
        self::$host     = $config['db_host'] ?? self::$host;
        self::$port     = $config['db_port'] ?? self::$port;
        self::$user     = $config['db_user'] ?? self::$user;
        self::$password = $config['db_password'] ?? self::$password;
    }

    /**
     * DataBase config must have
     *
     * @param $config
     *  [
     *  'db_type' => 'mysql',
     *  'db_host' => 'localhost',
     *  'db_port' => '3306',
     *  'db_name' => 'test',
     *  'db_user' => 'root',
     *  'db_password' => '',
     *  ]
     *
     */
    public static function setConfig($config)
    {
        self::parseConfig($config);
        self::$config = $config;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return self::$type;
    }

    /**
     * @return string
     */
    public static function getUser(): string
    {
        return self::$user;
    }

    /**
     * @return string
     */
    public static function getPassword(): string
    {
        return self::$password;
    }

    /**
     * @return array
     */
    public static function getConfig(): array
    {
        return self::$config;
    }


}