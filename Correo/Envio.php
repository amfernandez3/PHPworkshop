<?php
class Envio{
// destinatario
private $direccion;
private $asunto ;
private $mensaje;

function __construct($direccion, $asunto, $mensaje){
    $this->setAdress($direccion);
    $this->setAsunto($asunto);
    $this->setMensaje($mensaje); 
}


function setAdress($direccion){
    $this->direccion = $direccion;
}

function setAsunto($asunto){
    $this->asunto = $asunto;
}

function setMensaje($mensaje){
    $this->mensaje = $mensaje;
}


/**
 * Get the value of direccion
 */ 
public function getDireccion()
{
return $this->direccion;
}

/**
 * Get the value of asunto
 */ 
public function getAsunto()
{
return $this->asunto;
}

/**
 * Get the value of mensaje
 */ 
public function getMensaje()
{
return $this->mensaje;
}
}

?>