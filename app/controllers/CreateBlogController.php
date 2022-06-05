<?php
class CreateBlogController extends Controller
{
    function indexAction()
    {
        if (sizeOf($_POST)) {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('CreateBlogView.php', $this->model);
    }
}
