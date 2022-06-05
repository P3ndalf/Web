<?php
class LoginController extends Controller
{
    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('LoginView.php');
    }
}
