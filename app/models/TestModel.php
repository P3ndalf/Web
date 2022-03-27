<?php
include 'D:/Education/University/Web/Solutions/new_web/app/models/validators/TestValidator.php';
class TestModel extends Model {
    public $fields = [
        "name" => "",
        "lastName" => "",
        "email" => "",
        "qstn1" => "",
        "qstn2" => "",
        "qstn3" => ""
    ];

    function __construct()
    {
        $this->validator = new TestValidator();
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
        if (!empty($post_array["email"])) {
            $this->fields["email"] = $post_array["email"];
        }
        if (!empty($post_array["name"])) {
            $this->fields["name"] = $post_array["name"];
        }
        if (!empty($post_array["lastName"])) {
            $this->fields["lastName"] = $post_array["lastName"];
        }
        if (!empty($post_array["qstn1"])) {
            $this->fields["qstn1"] = $post_array["qstn1"];
        }
        if (!empty($post_array["qstn2"])) {
            $this->fields["qstn2"] = $post_array["qstn2"];
        }
        if (!empty($post_array["qstn3"])) {
            $this->fields["qstn3"] = $post_array["qstn3"];
        }
        $this->validator->validate($this->fields);
    }
}