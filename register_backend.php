<?php 

// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password'] );
$userId = $email . $password;

require ('./util/encryption.php');
require('./config.php');
require('./lib/Database.php');
$db = new Database($dbHost,$dbName,$dbUser,$dbPass);



// Pak gebruiker uit database
$db->query("SELECT * FROM users WHERE email=? LIMIT 1");
$db->execute([$email]);
$row = $db->getSingleRow();

// Als gebruiker niet al bestaat, registreer de gebruiker en zet de cookie om de gebruiker te herkennen.
if ($row == false) {

    $db->query( "INSERT INTO users (userId, password, email, isadmin) VALUES (:userId, :password, :email, false)");
    // $db->bindValue(':userId', $userId , PDO::PARAM_STR);
    // $db->bindValue(':password', $password, PDO::PARAM_STR);
    // $db->bindValue(':email', $email , PDO::PARAM_STR);
    $x = ["password" => $password, "userId" => $userId  ,"email" => $email];
    $db->bindValues($x);
    $result = $db->execute();
    $encrypted = Encrypt($userId);
    setcookie('user', $encrypted);
    setcookie('email', $email);
}

// Stuur gebruiker terug naar oorspronkelijke pagina
echo "<script> location.href='login.php'; </script>";
exit;
?>
