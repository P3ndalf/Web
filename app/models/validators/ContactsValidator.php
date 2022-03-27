<?php
class ContactsValidator extends FormValidator
{
    public $errMessages = [
        "name" => "",
        "lastName" => "",
        "gender" => "",
        "email" => "",
        "phone" => "",
        "dateValue" => "",
        "age" => ""
    ];

    public $predicates = [
        "name" => ["isNotEmpty", "isWord"],
        "lastName" => ["isNotEmpty", "isWord"],
        "gender" => ["isNotEmpty"],
        "email" => ["isNotEmpty", "isEmail"],
        "phone" => ["isNotEmpty", "isPhone"],
        "dateValue" => ["isNotEmpty", "isDate"],
        "age" => ["isNotEmpty"]
    ];

    function validate($post_array, $predicates = [])
    {
        parent::validate($post_array, $this->predicates);
    }
}
