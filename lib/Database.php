<?php

class Database
{
    private $dbHandler;
    private $statement;
    private $dbName;

    public function __construct($dbHost,$dbName,$dbUser,$dbPass)
    {
        $conn = 'mysql:host=' . $dbHost . ';dbname='. $dbName . ';charset=UTF8';

        try {
            $this->dbHandler = new PDO($conn, $dbUser, $dbPass);

            if ($this->dbHandler) {
                $this->dbName = $dbName;
                $this->initialize();
            } else {
                echo "Interne server-error";
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    private function initialize() {
        $this->query("USE $this->dbName");
    }
    public function execute($params = []) {
        if ($params == []) {
            echo "no params";
            return $this->statement->execute();
        }
        return $this->statement->execute($params);
    }
    public function bindValues($values) {
        foreach($values as $name => $value) {
            $this->statement->bindValue(":$name",$value,PDO::PARAM_STR);
        }
    }
    public function fetch() {
        return $this->statement->fetch();
    }
    public function fetchAll() {
        return $this->statement->fetchAll();
    }
    public function bindValue($x ,$value, $type) {
        $this->statement->bindValue("$x", $value, $type);
    }
    public function getSingleRow() {
        return $this->statement->fetch();
    }
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function resultSet()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }


}