<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class UserController extends Controller
{
    function loginAction()
    {
        if (sizeOf($_POST)) {
            $result = $this->model->validateForm($_POST);
        } else {
            $result = false;
        }
        if ($result != false) {
            if ($_POST['name'] == 'admin' && $_POST['password'] == 'admin') {
                $_SESSION['user']['role'] = 'admin';
            } else {
                $_SESSION['user']['role'] = 'user';
            }
            $_SESSION['user']['name'] = $_POST['name'];
            $this->view->redirect("Home/");
        }
        $this->view->generate('LoginView.php', $this->model);
    }

    function logoutAction()
    {
        unset($_SESSION['user']);
        $this->view->redirect("Home/");
    }
}
