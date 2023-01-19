<?php
function comprobarCuentaBancaria($cuenta){
    $bloqueA = trim(substr($cuenta, 0,8));
    $numControlB = trim(substr($cuenta, 8,1));
    $numControlC = trim(substr($cuenta, 9,1));
    $bloqueD = trim(substr($cuenta, 10,10));

    echo "bloque 1: " .$bloqueA;
    echo "control 1: " .$numControlB;
    echo "control 2: " .$numControlC;
    echo "bloque 2: " .$bloqueD;
    if (comprobarBloque($bloqueA,$numControlB) &&
    comprobarBloque($bloqueD,$numControlC)){
        return true;
    }
    else{
        return false;
    }
}

function comprobarBloque($bloque,$control){

 $arr1 = str_split($bloque);
 $sumaPonderada = 0;
 $resto = 0;
 $digitoControlCalculado = 0;
    //Realizamos la suma ponderada:
    for($i=1; $i<count($arr1); $i++){
        $sumaPonderada += $arr1[$i] * $i;
    }
$resto = $sumaPonderada%11;
echo "resto: ".$resto;
if((11-$resto) == 11){
    $digitoControlCalculado = 0; 
}
elseif((11-$resto) == 1){
    $digitoControlCalculado = 1; 
}
else{
    $digitoControlCalculado = (11-$resto); 
}

//Comprobación
if($digitoControlCalculado == $control){
    return true;
}
else{
    echo "No coinciden: " .$digitoControlCalculado . " ". $control;
    return false;
}

}

function guardarCookie($datos){
    $_COOKIE["cuenta"] = $datos;
}

function cargarCookie(){
    return $_COOKIE["cuenta"];
}
