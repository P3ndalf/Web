<?php
include 'app/models/validators/LoginValidator.php';
include_once 'app/models/active_records/ActiveRecordUser.php';

class LoginModel extends Model
{

    public $fields = [
        "name" => "",
        "password" => "",
    ];

    public $userRecord;

    function __construct()
    {
        $this->validator = new LoginValidator();
        $this->userRecord = new ActiveRecordUser();
    }

    function validateForm($post_array)
    {
        if (!empty($post_array["name"])) {
            $this->fields["name"] = $post_array["name"];
        }
        if (!empty($post_array["password"])) {
            $this->fields["password"] = $post_array["password"];
        }
        $this->validator->validate($this->fields);

        if ($this->validator->isErrorExist == false) {
            return true;
        } else {
            return false;
        }
    }

    function getUser($name, $password)
    {
        $password = md5($password);

        $stmt = "name='${name}' and password='${password}'";

        $user = $this->userRecord->find($stmt);
        if ($user) {
            return $user;
        }
    }

    function getUserById($id)
    {
        $stmt = "id='${id}'";

        $user = $this->userRecord->find($stmt);
        if ($user) {
            return $user;
        }
    }
}
