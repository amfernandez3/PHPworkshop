<?php

class rectangulo{
private $origenX;
private $origenY;
private $base;
private $altura;
private $superficie;

    function __construct($origenX=0,$origenY=0, $base, $altura){
        $this->origenX = $origenX;
        $this->origenY = $origenY;
        $this->$base = $origenX + $base;
        $this->$altura = $origenX + $altura;
    }

    function superficie(){
        $superficie = $this->base * $this->altura;
        return $superficie;
    }

    function desplazarRectangulo($desplazamientoX, $desplazamientoY){

    }

    

}

?>