<?php

//logica del programa de DNI
require_once("Dni.php");

$dni1 = new Dni();
$numero;

function leer(){
    echo $numero = (readline("Introduce tu número de DNI: ")); 
    
}

leer();


$dni = new Dni(44662476);
echo $dni->getdni();


?>