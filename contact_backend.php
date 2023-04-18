<?php 

$email =  htmlspecialchars($_POST['email']);
$onderwerp = htmlspecialchars($_POST["onderwerp"]);
$inhoud = $_POST['inhoud'];
$nieuwsbrief = $_POST['inschrijven'];

require('./config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

$pdo = require('util/getPdo.php');
$sql = "USE proprak4";
$statement = $pdo->prepare($sql);

// $stmt = $pdo->prepare("SELECT * FROM users WHERE password=? AND email=? LIMIT 1"); 
// $stmt->execute([$password,$email]); 
// $row = $stmt->fetch();

function alreadySubscribed($email, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM abonnees WHERE email =? LIMIT 1");
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    return $row != false;
}

function voegAbonnee($email, $pdo){
    if (alreadySubscribed($email,$pdo)) return;
    $stmt = $pdo->prepare("INSERT INTO abonnees VALUES (?)");
    $stmt->execute([$email]);
}

function saveContact($email, $onderwerp, $inhoud, $pdo) {
    $stmt = $pdo->prepare("INSERT INTO emails VALUES (?, ?, ?)");
    $stmt->execute([$email, $onderwerp, $inhoud]);
}

echo $email . PHP_EOL;
echo $onderwerp . PHP_EOL;
echo $inhoud . PHP_EOL;
if ($nieuwsbrief) {
    voegAbonnee($email,$pdo);
}

saveContact($email, $onderwerp, $inhoud, $pdo);


echo "<script> location.href='contact.php'; </script>";
exit;





?>
