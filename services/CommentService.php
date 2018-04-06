<?php

namespace services;


use core\service\Service;
use core\utils\Utils;
use DateTime;

class CommentService extends Service
{

    public function saveComment($userName, $postMachineName, $commentText)
    {
        $user = $this->getUser($userName);
        $post = $this->getPost($postMachineName);

        $date     = new DateTime();
        $unixDate = $date->getTimestamp();

        $newComment = [
            'id'      => 'null',
            'post_id' => $post->getId(),
            'user_id' => $user->getId(),
            'text'    => $commentText,
            'date'    => $unixDate,
        ];

        $this->repository = self::loadRepository('comment');
        $result           = $this->repository->saveNew($newComment);

        if ($result['status'] == 'ok') {
            $result['messageClass'] = 'text-success';
            $result['message']      = 'Comment added.';
        } elseif ($result['status'] == 'error') {
            $result['messageClass'] = 'text-danger';
            $result['message']      = 'Comment not added.';
        }

        return $result;
    }

    public function getAllCommentsForPost($postMachineName)
    {
        $post = $this->getPost($postMachineName);

        $fields = [
            'id',
            'post_id',
            'user_id',
            'text',
            'date',
        ];

        $this->repository = self::loadRepository('comment');
        $result
                          = $this->repository->getAllRowsCertainFieldsFromTableByParameter($fields,
            ['post_id' => $post->getId()], true, 'date', true);

        foreach ($result as &$comment) {
            $userId               = $this->repository->getSubEntityById('user',
                $comment['user_id']);
            $comment['user_name'] = $userId->getName();
            $comment['date']      = Utils::defineDateTime($comment['date']);
        }

        return $result;
    }

    private function getUser($userName)
    {
        $this->repository = self::loadRepository('user');

        return $this->repository->getEntityByParameter('name',
            $userName);
    }

    private function getPost($postMachineName)
    {
        $this->repository = self::loadRepository('post');

        return $this->repository->getEntityByParameter('machine_name',
            $postMachineName);
    }
}