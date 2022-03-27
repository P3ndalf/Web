<?php
class TestValidator extends FormValidator{
    public $errMessages = [
        "name" => "",
        "lastName" => "",
        "email" => "",
        "qstn1" => "",
        "qstn2" => "",
        "qstn3" => ""
    ];

    public $predicates = [
        "name" => ["isNotEmpty", "isWord"],
        "lastName" => ["isNotEmpty", "isWord"],
        "email" => ["isNotEmpty", "isEmail"],
        "qstn1" => ["isNotEmpty"],
        "qstn2" => ["isNotEmpty"],
        "qstn3" => ["isNotEmpty", "isMinAnswSize"]
    ];

    function validate($post_array, $predicates = [])
    {
        parent::validate($post_array, $this->predicates);
    }
}