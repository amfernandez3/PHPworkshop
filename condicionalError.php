<?php
$dato = false;
echo("Dato: ".$dato)?'T':'F';

$falso = true && false;
echo $falso?'Cierto':'Falso';

$deberiaSerFalso = true and false;
echo $deberiaSerFalso?'Cierto':'Falso';

$cierto = false || true;
echo $cierto?'Cierto':'Falso';

$deberiaSerCierto = true or false;
echo $deberiaSerCierto?'Cierto':'Falso';
?>