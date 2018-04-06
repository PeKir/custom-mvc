<?php

namespace services;


use core\service\Service;
use core\utils\Utils;
use DateTime;

class PostService extends Service
{

    public function createNewPost()
    {
        $date     = new DateTime();
        $unixDate = $date->getTimestamp();

        $newPost                 = [];
        $newPost['id']           = 'null';
        $newPost['title']        = $_POST['title'];
        $newPost['machine_name'] = $_POST['machine_name'];
        $newPost['text']         = $_POST['text'];
        $newPost['date']         = '' . $unixDate;
        $newPost['token']        = Utils::randomStr(20);

        $this->repository = self::loadRepository('post');

        if ($this->repository->saveNew($newPost)) {
            $result['messageClass'] = 'text-success';
            $result['message']      = 'New post saved.';
        } else {
            $result['messageClass'] = 'text-danger';
            $result['message']      = $this->repository->getErrorMessage();
        }

        return $result;
    }

    public function getAllPosts()
    {
        $fields = [
            'id',
            'title',
            'machine_name',
            'date',
        ];

        $this->repository = self::loadRepository('post');
        $result
                          = $this->repository->getAllRowsCertainFieldsFromTable($fields);

        foreach ($result as &$post) {
            $post['date']   = Utils::defineDateTime($post['date']);
            $post['delete'] = '/admin/delete_post/' . $post['id'];
            $post['edit']   = '/admin/edit_post/' . $post['id'];
        }

        return $result;
    }

    public function getPostForEdit($id)
    {
        $this->repository = self::loadRepository('post');
        $result
                          = $this->repository->getEntityById($id);
        $result->setDate(Utils::defineDateTime($result->getDate()));

        return $result;
    }

    public function updatePost($post)
    {
        $date     = new DateTime();
        $unixDate = $date->getTimestamp();

        $post['date'] = '' . $unixDate;

        $this->repository = self::loadRepository('post');

        if ($this->repository->updateEntity($post)) {
            $result['messageClass'] = 'text-success';
            $result['message']      = 'Post updated.';
        } else {
            $result['messageClass'] = 'text-danger';
            $result['message']      = 'Post not updated.';
        }

        return $result;
    }

    public function deletePost($id)
    {
        $this->repository = self::loadRepository('post');
        $this->repository->deleteEntityById($id);
    }

    public function getPostsByPagination($from, $limit)
    {
        $fields = [
            'title',
            'machine_name',
            'date',
        ];

        $from = $from * $limit;

        $this->repository = self::loadRepository('post');
        $result
                          = $this->repository->getAllRowsCertainFieldsFromTable($fields,
            $from, $limit);

        foreach ($result as &$post) {
            $post['date'] = Utils::defineDate($post['date']);
        }

        return $result;
    }

    public function getPostByMachineName($machineName)
    {
        $this->repository = self::loadRepository('post');
        $result = $this->repository->getEntityByParameter('machine_name', $machineName);
        $result->setDate(Utils::defineDate($result->getDate()));
        return $result;
    }

    public function getCountOfRows()
    {
        $this->repository = self::loadRepository('post');
        return $this->repository->getRowsCount();
    }
}