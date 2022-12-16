<?php

class Coche{
    
    private $motor;
    private $puerta1,$puerta2;
    private $rueda1,$rueda2,$rueda3,$rueda4;

    function __construct($motor, $puerta1,$rueda1){
        $this->motor=$motor;
        $this->puerta1 = $puerta1;
        $this->puerta2 = $puerta1;
        $this->cambiarRueda($rueda1);

    }

    function cambiarRueda($ruedaNueva){
        $this->rueda1 = $ruedaNueva;
        $this->rueda2 = $ruedaNueva;
        $this->rueda3 = $ruedaNueva;
        $this->rueda4 = $ruedaNueva;
       
    }

    



    /**
     * Get the value of motor
     */ 
    public function getMotor()
    {
        return $this->motor;
    }

    /**
     * Set the value of motor
     *
     * @return  self
     */ 
    public function setMotor($motor)
    {
        $this->motor = $motor;

        return $this;
    }

    public function cerrarPuertas(){
        $this->puerta1->cerrarPuerta();
        $this->puerta2->cerrarPuerta();
        echo("Las puertas están abiertas\n");
    }

    public function abrirPuertas(){
        $this->puerta1->abrirPuerta();
        $this->puerta2->abrirPuerta();
        echo("Las puertas están cerradas.\n");
    }

    public function ruedasInfladas(){
        if($this->rueda1->getInflada() && $this->rueda2->getInflada() && $this->rueda3->getInflada() && $this->rueda4->getInflada()){
            echo "Las ruedas están infladas.";
        }
        else{
            echo "Las ruedas no están infladas.";
        }
    }

    /**
     * Get the value of rueda1
     */ 
    public function getRueda1()
    {
        return $this->rueda1;
    }

    /**
     * Set the value of rueda1
     *
     * @return  self
     */ 
    public function setRueda1($rueda1)
    {
        $this->rueda1 = $rueda1;

        return $this;
    }

    /**
     * Get the value of rueda2
     */ 
    public function getRueda2()
    {
        return $this->rueda2;
    }

    /**
     * Set the value of rueda2
     *
     * @return  self
     */ 
    public function setRueda2($rueda2)
    {
        $this->rueda2 = $rueda2;

        return $this;
    }

    /**
     * Get the value of rueda3
     */ 
    public function getRueda3()
    {
        return $this->rueda3;
    }

    /**
     * Set the value of rueda3
     *
     * @return  self
     */ 
    public function setRueda3($rueda3)
    {
        $this->rueda3 = $rueda3;

        return $this;
    }

    /**
     * Get the value of rueda4
     */ 
    public function getRueda4()
    {
        return $this->rueda4;
    }

    /**
     * Set the value of rueda4
     *
     * @return  self
     */ 
    public function setRueda4($rueda4)
    {
        $this->rueda4 = $rueda4;

        return $this;
    }
}


?>