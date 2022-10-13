<?php
class Rueda
{
    private $inflada = true;


    public function __construct()
    {
        $this->inflarRueda();
    }

    public function inflarRueda()
    {
        $this->inflada = true;
    }

    public function desinflarRueda()
    {
        $this->inflada = false;
    }

    /**
     * Get the value of inflada
     */ 
    public function getInflada()
    {
        return $this->inflada;
    }
}
?>