<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class RegistrationController extends Controller
{
    function registrationAction()
    {
        if (sizeOf($_POST)) {
            unset($_POST["submit"]);
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
}
