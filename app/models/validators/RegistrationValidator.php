<?php
class RegistrationValidator extends FormValidator
{
    public $errMessages = [
        "name" => "",
        "lastName" => "",
        "password" => "",
        "email" => "",
    ];

    public $predicates = [
        "name" => ["isNotEmpty", "isWord"],
        "lastName" => ["isNotEmtpy", "isWord"],
        "password" => ["isNotEmpty"],
        "email" => ["isNotEmpty", "isEmail"]
    ];
}
