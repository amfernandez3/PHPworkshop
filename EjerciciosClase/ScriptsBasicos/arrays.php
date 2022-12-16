<?php
$mi_array = [0=>"Hola",10=>"adios"];

foreach ($mi_array as &$valor) {
    echo($valor);
}


//función para recorrer el array:
print_r($mi_array);

//Añadir elementos
$mi_array["A"] = "mensaje";

//? Control de estados


?>