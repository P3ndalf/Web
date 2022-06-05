<?php
class BlogValidator extends FormValidator
{
    public $errMessages = [
        "blogTheme" => "",
        "blogImage" => "",
        "blogContent" => ""
    ];

    public $predicates = [
        "blogTheme" => ["isNotEmpty",],
        "blogImage" => ["isImageLink"],
        "blogContent" => ["isNotEmpty"]
    ];
}
