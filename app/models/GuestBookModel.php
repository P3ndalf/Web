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
        $this->commentaries = $this->sortByDate($this->getCommentaries($this->directory . $this->commonFile));
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
        if (!empty($_FILES['uploadedFile']['name'])) {
            $file = $_FILES['uploadedFile'];
            $this->readFile($file);
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
                $this->addComment($this->fields);
                $this->fields = $this->emptyFields;
            }
        }
    }

    public function addComment($fields)
    {
        array_push($this->commentaries, $fields);
        $data = json_encode($this->commentaries, JSON_UNESCAPED_UNICODE);
        $file = fopen($this->directory . $this->commonFile, "w+");
        fwrite($file, $data);
        fclose($file);
    }

    private function getCommentaries($path)
    {
        $data = file_get_contents($path);
        if (!empty($data)) {
            return json_decode($data, true);
        }
    }

    public function readFile($file)
    {
        $uploadFilePath = $this->directory . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            $commentaries = $this->getCommentaries($uploadFilePath);
            foreach ($commentaries as $comment) {
                $this->addComment($comment);
            }
        } else {
            echo "Ошибка загрузки!\n";
        }
    }

    private function sortByDate($values)
    {
        for ($i = 0; $i < sizeOf($values) - 1; $i++) {
            for ($j = $i + 1; $j < sizeOf($values); $j++) {
                if ($values[$i]['date'] < $values[$j]['date']) {
                    $temp = $values[$i]['date'];
                    $values[$i]['date'] = $values[$j]['date'];
                    $values[$j]['date'] = $temp;
                }
            }
        }
        return $values;
    }
}
