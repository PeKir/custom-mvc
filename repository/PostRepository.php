<?php

namespace repository;


use core\database\Repository;

class PostRepository extends Repository
{

    public function validateNew($entity)
    {
        $nameDuplicate = $this->getEntityByParameter('title', $entity['title']);
        if ($nameDuplicate) {
            $this->errorMessage = 'The post with such title ('
                                  . $entity['title'] . ') already exist.';

            return false;
        }

        $machineNameDuplicate = $this->getEntityByParameter('machine_name', $entity['machine_name']);
        if ($machineNameDuplicate) {
            $this->errorMessage = 'The post with such machine_name ('
                                  . $entity['machine_name'] . ') already exist.';

            return false;
        }

        return true;
    }
}