<?php

include_once 'app/models/active_records/ActiveRecordBlog.php';

class BlogModel extends Model
{
    public $blogs = array();

    public $directory = 'assets/blogImages/';

    public $currentPage = 0;
    public $size = 0;

    public $blogRecord;

    function __construct()
    {
        $this->blogRecord = new ActiveRecordBlog();
    }

    function getRecords($countOnPage)
    {
        $countRecords = $this->blogRecord->getCount();
        $this->size = (int)($countRecords / $countOnPage);
        $this->currentPage = isset($_GET["pageNumber"]) ? $this->setPagination($_GET["pageNumber"], $countOnPage) : 0;
        $firstElementPage = $countOnPage * $this->currentPage;

        $blogs = $this->blogRecord->getPagedByDesc($firstElementPage, $countOnPage, "date");
        if ($blogs == null) {
            $blogs = array();
        }
        return $blogs;
    }

    function getRecord($id)
    {
        $stmt = "id='${id}'";
        return $this->blogRecord->find($stmt);
    }

    function setPagination($pageNumber, $countOnPage)
    {
        $countRecords = $this->blogRecord->getCount();
        $this->size = (int)($countRecords / $countOnPage);
        if ($countRecords > 0 && ($countRecords % $countOnPage) == 0) {
            $this->size = $this->size - 1;
        }
        if ($pageNumber <= $this->size && $pageNumber > 0) {
            return $pageNumber;
        } elseif ($pageNumber > $this->size) {
            return $this->size;
        } else {
            return 0;
        }
    }

    function updateBlog($array)
    {
        $this->blogRecord->id = $array['id'];
        $this->blogRecord->theme = $array['theme'];
        $this->blogRecord->imageLink = $array['imagelink'];
        $this->blogRecord->content = $array['content'];
        $this->blogRecord->date = date('d.m.y h:i:s');
        $this->blogRecord->save();
    }
}
