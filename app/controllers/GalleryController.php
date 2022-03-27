<?php
class GalleryController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new GalleryModel();
    }

    function indexAction()
    {
        $this->view->generate('GalleryView.php', $this->model);
    }
}
