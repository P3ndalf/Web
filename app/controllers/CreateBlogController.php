<?php
class CreateBlogController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new CreateBlogModel();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('CreateBlogView.php', $this->model);
    }
}