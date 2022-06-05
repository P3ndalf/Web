<?php
class BlogController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new BlogModel();
    }
    
    function indexAction()
    {
        $this->view->generate('BlogView.php',  $this->model);
    }
}
