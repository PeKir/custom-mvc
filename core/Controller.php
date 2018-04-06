<?php

namespace core;


use core\utils\AccessHandler;

abstract class Controller
{

    protected $route;
    protected $view;

    function __construct($route)
    {
        if (AccessHandler::checkAccess($route)) {
            $this->route = $route;
            $this->view  = new View($route);
            $this->setDefaultTemplate();
        } else {
            View::renderError(401);
        }
    }

    protected function setDefaultTemplate($template = null)
    {
        if (isset($template)) {
            $this->view->setTemplate($template);
        } else {
            $this->view->setTemplate();
        }
    }

    protected function redirectTo($url)
    {
        header('location: /' . $url);

        exit;
    }


}