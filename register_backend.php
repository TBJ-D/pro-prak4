<?php 

// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password'] );
$userId = $email . $password;

require ('./util/encryption.php');
// Opzetten PDO
require('./config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
$pdo = require('util/getPdo.php');
$sql = "USE proprak4";
$statement = $pdo->prepare($sql);

// Pak gebruiker uit database
$stmt = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1"); 
$stmt->execute([$email]); 
$row = $stmt->fetch();

// Als gebruiker niet al bestaat, registreer de gebruiker en zet de cookie om de gebruiker te herkennen.
if ($row == false) {
    $sql = "INSERT INTO users (userId, password, email, isadmin) VALUES (:userId, :password, :email, false)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userId', $userId , PDO::PARAM_STR);
    $statement->bindValue(':password', $password, PDO::PARAM_STR);
    $statement->bindValue(':email', $email , PDO::PARAM_STR);
    $result = $statement->execute();

    $encrypted = Encrypt($userId);
    setcookie('user', $encrypted);
}

// Stuur gebruiker terug naar oorspronkelijke pagina
echo "<script> location.href='login.php'; </script>";
exit;
?>
