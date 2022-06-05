<?php
class GuestBookController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('GuestBookView.php', $this->model);
    }
}
