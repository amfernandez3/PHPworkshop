<?php class Evento{

private $id_evento;
private $nombre;
private $fecha_inicio;
private $fecha_fin;
private $id_usuario;

function __construct($id_evento = null,$nombre = "",$fecha_inicio = null,$fecha_fin = null,$id_usuario = null)
{
    $this->$id_evento = $id_evento;
    $this->$nombre = $nombre;
    $this->$fecha_inicio = $fecha_inicio;
    if($fecha_fin == null){
        $this->$fecha_fin = $fecha_inicio;    
    }
    else{
        $this->$fecha_fin = $fecha_fin;
    }
    $this->$id_usuario = $id_usuario;

    
}


/**
 * Get the value of id_evento
 */ 
public function getId_evento()
{
return $this->id_evento;
}

/**
 * Set the value of id_evento
 *
 * @return  self
 */ 
public function setId_evento($id_evento)
{
$this->id_evento = $id_evento;

return $this;
}

/**
 * Get the value of nombre
 */ 
public function getNombre()
{
return $this->nombre;
}

/**
 * Set the value of nombre
 *
 * @return  self
 */ 
public function setNombre($nombre)
{
$this->nombre = $nombre;

return $this;
}

/**
 * Get the value of fecha_inicio
 */ 
public function getFecha_inicio()
{
return $this->fecha_inicio;
}

/**
 * Set the value of fecha_inicio
 *
 * @return  self
 */ 
public function setFecha_inicio($fecha_inicio)
{
$this->fecha_inicio = $fecha_inicio;

return $this;
}

/**
 * Get the value of fecha_fin
 */ 
public function getFecha_fin()
{
return $this->fecha_fin;
}

/**
 * Set the value of fecha_fin
 *
 * @return  self
 */ 
public function setFecha_fin($fecha_fin)
{
$this->fecha_fin = $fecha_fin;

return $this;
}

/**
 * Get the value of id_usuario
 */ 
public function getId_usuario()
{
return $this->id_usuario;
}

/**
 * Set the value of id_usuario
 *
 * @return  self
 */ 
public function setId_usuario($id_usuario)
{
$this->id_usuario = $id_usuario;

return $this;
}
}

?>