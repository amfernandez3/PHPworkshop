<?php
require_once("usuario.php");
class usuarioMysql extends usuario {

  public function __construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar) {
    parent::__construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar);
  }
}

?>