<?php
class BlogController extends Controller
{    
    function indexAction()
    {
        $this->view->generate('BlogView.php',  $this->model);
    }
}
