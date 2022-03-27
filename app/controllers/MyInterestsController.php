<?php
class MyInterestsController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new MyInterestsModel();
    }

    function indexAction()
    {
        $this->view->generate('MyInterestsView.php', $this->model);
    }
}
