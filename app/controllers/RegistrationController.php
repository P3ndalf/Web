<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class RegistrationController extends Controller
{
    function indexAction()
    {
        $this->view->generate('RegistrationView.php', $this->model);
    }

    function registrateAction()
    {
        if (isset($_SESSION['user'])) {
            $this->view->redirect('/Home/');
        }

        $response = [];

        if (!empty($_POST)) {
            unset($_POST["submit"]);
            $validationResult = $this->model->validateForm($_POST);
        } else {
            $validationResult = false;
        }
        $response['saved'] = false;

        if ($validationResult == true) {
            if ($this->model->isExist($_POST['name'], $_POST['password']) == true) {
                $this->model->errorMessages['name'] = 'Такой пользователь уже существует';
                $response['saved'] = false;
            } else {
                $this->model->save();
                $response['saved'] = true;
                if ($_POST['name'] == 'admin' && $_POST['password'] == 'admin') {
                    $_SESSION['user']['role'] = 'admin';
                } else {
                    $_SESSION['user']['role'] = 'user';
                }
                $_SESSION['user']['id'] = $this->model->getByFields($_POST['name'], $_POST['email'], $_POST['password'])->id;
                $_SESSION['user']['name'] = $_POST['name'];
            }
        }

        $response['fields'] = $this->model->fields;
        $response['errors'] = $this->model->validator->errMessages;

        echo json_encode($response);
    }
}
