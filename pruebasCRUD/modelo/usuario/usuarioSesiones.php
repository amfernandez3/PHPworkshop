<?php

require_once("usuario.php");
class usuarioSesiones extends usuario {

    private static $usuarios = array();

    public function __construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar) {
        parent::__construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar);
      }

      /**
       * Creamos un array previamente en el que volcaremos la lista de usuarios de la sesión
       * Tras ello, añadiremos el nuevo usuario.
       * Serializamos de nuevo y devolvemos a la sesión el array actualizado.
       */

    public static function guardarUsuario($usuarioNuevoRegistro){
      /** 
      * Comprobamos si existe la sesión, si es así recuperamos la info.// si no creamos el array.
      */
      self::recuperarUsuarios();
      array_push(self::$usuarios,$usuarioNuevoRegistro);
      $_SESSION["usuarios"] = serialize(self::$usuarios);
    }
   


    /**
    * Función que comprueba si los datos de acceso existen en la BD (sesiones)
    * Si existe sesiones lo vuelca en $usuarios y lo recorre.
    * Si encuentra el usuario devuelve true.
    */ 
     public static function comprobarExisteUsuario($correo){
      if(isset($_SESSION["usuarios"])){
        self::recuperarUsuarios();
        foreach (self::$usuarios as $usuarioInstancia){
          if($usuarioInstancia->getCorreo() === $correo){
            
            return true;
          }
        }
      }
      else{
        return false;
      }
    } 


    public static function comprobarLogin($correo, $contraseña){
      if(isset($_SESSION["usuarios"])){
        self::recuperarUsuarios();
        foreach (self::$usuarios as $usuarioInstancia){
          if($usuarioInstancia->getCorreo() === $correo && $usuarioInstancia->getPassword() === $contraseña){
            
            return true;
          }
        }
      }
      else{
        return false;
      }
    } 

    /**
     * Función que recupera los datos de usuarios de las sesiones:
     */
     
    public static function recuperarUsuarios(){
      if (isset($_SESSION["usuarios"])) {
        self::$usuarios = unserialize($_SESSION["usuarios"]);
    } else {
        self::$usuarios = array();
    }
    }

    public static function encontrarID($correo){
      if(isset($_SESSION["usuarios"])){
        self::recuperarUsuarios();
        foreach (self::$usuarios as $usuario){
          if($usuario->getCorreo() === $correo){
            
            return $usuario->getIdUsuario();
          }
        }
      }
      else{
        return null;
      }
    } 

}

?>