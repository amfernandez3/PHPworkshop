<?php
//Dentro de los conceptos POO se tratan aquí la herencia, el polimorfismo y las interfaces + clases abastractas:

//Interfaz: Es un modelo de como debe ser una clase, sus métodos deben ser definidos.

interface iPersona {
    public function getNombre();
    public function getApellido();
    public function tipoClase();
}

//Clase abstracta: se declara como abastracta una clase que no queremos que se instancie:

abstract class aPersona implements iPersona {
    public function tipoClase()
    {
        return  get_class($this);
    }
    public function __toString()
    {
        return $this->getNombre()." ".$this->getApellido();
    } 
}


// Clase que extiende por herencia los métodos de la clase abstracta:

class Persona extends aPersona {
    private $altura;
    function __construct(private $nombre, private $apellido) {  }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getAltura()
    {
        return $this->altura;
    }
}



?>