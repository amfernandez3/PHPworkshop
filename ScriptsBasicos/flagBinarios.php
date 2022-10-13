<?php
//permisos: RWX - lectura (4) escritura (2) ejecucion (1)
$mask = 5;

if($mask & 4 == 4){
    //mask 100
    echo("Tiene permisos de lectura");
}
elseif($mask & 2 == 2){
    //mask 010
    echo("tiene permisos de escritura");
}
elseif($mask & 1 == 1){
    //mask 001
    echo("tiene permisos de ejecución");
    }
    elseif($mask & 7 == 7){
        //mask 111
        echo("tiene todos los permisos");
        }

?>