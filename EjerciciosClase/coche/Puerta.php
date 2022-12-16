<?php 
require_once("./coche/Ventana.php");
class Puerta{

    private $ventana;
    private $abierta = false;

    
    function __construct(){
        $this->cerrarPuerta();
    }

    function abrirPuerta(){
        $this->abierta = true;
    }

    function cerrarPuerta(){
        $this->abierta = false;
    }
}
?>