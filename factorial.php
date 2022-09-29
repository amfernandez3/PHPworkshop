<?php 

function Factorial($numPrueba){ 
    $factorialAux = 1;
    if($numPrueba>=1){
        for ($i = 1; $i <= $numPrueba; $i++){ 
            $factorialAux = $factorialAux * $i; 
          } 
    }
    else{
        $factorialAux = -1;
    } 
    
    return $factorialAux; 
} 

   

$numPrueba = 5; 
$resultado = Factorial($numPrueba); 
echo "Factorial de : " . $numPrueba . " = " . $resultado;


?> 