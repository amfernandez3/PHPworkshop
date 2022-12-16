<?php
require_once("./coche/Puerta.php");
require_once("./coche/Motor.php");
require_once("./coche/Rueda.php");
require_once("./coche/Coche.php");


$motor1 = new Motor();
$puerta1 = new Puerta();
$rueda1 = new Rueda();


//Creación del coche con los componente:
$coche = new Coche($motor1, $puerta1, $rueda1);
//print_r($coche);



$coche->getMotor()->apagarMotor();
$coche->ruedasInfladas();


?>
