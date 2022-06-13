<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class LoginController extends Controller
{
    function loginAction()
    {
        if (sizeOf($_POST)) {
            unset($_POST["submit"]);
            $validationResult = $this->model->validateForm($_POST);
        } else {
            $validationResult = false;
        }
        if ($validationResult == true) {
            $user = $this->model->getUser($_POST['name'], $_POST['password']);
            if ($user) {
                $_SESSION['user']['role'] = $user->role;
                $_SESSION['user']['name'] = $user->name;
                $_SESSION['user']['id'] = $user->id;
                $this->view->redirect("/Home/");
            } else {
                echo 'Такого пользователя не существует';
            }
        }
        $this->view->generate('LoginView.php', $this->model);
    }
}
