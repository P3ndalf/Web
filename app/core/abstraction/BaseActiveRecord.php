<?php

namespace app\core\abstraction;

use PDO;
use PDOException;

class BaseActiveRecord
{
    public $pdo;

    public $tableName;
    public $dbFields = array();

    public function __construct()
    {
        if (!$this->tableName) {
            return;
        }
        $this->setupConnection();
        $this->getFields();
    }

    public function setupConnection()
    {
        if (!isset($this->pdo)) {
            try {
                $dbAccess = require 'app/config/DbAccess.php';
                $this->pdo = new PDO("mysql:dbname=" . $dbAccess['name'] . "; host=" . $dbAccess['host'] . "; char-set=utf8", $dbAccess['user'], $dbAccess['password']);
            } catch (PDOException $ex) {
                die("Connection to DB error: $ex");
            }
        }
    }

    public function getFields()
    {
        $sql = "SHOW FIELDS FROM " . $this->tableName;
        $stmt = $this->pdo->query($sql);
        while ($row = $stmt->fetch()) {
            $this->dbFields[$row['Field']] = $row['Type'];
        }
    }

    public function getCount()
    {
        $count = $this->pdo->query("SELECT COUNT(*) FROM " . $this->tableName)->fetch();
        return (int)$count[0];
    }

    public function find($statement)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $statement;


        $stmt = $this->pdo->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $ar_obj = new static();
        foreach ($row as $key => $value) {
            $ar_obj->$key = $value;
        }
        return $ar_obj;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            return null;
        }

        $ar_objs = array();
        foreach ($rows as $row) {
            $obj = new static();
            foreach ($row as $key => $value) {
                $obj->$key = $value;
            }
            array_push($ar_objs, $obj);
        }
        return $ar_objs;
    }

    public function save()
    {
        $fieldValueModel = $this->getSavingData();

        for ($i = 0; $i < count($fieldValueModel->fields); $i++) {
            $positionedList[] = '`' . $fieldValueModel->fields[$i] .  '` = ' . $fieldValueModel->values[$i];
        }
        if (isset($this->id)) {
            $sql = "UPDATE " . $this->tableName . " SET " . join(', ', array_slice($positionedList, 1)) . " WHERE ID = " . $this->id;
        } else {
            $sql = "INSERT INTO " . $this->tableName . " (" . join(', ', array_slice($fieldValueModel->fields, 1)) . ") VALUES(" . join(', ', array_slice($fieldValueModel->values, 1)) . ")";
        }
        return $this->pdo->query($sql);
    }

    protected function getSavingData()
    {
        foreach ($this->dbFields as $field => $type) {
            $value = $this->$field;
            if (strpos($type, 'int') === false) $value = "'$value'";
            $fields[] = $field;
            $values[] = $value;
        }
        return new FieldValueModel($fields, $values);
    }

    public function delete()
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE ID=" . $this->id;
        $stmt = $this->pdo->query($sql);
        if ($stmt) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            print_r($this->pdo->errorInfo());
        }
    }

    public function getPagedByDesc($start, $count, $descParameter = "id")
    {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY " . $descParameter . " DESC LIMIT " . $start . ', ' . $count;
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows)
            return null;

        $ar_objs = array();
        foreach ($rows as $row) {
            $obj = new static();
            foreach ($row as $key => $value) {
                $obj->$key = $value;
            }
            array_push($ar_objs, $obj);
        }

        return $ar_objs;
    }
}

class FieldValueModel
{
    public $fields = array();
    public $values = array();
    public function __construct($fields, $values)
    {
        $this->fields = $fields;
        $this->values = $values;
    }
}
