<?php 
// als cookie is set, unset de cookie om de gebruiker uit te loggen.
if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 3600, '/'); // empty value and old timestamp
    setcookie('email','', time() - 3600, '/');
}

echo "<script> location.href='login.php'; </script>";
exit;


?>