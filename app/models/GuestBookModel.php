<?php
include 'app/models/validators/GuestBookValidator.php';

class GuestBookModel extends Model
{
    public $directory = 'assets/commentaries/';
    public $commonFile = 'commentaries.inc.txt';

    private $emptyFields = [
        "name" => "",
        "lastName" => "",
        "email" => "",
        "comment" => "",
        "date" => ""
    ];

    public $fields = [
        "name" => "",
        "lastName" => "",
        "email" => "",
        "comment" => "",
        "date" => ""
    ];

    public $commentaries;

    function __construct()
    {
        $this->validator = new GuestBookValidator();
        $this->getCommentaries($this->directory . $this->commonFile);
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
        if (!empty($_FILES['uploadedFile']['name'])) {
            $this->uploadedFile = $post_array["uploadedFile"];
            $this->readFile();
        } else {
            if (!empty($post_array["email"])) {
                $this->fields["email"] = $post_array["email"];
            }
            if (!empty($post_array["name"])) {
                $this->fields["name"] = $post_array["name"];
            }
            if (!empty($post_array["lastName"])) {
                $this->fields["lastName"] = $post_array["lastName"];
            }
            if (!empty($post_array["comment"])) {
                $this->fields["comment"] = $post_array["comment"];
            }
            $this->validator->validate($this->fields);

            if ($this->validator->isErrorExist == false) {
                $this->fields['date'] = date('d.m.y');
                $this->addComment();
                $this->fields = $this->emptyFields;
            }
        }
    }

    public function addComment()
    {
        array_push($this->commentaries, $this->fields);
        $data = json_encode($this->commentaries, JSON_UNESCAPED_UNICODE);
        $file = fopen($this->path, "w+");
        fwrite($file, $data);
        fclose($file);
    }

    private function getCommentaries($path)
    {
        $data = file_get_contents($path);
        if (!empty($data)) {
            $this->commentaries = json_decode(file_get_contents($path), true);
        }
    }

    public function readFile()
    {
        $uploadFilePath = $this->directory . basename($_FILES['uploadedFile']['name']);
        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadFilePath)) {
            $this->getCommentaries($uploadFilePath);
        } else {
            echo "Ошибка загрузки!\n";
        }
    }
}
