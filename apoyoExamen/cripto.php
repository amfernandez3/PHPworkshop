<?php
//Criptografía : encriptación de datos usando hash
/*
Pasos:
Declaración y definición de los datos: $var secreto;
! AUMENTAR SEGURIDAD : definición de una clave constante, ej: const CLAVE = "knjodbkfdspskm739md";
La encriptación de una variable se realiza con : hash("metodoEncriptacion",datos); 
Usaremos el sistema de encriptado sha1.
Tras concatenar el encriptado con la clave secreta tendremos una variable muy segura, podemos usarla en DB o cookies.
*/
$datos = 1;
const CLAVE = "isodjipkedoiwqnsdn";

function encriptar($datos){
    $datosEncriptados = hash("sha1",$datos.CLAVE);
    $datos = 2;
    return $datosEncriptados;
}

//!No es posible desencriptar, debemos usar comparaciones (datos aportados y la que debería ser su función hash):
//Habitualmente la función será llamada con : comprobarEncriptado($_COOKIE['x'], $x);
function comprobarEncriptado ($datosEncriptados, $datos){
    $vulnerado = false;
    if(hash("sha1",$datos.CLAVE)==$datosEncriptados){
        echo "En este supuesto las claves coinciden, todo va bien.";
    }
    else{
        echo "En este supuesto el hash ha sido modificado";
        $vulnerado = true;
    }
    return $vulnerado;
} 


?>