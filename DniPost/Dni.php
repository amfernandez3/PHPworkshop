<?php

class Dni{
    private $letra;
    private $dni;

    //Función que calcula la letra en base al dni
    public function __construct()
    {
        
    }
    public function calcularLetra()
    {
        $numAux = $this->dni%23;
        $cadenaLetras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $this->letra = $cadenaLetras[$numAux];
    }

    public function __toString()
    {
       return  "El NIF es: ".$this->dni.$this->letra;
    }


    /**
     * Get the value of letra
     */ 
    public function getLetra()
    {
        return $this->letra;
    }

    /**
     * Set the value of letra
     *
     * @return  self
     */ 
    public function setLetra($letra)
    {
        $this->letra = $letra;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }
}


