<?php
include 'app/models/validators/RegistrationValidator.php';
include_once 'app/models/active_records/ActiveRecordUser.php';

class RegistrationModel extends Model
{
    public $fields = [
        "name" => "",
        "lastName" => "",
        "password" => "",
        "email" => "",
    ];

    public $userRecord;

    function __construct()
    {
        $this->validator = new RegistrationValidator();
        $this->userRecord = new ActiveRecordUser();
    }

    function validateForm($post_array)
    {
        if (!empty($post_array['name'])) {
            $this->fields['name'] = $post_array['name'];
        }
        if (!empty($post_array['lastName'])) {
            $this->fields['lastName'] = $post_array['lastName'];
        }
        if (!empty($post_array['email'])) {
            $this->fields['email'] = $post_array['email'];
        }
        if (!empty($post_array['password'])) {
            $this->fields['password'] = $post_array['password'];
        }
        $this->validator->validate($this->fields);

        return !$this->validator->isErrorExist;
    }

    function save()
    {
        $this->userRecord->name = $this->fields["name"];
        $this->userRecord->password =  md5($this->fields["password"]);
        $this->userRecord->lastname = $this->fields["lastName"];
        $this->userRecord->email = $this->fields["email"];
        if ($this->fields['name'] == 'admin' && $this->fields['password'] == 'admin') {
            $this->userRecord->role = 'admin';
        } else {
            $this->userRecord->role = 'user';
        }
        return $this->userRecord->save();
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

    function getByFields($name, $email, $password)
    {
        $password = md5($password);

        $stmt = "name='${name}' and password='${password}' and email='${email}'";

        return $this->userRecord->find($stmt);
    }
}
