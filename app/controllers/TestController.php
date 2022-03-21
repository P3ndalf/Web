<?php
class TestController extends Controller
{
    function indexAction()
    {
        $this->view->generate('TestView.php');
    }
}
