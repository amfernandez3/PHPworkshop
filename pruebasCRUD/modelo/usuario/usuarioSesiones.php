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

    public function guardar(){
      self::recuperarUsuarios();
      /** 
      * Comprobamos si existe la sesión, si es así recuperamos la info.// si no creamos el array.
      */
      if(!empty(self::$usuarios)){
        if(!$this->comprobarExisteUsuario()){
          $this->setIdUsuario(intval(max(array_keys(self::$usuarios)))+1);
          array_push(self::$usuarios,$this);
        }
        else{
          echo "El usuario ya está registrado";
        }
      }
      else{
        //Si el usuario introducido es el primero ponemos su id a 0 y lo hacemos admin.
        $this->setIdUsuario(0);
        $this->setRol("admin");
        $_SESSION["usuarioLogueadoRol"] = $this->getRol();
        array_push(self::$usuarios,$this);
      }
      
      //Guardamos la información procesada
      $_SESSION["usuarios"] = serialize(self::$usuarios);
    }
   
    /**
   * La funcion recuperar usuarios vuelca en $usuarios, la lista de la sesion, si no la crea vaci­a.
   */
   static function listar(){
      if (isset($_SESSION["usuarios"])) {
        self::$usuarios = unserialize($_SESSION["usuarios"]);
    } else {
        self::$usuarios = array();
    }
    return self::$usuarios;
  }

    /**
   * Elimina un usuario
   */
 static function eliminar($id_usuario){
  if (isset($_SESSION["usuarios"])){
    $usuarios = unserialize($_SESSION["usuarios"]);
    foreach ($usuarios as $indice => $usuario) {
      if ($usuario->getIdUsuario() == $id_usuario) {
        unset($usuarios[$indice]);
        break;
      }
    }

    /**
     * Devolvemos el array a la sesion, sin el evento borrado y devolvemos a la pagina privada
     *
     */
      $_SESSION["usuarios"] = serialize($usuarios);
      }
      //Si no existen usuarios se devuelve un array vacío
      else{
        unset($_SESSION["usuarios"]);
        self::$usuarios = array();
      }
      if(isset($_SESSION["usuarios"]) && count(unserialize($_SESSION["usuarios"])) == 0 ){
        unset($_SESSION["usuarioLogueadoCorreo"]);
        header("Location: ../../index.php");
      }
      else{
        
      header("Location: ../../vista/gestionUsuarios.php");
      }
    }


     /**
   * FunciÃ³n a la que se le pasa un usuario modificado y por id lo cambia por el almacenado que tiene el mismo id
   */
  function modificar(){
    $usuarios = unserialize($_SESSION["usuarios"]);
    $contadorAux = 0;
    while($contadorAux <= count($usuarios)){
      if(isset($usuarios[$contadorAux]) && $usuarios[$contadorAux]->getIdUsuario() == $this->getIdUsuario()){
        $usuarios[$contadorAux] = $this;
      }
      $contadorAux++;
    }
    $_SESSION["usuarios"] = serialize($usuarios);
  }


    /**
    * Función que comprueba si los datos de acceso existen en la BD (sesiones)
    * Si existe sesiones lo vuelca en $usuarios y lo recorre.
    * Si encuentra el usuario devuelve true.
    */ 
     public function comprobarExisteUsuario(){
      $correo = $this->getCorreo();
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