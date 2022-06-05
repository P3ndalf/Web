<?php
include 'app/models/validators/LoginValidator.php';
include_once 'app/models/active_records/ActiveRecordUser.php';

class UserModel extends Model
{
    public $fields = [
        "name" => "",
        "password" => ""
    ];

    public $userRecord;

    function __construct()
    {
        $this->validator = new LoginValidator();
        $this->userRecord = new ActiveRecordUser();
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
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

    function save()
    {
        $this->userRecord->name = $this->fields["name"];
        $this->userRecord->password =  md5($this->fields["password"]);
        if ($this->fields['name'] == 'admin' && $this->fields['password'] == 'admin') {
            $this->userRecord->role = 'admin';
        } else {
            $this->userRecord->role = 'user';
        }

        $this->userRecord->save();
    }

    function isExist($name, $password)
    {
        $password = md5($password);

        $stmt = "name='${name}' and password='${password}'";

        if ($this->userRecord->find($stmt)) {
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
            return array(
                'name' => $user->name,
                'role' => $user->role
            );
        }
    }
}
