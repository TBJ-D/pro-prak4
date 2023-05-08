<?php 

    // echo $_POST['html'];
    $table = $_GET['table'];
    $row = $_GET['row'];
    $key = $_GET['key'];
    $identifier = $_GET['identifier'];

    $data = $_POST['data'];

    // echo "Saving data to table $table to row $row at key $key";

    // Opzetten PDO
    require('./config.php');

    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
    $pdo = require('util/getPdo.php');
    $sql = "USE proprak4";
    $statement = $pdo->prepare($sql);
    echo "UPDATE $table SET $row = $data WHERE $identifier = $key";
    $stmt = $pdo->prepare("UPDATE $table SET $row = '$data' WHERE $identifier = '$key' ");
    $stmt->execute();

?>