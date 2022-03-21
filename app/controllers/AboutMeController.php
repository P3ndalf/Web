<?php
class AboutMeController extends Controller
{
    function indexAction()
    {
        $this->view->generate('AboutMeView.php');
    }
}
