<?php

namespace repository;


use core\database\Repository;

class UserRepository extends Repository
{

    public function validateNew($entity)
    {

        $nameDuplicate = $this->getEntityByParameter('name', $entity['name']);
        if ($nameDuplicate) {
            $this->errorMessage = 'This name ('. $entity['name'] . ') already exist.';
            return false;
        }

        $emailDuplicate = $this->getEntityByParameter('name', $entity['email']);
        if ($emailDuplicate) {
            $this->errorMessage = 'This email ('. $entity['email'] . ') already exist.';
            return false;
        }

        return true;
    }

}