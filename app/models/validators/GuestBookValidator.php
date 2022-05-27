<?php
class GuestBookValidator extends FormValidator
{
    public $errMessages = [
        "name" => "",
        "lastName" => "",
        "email" => "",
        "comment" => ""
    ];

    public $predicates = [
        "name" => ["isNotEmpty", "isWord"],
        "lastName" => ["isNotEmpty", "isWord"],
        "email" => ["isNotEmpty", "isEmail"],
        "comment" => ["isNotEmpty"]
    ];
}
