<?php

namespace services;


use core\service\Service;
use core\utils\Utils;

class UserService extends Service
{

    public function singInService()
    {

        $this->repository = self::loadRepository('user');
        $result     = $this->repository->getEntityByParameter('name',
            $_POST['name']);

        if ($result == false) {
            $result = [
                'status'       => 'error',
                'errorMessage' => 'I do not know anyone by name: '
                                  . $_POST['name'],
            ];
        } else {
            $roleResult = $this->repository->getSubEntityById('role',
                $result->getRole());

            $result->setRole($roleResult->getName());

            $password = Utils::hashSting($_POST['password']);
            if ($result->getPassword() == $password) {
                $_SESSION['name'] = $result->getName();
                $_SESSION['token'] = $result->getToken();
                $_SESSION['role'] = $result->getRole();

                $result = [
                    'status' => 'ok',
                ];
            } else {
                $result = [
                    'status'       => 'error',
                    'errorMessage' => 'Password is wrong, try one more time.',
                ];
            }
        }

        return $result;
    }

    public function singUpService()
    {

        $newUser             = [];
        $newUser['id']       = 'null';
        $newUser['name']     = $_POST['name'];
        $newUser['password'] = Utils::hashSting($_POST['password']);
        $newUser['email']    = $_POST['email'];
        $newUser['token']    = Utils::randomStr(25);

        $this->repository = self::loadRepository('user');
        $result     = $this->repository->saveNew($newUser);

        if ($result['status'] == 'ok') {
            $result['messageClass'] = 'text-success';
            $result['message']      = 'New user ' . $newUser['name']
                                      . ' successfully created.';
        } elseif ($result['status'] == 'error') {
            $result['messageClass'] = 'text-danger';
            $result['message']      = $this->repository->getErrorMessage();
        }

        return $result;
    }

}