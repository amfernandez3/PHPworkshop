<?php
$datos = simplexml_load_file("cds.xml");
echo "</br>";
if($datos === FALSE){
 echo "No existe el fichero cds.xml";
}
else{
foreach($datos as $valor){
    echo "<pre>";
    print_r($valor);
    echo "</br>";
    echo "</pre>";
}
}

echo "<p>-------------------------</p>";

$precios = $datos->xpath("//PRECIO");
foreach($precios as $precio){
    echo "<pre>";
    print_r($precio); //echo $precio[0]; -> mostrar precio sin etiquetas.
    echo "</br>";
    echo "</pre>";
}

foreach($datos as $valor){
    echo "<pre>";
    echo $valor->TITULO.":".$valor->PRECIO;
    echo "</pre>";
}
