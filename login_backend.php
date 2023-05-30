<?php 
// Haal form inputs op
$email =  htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST["password"]);
require ('./util/encryption.php');
require('./config.php');
require('./lib/DatabaseModel.php');

function checkEmail($email) {
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1);
}

if (!checkEmail($email)) {
    echo "<script> location.href='register.php?code=3'; </script>";
    return;
}

$db = new DatabaseModel($dbHost,$dbName,$dbUser,$dbPass);

$db->query("SELECT * FROM users WHERE password=? AND email=? LIMIT 1");
$db->execute([$password,$email]);
$row = $db->fetch();

echo var_dump($row);
if ($row == false) {
    echo "no user";
}else {
    setcookie('user',Encrypt($row['userId']));
    echo "$email";
    setcookie('email', $email);
    echo $_COOKIE['email'];
}

// Stuur gebruiker terug naar oorspronkelijke pagina
echo "<script> location.href='login.php'; </script>";
exit;
?>
