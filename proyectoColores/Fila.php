<?php
require_once('C:/Users/dawdu207/Desktop/Dual44662476H/Servidor/entornoServidor/proyectoColores/Color.php'); 
class Fila{
    private $colores = [];
    const NUM_COLORES = 4;
    function __construct(){
        
    }

    function comparar($fila){

    }

}

$azul = new Color(2);
$rojo = new Color(3);

echo "Comparacion de dos colores: " . $rojo->compararColores($azul);
?>