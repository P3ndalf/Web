<?php
include 'D:/Education/University/Web/Solutions/new_web/app/models/validators/FormValidator.php';
class Model
{
    public $validator;

    function __construct()
    {
        $this->validator = new FormValidator();
    }

    function validateForm($post_data)
    {
        $this->validator->validate($post_data);
    }

    function getData(){
        
    }
}
