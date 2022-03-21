<?php
class HistoryController extends Controller
{
    function indexAction()
    {
        $this->view->generate('HistoryView.php');
    }
}
