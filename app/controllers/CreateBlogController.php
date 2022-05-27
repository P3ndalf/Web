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
        if (sizeOf($_POST)) {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('CreateBlogView.php', $this->model);
    }
}
