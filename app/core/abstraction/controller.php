<?php

include_once 'app/models/active_records/ActiveRecordAnalitics.php';

class Controller
{
    public $model;
    public $view;
    protected $route = [];

    function __construct($route = [])
    {
        $this->route = $route;
        $this->view = new View($this->route['role']);

        if ($this->route['role'] == 'user') {
            $this->tableStatistic = new ActiveRecordAnalitics;
            $this->tableStatistic->saveAnalitic($route['controllerRequest'] . '/' . $route['actionRequest']);
        }
    }

    function indexAction()
    {
    }
}
