<?php

namespace controllers;

use core\Controller;
use core\Pagination;
use core\service\ServiceFactory;


class MainController extends Controller
{

    const POSTS_ON_PAGE = 10;

    public function indexAction()
    {
        /** @var \services\PostService $service */

        $service = ServiceFactory::createServiceByName('post');

        if (isset($this->route['page']) && isset($this->route['page']) > 0) {
            $activePage = $this->route['page'];
            $result     = $service->getPostsByPagination($activePage,
                self::POSTS_ON_PAGE);
        } else {
            $activePage = 0;
            $result     = $service->getPostsByPagination($activePage,
                self::POSTS_ON_PAGE);
        }
        $pagination = new Pagination($activePage, $service->getCountOfRows(),
            self::POSTS_ON_PAGE);

        $html = $pagination->getHtml();
        $this->view->render('Main Page',
            ['posts' => $result, 'pagination' => $html]);
    }

    public function postAction()
    {
        $result   = [];
        $message  = [];
        $comments = [];
        $postMachineName = $this->route['post'];
        if ( ! empty($_POST)) {
            /** @var \services\CommentService $service */
            $service   = ServiceFactory::createServiceByName('comment');
            $message = $service->saveComment($_SESSION['name'],
                $postMachineName, $_POST['text']);
        }

        if ($postMachineName) {
            /** @var \services\PostService $service */
            $service = ServiceFactory::createServiceByName('post');
            $result  = $service->getPostByMachineName($postMachineName);
            /** @var \services\CommentService $service */
            $service   = ServiceFactory::createServiceByName('comment');
            $comments = $service->getAllCommentsForPost($postMachineName);
        }
        $this->view->render('Post Page',
            ['post' => $result, 'message' => $message, 'comments' => $comments]);
    }

    public function sign_inAction()
    {
        /** @var \services\UserService $service */

        if ($_SESSION['role'] != 'unauthorized') {
            $this->redirectTo('');
        } elseif (empty($_POST)) {
            $this->view->render('Login Page');
        } elseif ($_SESSION['role'] = 'unauthorized') {
            $service = ServiceFactory::createServiceByName('user');
            $result  = $service->singInService();
            if ($result['status'] == 'ok') {
                $this->redirectTo('');
            } elseif ($result['status'] == 'error') {
                $this->view->render('Sing In Page', $result);
            }
        }
    }

    public function sign_outAction()
    {
        session_unset();
        $this->redirectTo('');
    }

    public function sign_upAction()
    {
        /** @var \services\UserService $service */

        if ($_SESSION['role'] != 'unauthorized') {
            $this->redirectTo('');
        } elseif (empty($_POST)) {
            $this->view->render('Registration Page');
        } elseif ($_SESSION['role'] = 'unauthorized') {
            $service = ServiceFactory::createServiceByName('user');
            $result  = $service->singUpService();
            $this->view->render('Sing Up Page', $result);
        }
    }

    public function aboutAction()
    {
        $this->view->render('About Page');
    }


}