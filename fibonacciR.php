<?php


//Funcion recursiva
function fibonacciR($num){
    $acumulador = 1;
    if ($num == 1) {
        $acumulador == 1;
    } elseif ($num == 0) {
        $acumulador == 0;
    } elseif ($num > 2) {
        $acumulador = fibonacciR($num -1) + fibonacciR($num -2);
    }

    return $acumulador;
}

// función iterativa
function FibonacciIt($num){
  
    $num1 = 0;
    $num2 = 1;
    $contador = 0;

    while ($contador < $num){
        echo ' '.$num1;
        $num3 = $num2 + $num1;
        $num1 = $num2;
        $num2 = $num3;
        $contador = $contador + 1;
    }
}


$num = 8;

echo "Resultado fibonnaci Iterativo: ";
$resultado = fibonacciIt($num);
echo $resultado . "\n";
$resultado2 = fibonacciR($num);
echo "Resultado fibonnaci recursivo: " . $resultado2 . "\n";
