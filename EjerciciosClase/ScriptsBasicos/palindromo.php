<?php
        
function comprobarPalindromo($palabra)
{
    //Primero hay que reducir a mayúsculas o minusculas:
     $aux = strtolower($palabra);
    if($aux == strrev($aux))
    {
        return "Es un ejemplo de palindromo";
    }
    else {
        return "No es un palíndromo";
    }
}


$palabraEjemplo="Arenera";
echo comprobarPalindromo($palabraEjemplo);

?>