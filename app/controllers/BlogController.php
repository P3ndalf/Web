<?php
class BlogController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function indexAction()
    {
        $this->view->generate('BlogView.php',  $this->model);
    }
}
