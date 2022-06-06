<?php
class ContactsController extends Controller
{
    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('ContactsView.php', $this->model);
    }
}
