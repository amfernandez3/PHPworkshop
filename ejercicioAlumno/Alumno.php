<?php
require_once("./Nif.php");

class Alumno{
    private $nombre;
    private $apellidos;
    private $Nif;
    private $sexo;


    function __construct($nombre,$apellidos,$nif,$sexo){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sexo = $sexo;
        try {
        $this->Nif = new Nif($nif);
        } catch (Exception $e) {
            echo 'El NIF no es correcto: \n';
        }
    }

    function __toString()
    {
            return ("Alumno registrado: ".$this->nombre." ". $this->apellidos." ". $this->Nif->__toString()." ".$this->sexo);
        
    }

    public function getNif(){
        return $this->Nif;
    }
}
?>