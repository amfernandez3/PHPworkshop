<?php
// Función creación cookie
if(!isset($_COOKIE["nombre"])){
    setcookie("nombre","Luis", time()+3600);
}
else{
    setcookie("nombre","", time()-3600);
}

echo "Mi nombre es: " . $_COOKIE["nombre"];
