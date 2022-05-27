<?php

include 'D:/OpenServer/domains/newweb/app/models/validators/BlogValidator.php';
include_once 'app/models/active_records/ActiveRecordBlog.php';

class CreateBlogModel extends Model
{
    public $directory = 'assets/blogImages/';

    public $fields = [
        "blogTheme" => "",
        "blogImage" => "",
        "blogContent" => ""
    ];

    public $blogRecord;

    function __construct()
    {
        $this->validator = new BlogValidator();
        $this->blogRecord = new ActiveRecordBlog();
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
        if (!empty($_FILES['uploadedFile'])) {
            $this->uploadedFile = $_FILES["uploadedFile"]["tmp_name"];
            $this->getFromCSV($this->uploadedFile);
        }

        foreach ($post_array as $key => $value) {
            $this->fields[$key] = $value;
        }

        $this->validator->validate($this->fields);

        if ($this->validator->isErrorExist == false) {
            $this->save();
        }
    }

    function save()
    {
        $this->blogRecord->theme = $this->fields['blogTheme'];
        if ($_FILES['blogImage']) {
            $imageUniqKey = uniqid();
            $this->blogRecord->imageLink = $this->getBlogFileUrl($imageUniqKey, $_FILES['blogImage']);
        }
        $this->blogRecord->content = $this->fields['blogContent'];
        $this->blogRecord->date = date('d.m.y h:i:s');

        $this->blogRecord->save();
    }

    private function getBlogFileUrl($imageUniqKey, $file)
    {
        $uploadFilePath = $imageUniqKey . '_' . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $this->directory . $uploadFilePath);
        return $uploadFilePath;
    }

    private function getFromCSV($fileName)
    {
        $file = fopen($fileName, "r") or die("Файл нельзя открыть");

        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            $lines = explode(',', $data[0]);
            $this->blogRecord->theme = $lines[0];
            $this->blogRecord->content = $lines[1];
            $this->blogRecord->imageLink = $lines[2];
            $this->blogRecord->date = $lines[3];

            $this->blogRecord->save();
        }
        fclose($file);
    }
}
