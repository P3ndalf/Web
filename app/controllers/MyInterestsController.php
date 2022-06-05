<?php
class MyInterestsController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function indexAction()
    {
        $this->view->generate('MyInterestsView.php', $this->model);
    }
}
