<?php

include_once 'app/models/CommentsModel.php';
include_once 'app/models/LoginModel.php';

class UserBlogController extends Controller
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

    function sendCommentAction()
    {
        $inputData = file_get_contents("php://input");
        $data = json_decode($inputData, true);

        if ($data) {
            if ($data['content'] != "") {
                $data['authorId'] = $_SESSION['user']['id'];
                $this->commentsModel->addComment($data);
                $data['authorName'] = $this->userModel->getUserById($data['authorId'])->name;
            }
        }

        echo json_encode($data);
    }
}
