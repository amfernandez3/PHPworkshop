<?php

use Persona as GlobalPersona;

require_once("iPersona.php");

abstract class aPersona implements iPersona{


}


class Persona extends aPersona{

    function __construct(private $nombre, 
    private $apellido){
        
    }



    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }
}

$perso = new Persona("PersonaEjemplo", "Perez");
print_r($perso);
?>