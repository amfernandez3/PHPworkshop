<?php
include_once("./rectangulo/Rectangulo.php");




$rectangulo1 = new Rectangulo(1,1,0,0);
echo ($rectangulo1->calcularSuperficie());
$rectangulo1->posicionActual();
$rectangulo1->desplazarRectangulo(1,1);
$rectangulo1->posicionActual();
echo ($rectangulo1->calcularSuperficie());

?>