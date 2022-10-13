<?php

use Cuenta as GlobalCuenta;

class Cuenta{

    function __construct(
        private $titular, 
        private $cantidad = 10000){
        
    }

    

        /**
         * Get the value of titular
         */ 
        public function getTitular()
        {
                return $this->titular;
        }

        /**
         * Set the value of titular
         *
         * @return  self
         */ 
        public function setTitular($titular)
        {
                $this->titular = $titular;

                return $this;
        }

        /**
         * Get the value of cantidad
         */ 
        public function getCantidad()
        {
                return $this->cantidad;
        }

        /**
         * Set the value of cantidad
         *
         * @return  self
         */ 
        public function setCantidad($cantidad)
        {
                $this->cantidad = $cantidad;

                return $this;
        }

        function __toString()
        {
            "Cuenta: ". $this->titular . " Cantidad: " .$this->cantidad;
        }

        function ingresar($cantidad){
            if($cantidad>1){
                $this->cantidad += $cantidad;
            }
        }

        function retirar($cantidad){
            if($this->cantidad>$cantidad){
                $this->cantidad -= $cantidad;
            }
            else{
                echo"No hay suficientes fondos";
            }
        }
}

$cuenta = new Cuenta("Alejandro");
echo $cuenta->getTitular(). "\n";
echo $cuenta->getCantidad(). "\n";
$cuenta->ingresar(5000);
echo $cuenta->getCantidad(). "\n";
?>