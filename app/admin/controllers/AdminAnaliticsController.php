<?php
class AdminAnaliticsController extends Controller
{
    function indexAction()
    {
        $this->view->generate('AnaliticsView.php', $this->model);
    }
}
