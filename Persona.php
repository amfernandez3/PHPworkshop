<?php
class Persona{
    private $dni;
    private $nombre;
    private $apellidos;


    function __construct($dni,$nombre,$apellidos){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function __toString()
    {
        return "Persona: ".$this->nombre . " " . $this->apellidos;
    }
    
        
    
}

//$persona = new Persona("44662476H","Alejandro","Meno Fernandez");
//echo $persona;

?>