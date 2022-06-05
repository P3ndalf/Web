<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class UserController extends Controller
{
    function loginAction()
    {
        if (sizeOf($_POST)) {
            $validationResult = $this->model->validateForm($_POST);
        } else {
            $validationResult = false;
        }
        if ($validationResult == true) {
            $user = $this->model->getUser($_POST['name'], $_POST['password']);
            if ($user) {
                $_SESSION['user']['role'] = $user['role'];
                $_SESSION['user']['name'] = $user['name'];
                $this->view->redirect("Home/");
            } else {
                echo 'Такого пользователя не существует';
            }
        }
        $this->view->generate('LoginView.php', $this->model);
    }

    function registrationAction()
    {
        if (sizeOf($_POST)) {
            $validationResult = $this->model->validateForm($_POST);
        } else {
            $validationResult = false;
        }
        if ($validationResult == true) {
            if ($this->model->isExist($_POST['name'], $_POST['password']) == true) {
                echo 'Такой пользователь уже существует';
            } else {
                $this->model->save();
                if ($_POST['name'] == 'admin' && $_POST['password'] == 'admin') {
                    $_SESSION['user']['role'] = 'admin';
                } else {
                    $_SESSION['user']['role'] = 'user';
                }
                $_SESSION['user']['name'] = $_POST['name'];
                $this->view->redirect("Home/");
            }
        }
        $this->view->generate('RegistrationView.php', $this->model);
    }

    function logoutAction()
    {
        unset($_SESSION['user']);
        $this->view->redirect("Home/");
    }
}
