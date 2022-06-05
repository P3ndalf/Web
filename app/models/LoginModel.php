<?php
include 'app/models/validators/LoginValidator.php';
include_once 'app/models/active_records/ActiveRecordUser.php';

class LoginModel extends Model
{
    public $fields = [
        "name" => "",
        "password" => ""
    ];

    public $userRecord;

    function __construct()
    {
        $this->validator = new LoginValidator();
        $this->testRecord = new ActiveRecordUser();
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
        if (!empty($post_array["password"])) {
            $this->fields["password"] = $post_array["password"];
        }
        if (!empty($post_array["name"])) {
            $this->fields["name"] = $post_array["name"];
            $this->validator->validate($this->fields);

            if ($this->validator->isErrorExist == false) {
                $this->save();
            }
        }
    }

    function save()
    {
        $this->userRecord->name = $this->fields['name'];
        $this->userRecord->password = $this->fields['password'];
        if ($this->fields['name'] == 'admin' && $this->fields['password'] == 'admin') {
            $this->userRecord->role = 'admin';
        }

        $this->testRecord->save();
    }
}
