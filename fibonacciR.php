<?php

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

$num = 2;
$resultado = fibonacciR($num);
echo $resultado;
