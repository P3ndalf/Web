<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class UserController extends Controller
{
    function logoutAction()
    {
        unset($_SESSION['user']);
        $this->view->redirect("Home/");
    }
}
