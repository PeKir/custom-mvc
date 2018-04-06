<?php

namespace repository;


use core\database\Repository;

class CommentRepository extends Repository
{

    public function validateNew($entity)
    {
        return true;
    }
}