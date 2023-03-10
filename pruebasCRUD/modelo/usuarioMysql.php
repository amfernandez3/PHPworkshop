<?php
require_once("usuario.php");
class usuarioMysql extends Usuario {

    public function __construct($idUsuario, $nombre, $correo, $rol, $password) {
        parent::__construct($idUsuario, $nombre, $correo, $rol, $password);
      }
}

?>