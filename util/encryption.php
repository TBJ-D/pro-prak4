<?php


function Encrypt($string) : string {
    $k = "123proprak4";
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption = openssl_encrypt($string, $ciphering, $k, $options, $encryption_iv);
    
    return $encryption;
}

function Decrypt($string) : string {
    $k = "123proprak4";
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = '1234567891011121';
    $decryption=openssl_decrypt ($string, $ciphering, $k, $options, $decryption_iv);
    
    return $decryption;
}

?>