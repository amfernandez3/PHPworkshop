<?php

//uso de json en php
class Datos{
    public function __construct(public $nombre, public $apellidos)
    {
        
    }
}

$datos = [["nombre"=>"luis",
    "apellidos"=>"Fernandez"],
    ["nombre"=>"luis",
    "apellidos"=>"Fernandez"]
];
echo $json = json_encode($datos);
var_dump(json_decode($json));


echo "---------------------------------\n";
echo $json = json_encode(new Datos("Luis","Pereira"));
var_dump(json_decode($json));
