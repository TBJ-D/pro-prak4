<?php 

// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password'] );
$confirmpassword = htmlspecialchars($_POST['confirmpassword']);
function checkEmail($email) {
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1);
}

if (!checkEmail($email)) {
    echo "<script> location.href='register.php?code=3'; </script>";
    return;

}
if ($confirmpassword != $password) {
    echo "<script> location.href='register.php?code=2'; </script>";
    return;
}
$userId = $email . $password;

require ('./util/encryption.php');
// Opzetten PDO
require('./config.php');
require('./lib/DatabaseModel.php');
$db = new DatabaseModel($dbHost,$dbName,$dbUser,$dbPass);

// Pak gebruiker uit database
$db->query("SELECT * FROM users WHERE email=? LIMIT 1");
$db->execute([$email]);
$row = $db->fetch();
$code = 0;
// Als gebruiker niet al bestaat, registreer de gebruiker en zet de cookie om de gebruiker te herkennen.
if ($row == false) {

    $db->query( "INSERT INTO users (userId, password, email, isadmin) VALUES (:userId, :password, :email, false)");

    $x = ["password" => $password, "userId" => $userId  ,"email" => $email];
    $db->bindValues($x);
    $result = $db->execute();
    $encrypted = Encrypt($userId);

    setcookie('user', $encrypted);
    setcookie('email', $email);
}else {
    $code = 1;
}

// Stuur gebruiker terug naar oorspronkelijke pagina
echo "<script> location.href='login.php?code=$code'; </script>";
exit;
?>
