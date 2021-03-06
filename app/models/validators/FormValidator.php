<?php
class FormValidator
{
    protected $rules = [];
    public $errors = [];
    public $errMessages = [];

    public $predicates = [];

    public $isErrorExist = false;

    protected function isNotEmpty($data)
    {
        if (empty($data)) {
            return "Пусто";
        }
    }

    protected function isInteger($data)
    {
        if (!is_numeric($data)) {
            return "Не число!";
        }
    }

    protected function isMinAnswSize($data, $size)
    {
        if (sizeof(explode(" ", $data)) < $size) {
            return "Ответ содержит меньше " . $size . " слов";
        }
    }

    protected function isLess($data, $value)
    {
        $isInteger = $this->isInteger($data);
        if (empty($isInteger)) {
            $int_value = intval($data);
            if ($int_value < $value) {
                return "Значение должно быть не меньше $value";
            }
        } else {
            return $isInteger;
        }
    }

    protected function isGreater($data, $value)
    {
        $isInteger = $this->isInteger($data);
        if (empty($isInteger)) {
            $int_value = intval($data);
            if ($int_value > $value) {
                return "Значение должно быть не больше $value";
            }
        } else {
            return $isInteger;
        }
    }

    protected function isEmail($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return "Введите корректный email";
        }
    }

    protected function isPhone($data)
    {
        if (!preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,11}$/', $data)) {
            return "Введите корректный номер телефона!";
        }
    }

    protected function isWord($data)
    {
        if (!preg_match('/([A-Za-zА-Яа-я]){3,}/', $data)) {
            return "Введите корректное слово";
        }
    }

    protected function isDate($data)
    {
        if (!preg_match('/([0-9]|[0-9][0-9])\/([0-9]|[0-9][0-9])\/([0-9][0-9][0-9][0-9])/', $data)) {
            return "Выберите корректную дату";
        }
    }

    protected function isImageLink($data)
    {
        if (!preg_match('//', $data)) {
            return "Выберите .jpg или .png форматы файлов";
        }
    }

    protected function setRule($field_name, $rules)
    {
        if ($rules) {
            $this->rules[$field_name] = $rules;
        }
    }

    protected function validateRule($field_name, $rule_name, $value)
    {
        $result = "";
        switch ($rule_name) {
            case "isNotEmpty": {
                    $result = $this->isNotEmpty($value);
                    break;
                }
            case "isEmail": {
                    $result = $this->isEmail($value);
                    break;
                }
            case "isPhone": {
                    $result = $this->isPhone($value);
                    break;
                }
            case "isDate": {
                    $result = $this->isDate($value);
                    break;
                }
            case "isWord": {
                    $result = $this->isWord($value);
                    break;
                }
            case "isMinAnswSize": {
                    $result = $this->isMinAnswSize($value, 19);
                    break;
                }
            case "isImageLink": {
                    $result = $this->isImageLink($value);
                    break;
                }
        }
        if (array_key_exists($field_name, $this->errors)) {
            array_push($this->errors[$field_name], $result);
        } else {
            $this->errors[$field_name] = array($result);
        }
    }

    function validate($post_array)
    {
        foreach ($post_array as $pkey => $value) {
            $rules = $this->predicates[$pkey];
            $this->setRule($pkey, $rules);
        }

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $key => $rule_name) {
                $value = $post_array[$field];
                $this->validateRule($field, $rule_name, $value);
            }
        }
        $this->showErrors();
    }

    protected function showErrors()
    {
        foreach ($this->errors as $pkey => $errors) {
            $flag = false;
            foreach ($errors as $error) {
                if ($error != "") {
                    $flag = true;
                    break;
                }
            }
            if ($flag == true) {
                $this->errMessages[$pkey] = '<div style="color: red;">' . $error . '</div>';
                $this->isErrorExist = true;
            }
        }
    }
}
