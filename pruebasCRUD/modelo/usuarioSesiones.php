<?php

require_once("usuario.php");
class usuarioSesiones extends Usuario {

    private static $usuarios = array();

    public function __construct($idUsuario, $nombre, $correo, $rol, $password) {
        parent::__construct($idUsuario, $nombre, $correo, $rol, $password);
      }

      /**
       * Creamos un array previamente en el que volcaremos la lista de usuarios de la sesión
       * Tras ello, añadiremos el nuevo usuario.
       * Serializamos de nuevo y devolvemos a la sesión el array actualizado.
       */

    public static function guardarUsuario($usuario){
      /** 
      * Comprobamos si existe la sesión, si es así recuperamos la info.// si no creamos el array.
      */
      if (isset($_SESSION["usuarios"])) {
        self::recuperarUsuarios();
    } else {
        self::$usuarios = array();
    }
      array_push(self::$usuarios,$usuario);
      $_SESSION["usuarios"] = serialize(self::$usuarios);
    }

    public static function recuperarUsuarios(){
      self::$usuarios = unserialize($_SESSION["usuarios"]);
    }

}

?>