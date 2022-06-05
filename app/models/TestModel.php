<?php
include 'app/models/validators/TestValidator.php';
include_once 'app/models/active_records/ActiveRecordTest.php';

class TestModel extends Model
{
    public $fields = [
        "name" => "",
        "lastName" => "",
        "email" => "",
        "qstn1" => "",
        "qstn2" => "",
        "qstn3" => ""
    ];

    public $testRecord;

    public $answers = array();

    function __construct()
    {
        $this->validator = new TestValidator();
        $this->testRecord = new ActiveRecordTest();
        $this->getAnswers();
    }

    function validateForm($post_array)
    {
        unset($post_array["submit"]);
        if (!empty($post_array["email"])) {
            $this->fields["email"] = $post_array["email"];
        }
        if (!empty($post_array["name"])) {
            $this->fields["name"] = $post_array["name"];
        }
        if (!empty($post_array["lastName"])) {
            $this->fields["lastName"] = $post_array["lastName"];
        }
        if (!empty($post_array["qstn1"])) {
            $this->fields["qstn1"] = $post_array["qstn1"];
        }
        if (!empty($post_array["qstn2"])) {
            $this->fields["qstn2"] = $post_array["qstn2"];
        }
        if (!empty($post_array["qstn3"])) {
            $this->fields["qstn3"] = $post_array["qstn3"];
        }
        $this->validator->validate($this->fields);

        if ($this->validator->isErrorExist == false) {
            $this->save();
        }
    }

    function save()
    {
        $this->testRecord->name = $this->fields['name'];
        $this->testRecord->lastName = $this->fields['lastName'];
        $this->testRecord->email = $this->fields['email'];
        $this->testRecord->qstn1 = $this->fields['qstn1'];
        $this->testRecord->qstn2 = $this->fields['qstn2'];
        $this->testRecord->qstn3 = $this->fields['qstn3'];
        $this->testRecord->date = date('d.m.y h:i:s');

        $this->testRecord->save();
    }

    function getAnswers()
    {
        $answers = $this->testRecord->findAll();
        foreach ($answers as $values) {
            $value = (array)$values;
            $answer = array();
            $answer['id'] = $value['id'];
            $answer['name'] = $value['name'];
            $answer['lastName'] = $value['lastName'];
            $answCounter = 0;
            if ($value['qstn1'] == 'inductivity') {
                $answCounter++;
            }
            if ($value['qstn2'] == '4answState') {
                $answCounter++;
            }
            if ((sizeof(explode(" ", $value['qstn3'])) > 20)) {
                $answCounter++;
            }
            $answer['percent'] = (($answCounter / 3) * 100) . '%';
            array_push($this->answers, $answer);
        }
    }
}
