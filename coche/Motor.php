<?php
class Motor
{
    private $encendido = true;


    public function __construct()
    {
        $this->encenderMotor();
    }

    public function encenderMotor()
    {
        $this->encendido = true;
        echo("Se ha encendido el motor\n");
    }

    public function apagarMotor()
    {
        $this->encendido = false;
        echo("El motor está apagado.\n");
    }
}
?>