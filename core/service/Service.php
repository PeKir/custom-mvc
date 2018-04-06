<?php

namespace core\service;


use core\database\RepositoryFactory;

abstract class Service
{
    /** @var \core\database\Repository $repository */
    protected $repository;

    public static function loadRepository($name)
    {
        return RepositoryFactory::createRepositoryByName($name);
    }
}