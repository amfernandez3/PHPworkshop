<?php
//Manejo de excepciones:
$numero1 = 2;
$numero1 = 5;

//La excepción puede ser lanzada desde fuera, si es así puede llamarse desde el try.
function dividir($a,$b){
    if($b == 0){
        throw new Exception("El divisor no puede ser 0");
    }
    else{
        return $a/$b;
    }
}

try{
    dividir(3,4);
}catch(Exception $e){
return "Error: " . $e->getMessage();
}


?>