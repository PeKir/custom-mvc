<?php

namespace controllers;


use core\Controller;
use core\service\ServiceFactory;

class AdminController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->setDefaultTemplate('admin');
    }

    public function indexAction()
    {
        /** @var \services\PostService $service */

        $service = ServiceFactory::createServiceByName('post');
        $result  = $service->getAllPosts();
        $values  = ['posts' => $result];
        $this->view->render('All Posts List Page', $values);
    }

    public function add_postAction()
    {
        /** @var \services\PostService $service */

        $title = 'Create New Post Page';

        if (empty($_POST)) {
            $this->view->render($title, []);
        } else {
            $service = ServiceFactory::createServiceByName('post');
            $result  = $service->createNewPost();
            $this->view->render($title, $result);
        }
    }

    public function edit_postAction()
    {
        /** @var \services\PostService $service */

        $service = ServiceFactory::createServiceByName('post');
        if (empty($_POST)) {
            $result = $service->getPostForEdit($this->route['id']);
            $this->view->render('Edit this Post Page', ['post' => $result]);
        } else {
            $result = $service->updatePost($_POST);
            $this->view->render('Edit this Post Page', $result);
        }
    }


    public function delete_postAction()
    {
        /** @var \services\PostService $service */

        if (isset($this->route['id'])) {
            $service = ServiceFactory::createServiceByName('post');
            $service->deletePost($this->route['id']);
        }

        $this->redirectTo('admin');
    }
}