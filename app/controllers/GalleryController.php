<?php
class GalleryController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function indexAction()
    {
        $this->view->generate('GalleryView.php', $this->model);
    }
}
