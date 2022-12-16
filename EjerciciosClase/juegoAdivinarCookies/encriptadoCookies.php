<?php
// Clave privada 
$clave = "Cadena utilizada para el encriptado usandoopenSSL 123abcAcarballeirasf2.";
//Método de encriptación
$metodoEncriptacion = 'aes-256-cbc';
//Generador de claves:
$iv = base64_decode("C9fBxl1EWtYL1/M8jfstw==3");
//Función de encriptado de variables por parámetro:
$encriptar = function($valor) use ($metodoEncriptacion, $clave, $iv){
    return openssl_encrypt($valor,$metodoEncriptacion,$clave, false, $iv);
};
//Función para desencriptar
$desencriptar = function($valor) use ($metodoEncriptacion, $clave, $iv){
    $datoEncriptado = base64_decode($valor);
    return openssl_encrypt($valor,$metodoEncriptacion,$clave, false, $iv);
};
//Genera un valor para IV
$getIV = function() use ($metodoEncriptacion){
    $metodoEncriptacion = 'aes-256-cbc';
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($metodoEncriptacion)));
};
?>