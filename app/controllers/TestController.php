<?php
class TestController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new TestModel();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('TestView.php', $this->model);
    }
}
