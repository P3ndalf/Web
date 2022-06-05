<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class HomeController extends Controller
{
    function indexAction()
    {
        $this->view->generate('HomeView.php');
    }
}
