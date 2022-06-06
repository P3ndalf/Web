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
}
