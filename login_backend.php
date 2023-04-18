<?php 
// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST["password"]);
require ('./util/encryption.php');
require('./config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

$pdo = require('util/getPdo.php');
$sql = "USE proprak4";
$statement = $pdo->prepare($sql);

$stmt = $pdo->prepare("SELECT * FROM users WHERE password=? AND email=? LIMIT 1"); 
$stmt->execute([$password,$email]); 
$row = $stmt->fetch();

if ($row == false) {
    echo "no user";
}else {
    setcookie('user',Decrypt($row['userId']));
    setcookie('email', $email);
}

// Stuur gebruiker terug naar oorspronkelijke pagina
echo "<script> location.href='login.php'; </script>";
exit;
?>
