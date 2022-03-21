<?php
class EducationController extends Controller
{
    function indexAction()
    {
        $this->view->generate('EducationView.php');
    }
}
