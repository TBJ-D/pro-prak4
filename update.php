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
    require('./lib/DatabaseModel.php');

    $db = new DatabaseModel($dbHost,$dbName,$dbUser,$dbPass);
    $db->query("UPDATE $table SET $row = '$data' WHERE $identifier = '$key' ");
    $db->execute();

?>