<?php

namespace core\database;


use PDO;

class MySqlDataBaseProvider implements DataBaseProvider
{


    private function __construct()
    {
    }

    public static function getConnection()
    {
        return new PDO(DataBaseConfig::getConfigString(),
                DataBaseConfig::getUser(), DataBaseConfig::getPassword());
    }
}