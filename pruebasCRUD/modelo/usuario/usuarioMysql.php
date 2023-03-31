<?php
require_once("usuario.php");
class usuarioMysql extends usuario {

  public function __construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar="null") {
    parent::__construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar);
  }
  function guardar(){
    $stm = BDMySql::getConexion()->prepare("INSERT into usuario(nombre, correo, rol, password) values(:nombre,:correo,:rol,:password)"); 
            $stm->execute(["
            :nombre"=>$this->getNombre(),"
            :correo"=>$this->getCorreo(),"
            :rol"=>$this->getRol(),"
            :password"=>$this->getPassword()]);
}

static function listar(){
    $stm = BDMySql::getConexion()->prepare("SELECT * from usuario"); 
    $stm->execute();
    $usuarios = [];
    while (($usuario = $stm->fetch())!=null) {
        $usuarios[] =  new self(
          $usuario["idUsuario"],
          $usuario["nombre"],
          $usuario["correo"],
          $usuario["rol"],
          $usuario["password"]);
    }
    return $usuarios;
}

function modificar($datos){
    $stm = BDMySql::getConexion()->prepare("UPDATE usuario SET nombre = :nombre , correo = :correo, rol= :rol, password= :password where id_evento=:id");
    $stm->execute(["
    :nombre"=>$datos->getNombre(),"
    :correo"=>$datos->getCorreo(),"
    :rol"=>$datos->getRol(),"
    :password"=>$datos->getPassword()]);
}

static function eliminar($id){
    $stm = BDMySql::getConexion()->prepare("DELETE from usuario where idUsuario = :id ");
    $stm->execute([":id"=>$id]);
}

}

?>