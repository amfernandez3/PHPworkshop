<?php 
class Ventana{
    private $abierta = false;

    
    function __construct(){
        $this->cerrarVentana();
    }

    function abrirVentana(){
        $this->abierta = true;
    }

    function cerrarVentana(){
        $this->abierta = false;
    }
}
?>