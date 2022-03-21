<?php
class MyInterestsController extends Controller
{
    function indexAction()
    {
        $this->view->generate('MyInterestsView.php');
    }
}
