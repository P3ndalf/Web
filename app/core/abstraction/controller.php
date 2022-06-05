<?php
class Controller
{
    public $model;
    public $view;
    private $route = [];

    function __construct($route = [])
    {
        $this->route = $route;
        $this->view = new View($this->route['role']);
    }

    function indexAction()
    {
    }
}
