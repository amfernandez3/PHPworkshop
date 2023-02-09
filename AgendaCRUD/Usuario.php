<?php class Usuario{
private $id_usuario;
private $nombre;
private $correo;
private $password;
private $rol;

function __construct($id_usuario = null,$nombre = "" ,$correo = null ,$password = null,$rol =null)
{
    $this->id_usuario = $id_usuario;
    $this->nombre = $nombre;
    $this->correo = $correo;
    $this->password = $password;
    $this->rol = $rol;
}



/**
 * Get the value of rol
 */ 
public function getRol()
{
return $this->rol;
}

/**
 * Set the value of rol
 *
 * @return  self
 */ 
public function setRol($rol)
{
$this->rol = $rol;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of correo
 */ 
public function getCorreo()
{
return $this->correo;
}

/**
 * Set the value of correo
 *
 * @return  self
 */ 
public function setCorreo($correo)
{
$this->correo = $correo;

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