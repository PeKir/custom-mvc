<?php

namespace core\database;


interface DataBaseProvider
{

    public static function getConnection();
}