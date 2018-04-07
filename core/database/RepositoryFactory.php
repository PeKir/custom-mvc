<?php

namespace core\database;


use repository\CommentRepository;
use repository\PostRepository;
use repository\UserRepository;

class RepositoryFactory
{

    public static function createRepositoryByName($name)
    {
        if ($name == 'user') {
            return new UserRepository($name);
        } elseif ($name == 'post') {
            return new PostRepository($name);
        } elseif ($name == 'comment') {
            return new CommentRepository($name);
        }
    }

}