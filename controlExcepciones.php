<?php
$divisor;
function numeroNegativo($dividendo, $divisor){

    if($divisor <= 0){
        throw new Exception("El divisor debe ser mayor que 0");
    }
    else{
        echo $dividendo/$divisor;
    }

}

function numeroNegativo2($dividendo, $divisor){

    try{
        numeroNegativo($dividendo, $divisor);
    } catch(Exception $e){
        echo 'El numero debe ser positivo ',  $e->getMessage(), "\n";
    
    }
    

}

numeroNegativo2(3,0);
?>