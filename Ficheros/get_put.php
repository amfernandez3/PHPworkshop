<?php
$fichero = file_get_contents("datos.csv");

echo "<pre>.$fichero</pre>";
file_put_contents("datos2.csv","Hola mundo");