<?php
require_once("evento.php");
class eventoSesiones extends evento {
    private static $eventos = array();

  public function __construct($id_evento,$id_usuario,$nombre,$descripcion,$fecha_inicio,$fecha_fin=null) {
    parent::__construct($id_evento,$id_usuario,$nombre,$descripcion,$fecha_inicio,$fecha_fin=null);
  }

  public static function guardarEvento($evento){
    /** 
    * Comprobamos si existe la sesión, si es así recuperamos la info.// si no creamos el array.
    */
    
    self::recuperarEventos();
    array_push(self::$eventos,$evento);
    $_SESSION["eventos"] = serialize(self::$eventos);
  }

  /**
   * Función que recupera y devuelve la lista de eventos (objeto)
   */
  public static function listarEventos(){
    self::recuperarEventos();
    return self::$eventos;
  }

  /**
   * La función recuperar eventos vuelca en $eventos, la lista de la sesion, si no la crea vacía.
   */
  public static function recuperarEventos(){
    if (isset($_SESSION["eventos"])) {
      self::$eventos = unserialize($_SESSION["eventos"]);
  } else {
      self::$eventos = array();
  }
  }

  /**
   * Función para vaciar la sesión de eventos
   */
  public static function borrarEventos(){
    if (isset($_SESSION["eventos"])) {
      unset($_SESSION["eventos"]);
      self::$eventos = array();
  } 
  }

  function __toString()
  {
    return "Este evento es: " . $this->getNombre() . "y consiste en: " .$this->getDescripcion();
  }


}

?>