<?php
$arr = [10,20,['2',3,7,8],40];
recorrerArray($arr);


function recorrerArray($arr) {
    foreach($arr as $salida){
        if(is_array($salida)){
            $cont = 0;
         foreach($salida as $salida2){
             echo("Dato de array interno: Índice [$cont] valor: " . $salida2). "\n";
             $cont++;
         }
         
        }
        else{
         echo("Dato simple: " .$salida. "\n");
     }
     } ;
}
?>