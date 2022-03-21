<?php
class HomeController extends Controller
{
    function indexAction()
    {
        $this->view->generate('HomeView.php');
    }
}
