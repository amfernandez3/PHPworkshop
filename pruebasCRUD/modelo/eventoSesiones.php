<?php
require_once("evento.php");
require_once('interfazPersistencia.php');
class eventoSesiones extends evento implements interfazPersistencia{
    private static $eventos = array();

  public function __construct($id_evento,$id_usuario,$nombre,$descripcion,$fecha_inicio,$fecha_fin=null) {
    parent::__construct($id_evento,$id_usuario,$nombre,$descripcion,$fecha_inicio,$fecha_fin=null);
  }

  function guardar(){
    /** 
    * Comprobamos si existe la sesión, si es así recuperamos la info.// si no creamos el array.
    */
    
    self::listar();
    if(!empty(self::$eventos)){
      $this->setId_evento(intval(max(array_keys(self::$eventos)))+1);
    }
    else{
      $this->setId_evento(0);
    }
    
    array_push(self::$eventos,$this);
    $_SESSION["eventos"] = serialize(self::$eventos);
  }

  /**
   * Función que recupera y devuelve la lista de eventos (objeto)
   */
  

  /**
   * La función recuperar eventos vuelca en $eventos, la lista de la sesion, si no la crea vacía.
   */
   static function listar(){
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

  /**
   * Elimina un evento
   */
 static function eliminar($id_evento){
    if (isset($_SESSION["eventos"])) {
      $eventos = unserialize($_SESSION["eventos"]);
      foreach ($eventos as $indice => $evento) {
        if ($evento->getId_evento() == $id_evento) {
          unset($eventos[$indice]);
          break;
        }
      }

      /**
       * Devolvemos el array a la sesión, sin el evento borrado y devolvemos a la página privada
       *
       */
    $_SESSION["eventos"] = serialize($eventos);
    header("Location: ../../vista/privado.php");
    }
    else{
      unset($_SESSION["eventos"]);
      self::$eventos = array();
    } 
  }


  /**
   * Función a la que se le pasa un evento modificado y por id lo cambia por el almacenado que tiene el mismo id
   */
  function modificar($eventoModificado){
    $eventos = unserialize($_SESSION["eventos"]);
    foreach ($eventos as $id_evento => $evento){
      if($evento->getId_evento() == $eventoModificado->getId_evento()){
          $evento = $eventoModificado;
      }
    }
    print_r( $eventoModificado);
    $_SESSION["eventos"] = serialize($eventos);
  }




    /**
     * Get the value of eventos
     */ 
    public function getEventos()
    {
        return $this->eventos;
    }

}

?>