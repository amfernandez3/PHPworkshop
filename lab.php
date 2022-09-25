<?php
/**
Trabajo con permisos y desplazamiento de bits
*/

$numeros  = [2,3,4,5,6];
$numeros2 = array(2 => "2", 3 => "tres");
$arrayClaveValor = ["nombre"=>"Alejandro", "apellido"=>"Meno"];
$arrayMisc = [1,2,3, [4,5,6], 7];
//print_r($numeros);

foreach($arrayMisc as $salida){
   if(is_array($salida)){
    foreach($salida as $salida2){
        echo("Dato de array interno: " . $salida2). "\n";
    }
    
   }
   else{
    echo("Dato simple:" .$salida. "\n");
}
} ;
/*
foreach($numeros as $var){
    echo ("Dato: ". $var . "\n");
}



var_dump($numeros);
$arrayPrueba = [1,3, "color" => "azul", "perro", 2 => 7];
var_dump($arrayPrueba);
*/
?>