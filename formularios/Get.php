<?php
//Trabajo con GET, POST, REQUEST

if(isset($_GET["nombre"])){
    echo "Hola : " . $_GET["nombre"];
    echo "<pre>";
    var_dump($_GET);
    echo "</pre>"; //Pre ofrece una menor salida de texto
}



/**
 * No se usa REQUEST porque trabaja con cookies
 * Se usa contra un servidor: http://localhost/Get.php?nombre=pedro&apellido=fernandez
 * request-method
 */


?>