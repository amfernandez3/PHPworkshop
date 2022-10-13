<?php
class Persona8{
    

    //Función definiendo parámetros con una funcionalidad de PHP8
    function __construct(
        private $dni,
        private $nombre,
        private $apellidos){
       
    }

    public function __toString()
    {
        return "Persona: ".$this->nombre . " " . $this->apellidos;
    }
    
        
    
}

$persona = new Persona8("44662476H","Alejandro","Meno Fernandez");
echo $persona;

?>