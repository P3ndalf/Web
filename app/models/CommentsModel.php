<?php

include_once 'app/models/active_records/ActiveRecordComment.php';

class CommentsModel extends Model
{
    public $commentsRecord;

    public array $validated_fields = [
        "content" => ""
    ];

    function __construct()
    {
        $this->commentsRecord = new ActiveRecordComment();
    }

    public function addComment($post_data)
    {
        $this->commentsRecord->authorId = $post_data['authorId'];
        $this->commentsRecord->blogId = $post_data['blogId'];
        $this->commentsRecord->content = $post_data['content'];
        $this->commentsRecord->date = date('d.m.y h:i:s');

        return $this->commentsRecord->save();
    }

    public function getComments($blogId)
    {
        $stmt = " WHERE blogId=${blogId}";
        return $this->commentsRecord->getData($stmt);
    }
}
