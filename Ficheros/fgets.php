<?php
$fich = fopen("datos.csv","r");
if($fich === FALSE){
    echo "No existe el fichero datos.csv";
}
else{
while (!feof($fich)) {
    echo "<p>".fgets($fich)."</p>";
}
    
}


fclose($fich);