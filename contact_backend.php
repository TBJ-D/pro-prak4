<?php 
// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$onderwerp = htmlspecialchars($_POST["onderwerp"]);
$inhoud = $_POST['inhoud'];
$nieuwsbrief = $_POST['inschrijven'];

// Opzetten PDO connectie.
require('./config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
$pdo = require('util/getPdo.php');
$sql = "USE proprak4";
$statement = $pdo->prepare($sql);

// Functie om te checken of het ingevoerde email al geabonneerd is.
function alreadySubscribed($email, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM abonnees WHERE email =? LIMIT 1");
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    return $row != false;
}
// Functie voor het opslaan van de email voor de nieuwsbrief
function voegAbonnee($email, $pdo){
    if (alreadySubscribed($email,$pdo)) return; 
    $stmt = $pdo->prepare("INSERT INTO abonnees VALUES (?)");
    $stmt->execute([$email]);
}

// Functie om het bericht van de gebruiker op te slaan
function saveBericht($email, $onderwerp, $inhoud, $pdo) {
    $stmt = $pdo->prepare("INSERT INTO emails VALUES (?, ?, ?)");
    $stmt->execute([$email, $onderwerp, $inhoud]);
}

// Check of de gebruiker in wilt schrijven voor de nieuwsbrief
if ($nieuwsbrief) {
    voegAbonnee($email,$pdo);
}

// Sla het doorgegeven bericht op.
saveBericht($email, $onderwerp, $inhoud, $pdo);

// Stuur gebruiker terug naar oorspronkelijke pagina
echo "<script> location.href='contact.php'; </script>";
exit;





?>
