<?php
class GalleryController extends Controller
{
    function indexAction()
    {
        $this->view->generate('GalleryView.php', $this->model);
    }
}
