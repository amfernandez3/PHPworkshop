<?php
/**
 * Código de la clase rectángulo
 * Constructor de 4 o 2 parámetros - 4 vértices o base-altura
 * Funciones: Cálculo de superficie y desplazamiento.
 */

 class Rectangulo{
    private $origenX;
    private $origenY;
    private $vectorX = 0;
    private $vectorY = 0;
    private $variacionTotalX = 0;
    private $variacionTotalY = 0;

    // ! los parámetros con un valor por defecto deben ir de últimos.
    function __construct( $vectorX, $vectorY, $origenX = 0, $origenY = 0){
        $this->origenX = $origenX;
        $this->origenY = $vectorY;
        $this->vectorX = $vectorX - $this->origenX;
        $this->vectorY = $vectorY - $this->origenY;
    }
  
     function desplazarRectangulo($desplazamientoX, $desplazamientoY){
        $this->origenX += $desplazamientoX;
        $this->origenY += $desplazamientoY;
        $this->vectorX += $desplazamientoX;
        $this->vectorY += $desplazamientoY;
        $this->variacionTotalX += $desplazamientoX;
        $this->variacionTotalY += $desplazamientoY;

        return ("El cuadrado se ha desplazado.");

    } 

    function calcularSuperficie (){
       
        $superficie = ($this->vectorX - $this->origenX) * ($this->vectorY - $this->origenY);
        if($superficie<0){
            $superficie *= -1;
        }
        return "La siperficie es: " . $superficie ."\n";
    }

    function posicionActual(){
        $vertice1 = ["X"=>$this->origenX,"Y"=>$this->variacionTotalY];
        $vertice2 = ["X"=>$this->variacionTotalX,"Y"=>$this->origenY];
        $vertice3 = ["X"=>$this->vectorX,"Y"=>$this->origenY];
        $vertice4 = ["X"=>$this->vectorX,"Y"=>$this->variacionTotalY];
        echo"El rectángulo se encuentra en: " ;
        echo  "Vertice 1:" . var_dump($vertice1).var_dump($vertice2). var_dump($vertice3). var_dump($vertice4);


        
        //echo("El rectangulo se encuentra en: ". $vertice1.", " .$vertice2.", ".$vertice3.", ".$vertice4);
        
    }

    
 }



?>