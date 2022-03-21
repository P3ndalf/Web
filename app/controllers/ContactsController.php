<?php
class ContactsController extends Controller
{
    function indexAction()
    {
        $this->view->generate('ContactsView.php');
    }
}
