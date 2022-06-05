<?php
class LoginValidator extends FormValidator
{
    public $errMessages = [
        "name" => "",
        "password" => ""
    ];

    public $predicates = [
        "name" => ["isNotEmpty", "isWord"],
        "password" => ["isNotEmpty"]
    ];

    function validate($post_array, $predicates = [])
    {
        parent::validate($post_array, $this->predicates);
    }
}
