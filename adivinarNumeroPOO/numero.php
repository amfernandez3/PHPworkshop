<?php
class Numero{
    protected $valor;
    protected $intentos;
    protected $mensaje;


    function __construct()
    {
        
    }

    public function __sleep()
    {
        return array('valor', 'intentos');
    }

    public function __wakeup()
    {
        
    }

    public function iniciarjuego(){
        $this->valor = rand(0-100);
        $this->intentos = 5;
    }

    public function jugarNumero($valor) {
        if($valor == $this->valor){

        }
        else{

        }
    }
}

?>