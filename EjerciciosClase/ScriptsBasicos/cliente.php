<?php
require_once("Persona.php");

class Cliente extends Persona{

    private $saldo;

    function __construct($dni,$nombre,$apellidos,$saldo){
        //parent hace referencia a la clase padre.
        parent::__construct($dni,$nombre,$apellidos);
        $this->saldo = $saldo;

    }

    /**
     * Set the value of saldo
     *
     * @return  self
     */ 
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function __toString()
    {
        return "Cliente: " . $this->saldo;
    }

    /**
     * Get the value of saldo
     */ 
    public function getSaldo()
    {
        return $this->saldo. "" .parent::__toString();
    }
}
$cliente = new Cliente("3333333E","Super","Lopez","10000");
echo $cliente;
?>