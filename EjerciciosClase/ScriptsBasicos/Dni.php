<?php

//clase DNI
class Dni
{   
    private $letra;
    private $dni;
    
        
    public function __construct($dni = 0){
        $this->setdni($dni);
    }

    function calcularLetra(){
        $numAux = $this->dni%23;
        $cadenaLetras = "TRWAGMYFPDXBNJZSQVHLCKE";

        $this->letra = $cadenaLetras[$numAux];
        }

        /**
         * Get the value of numero
         */
        public function getdni(){
            return $this->dni;
        }

        /**
         * Set the value of numero
         *
         * @return  self
         */
        public function setdni($dni){
        $this->dni = $dni;
        $this->letra = ($dni == 0)?" ":$this->calcularLetra($this->dni);
        }

        function mostrarDni($dni1){
            $salida = $dni1->getNumero;
        
        }

       

}

?>