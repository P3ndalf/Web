<?php

include_once 'app/models/CommentsModel.php';
include_once 'app/models/LoginModel.php';

class AdminBlogController extends Controller
{
    public $commentsModel;
    public $userModel;

    function __construct($route = [])
    {
        parent::__construct($route);
        $this->commentsModel = new CommentsModel();
        $this->userModel = new LoginModel();
    }

    function indexAction()
    {
        $this->view->generate('BlogView.php',  $this->model);
    }

    function detailedBlogAction()
    {
        $detailedBlogModel = $this->model->getRecord($_GET["id"]);
        $comments = $this->commentsModel->getComments($_GET["id"]);
        if ($comments != null)
            foreach ($comments as $comment) {
                $comment->authorName = $this->userModel->getUserById($comment->authorId)->name;
            }
        else {
            $comments = array();
        }

        $this->view->generate('DetailedBlogView.php', $detailedBlogModel, $comments);
    }

    function editBlogAction()
    {
        $xmlString = file_get_contents('php://input');
        $xml = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        if (!empty($array)) {
            if ($array['content'] != "" && $array['theme'] != "") {
                $this->model->updateBlog($array);
            }
        }
        echo json_encode($array);
    }
}
