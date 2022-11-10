<?php
//Aquí se describen las formas más frecuentes de trabajar con peticiones POST


//Función que comprueba si se introdujo el dato solicitado usando POST 
/* function comprobarPost(){
    if($_SESSION['REQUEST_METHOD']=='POST' && !empty($_POST["$nombre"])){
        if(variables aún no existen){
            crearVariables();
        }
        else{
            funciones que modifiquen su valor.
        }
    }
} */


//Si las condiciones se cumplen, esta función crea e inicia las variables
/* function crearVariables(){
    //Pueden ser sesiones o cookies:
    setcookie('nombre',nombre,time()+3600);
    //ó
    session_start();
    $_SESSION['nombre'] == nombre;
} */
?>