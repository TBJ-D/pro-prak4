<?php 

$email =  htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password'] );
$userId = $email . $password;
require ('./util/encryption.php');
require('./config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

$pdo = require('util/getPdo.php');
$sql = "USE proprak4";
$statement = $pdo->prepare($sql);

$stmt = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1"); 
$stmt->execute([$email]); 
$row = $stmt->fetch();
echo var_dump($row);

if ($row == false) {
    $sql = "INSERT INTO users (userId, password, email, isadmin) VALUES (:userId, :password, :email, false)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userId', $userId , PDO::PARAM_STR);
    $statement->bindValue(':password', $password, PDO::PARAM_STR);
    $statement->bindValue(':email', $email , PDO::PARAM_STR);
    $result = $statement->execute();

    $encrypted = Encrypt($userId);
    setcookie('user', $encrypted);
}else {
    echo $_COOKIE['user'];
    echo "found";
}

echo "<script> location.href='login.php'; </script>";
exit;









?>
