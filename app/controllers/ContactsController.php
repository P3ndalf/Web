<?php
class ContactsController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new ContactsModel();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->generate('ContactsView.php', $this->model);
    }
}
