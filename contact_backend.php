<?php 
// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$onderwerp = htmlspecialchars($_POST["onderwerp"]);
$inhoud = $_POST['inhoud'];
$nieuwsbrief = $_POST['inschrijven'];

// Opzetten PDO connectie.
require('./config.php');

require('./lib/DatabaseModel.php');

$db = new DatabaseModel($dbHost,$dbName,$dbUser,$dbPass);


// Functie om te checken of het ingevoerde email al geabonneerd is.
function alreadySubscribed($email, $db) {
    $db->query("SELECT * FROM abonnees WHERE email =? LIMIT 1");
    $db->execute([$email]);
    $row = $db->fetch();
    return $row != false;
}
// Functie voor het opslaan van de email voor de nieuwsbrief
function voegAbonnee($email, $db){
    echo "subscribing -";
    if (alreadySubscribed($email,$db)) return; 
    echo "subscribed -";

    $db->query("INSERT INTO abonnees VALUES (?)");
    $db->execute([$email]);
    $msg = "Dankuwel voor het inschrijven voor onze nieuwsbrief!";

    echo "Mailing to ". $email;
    ini_set("SMTP","smtp.tipimail.com");
    $mail = mail($email,"Dankuwel voor het inschrijven.",$msg);
    echo $mail;
}

// Functie om het bericht van de gebruiker op te slaan
function saveBericht($email, $onderwerp, $inhoud, $db) {
    $db->query("INSERT INTO emails VALUES (?, ?, ?)");
    $db->execute([$email, $onderwerp, $inhoud]);
}

// Check of de gebruiker in wilt schrijven voor de nieuwsbrief
if ($nieuwsbrief) {
    voegAbonnee($email,$db);
}

// Sla het doorgegeven bericht op.
saveBericht($email, $onderwerp, $inhoud, $db);

// Stuur gebruiker terug naar oorspronkelijke pagina
// echo "<script> location.href='contact.php'; </script>";
// exit;





?>
