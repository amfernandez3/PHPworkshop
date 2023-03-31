<?php
require_once("../interfazPersistencia.php.php");
require_once("usuario.php");
require_once("../../controlador/conexionDBMongo.php");
require_once('vendor/autoload.php');
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

class UsuarioMongo extends Usuario implements interfazPersistencia, MongoDB\BSON\Persistable {
  public function __construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar) {
    parent::__construct($idUsuario, $nombre, $correo, $rol, $password,$encriptar=false);
  }  
  
    function guardar(){
        if (!null == ($this->getIdUsuario())) {
            //Control de usuario.id == null
        } else {
            BDMongo::getConexion()->usuario->updateOne(
                [ "_id" => new MongoDB\BSON\ObjectID($this->getId_usuario()) ],
                [ '$set' =>  $this]);
        }
    //    $stm = BDMongo::getConexion()->usuario->insertOne($this);
                
    }

    static function listar(){
        $usuarios = [];
        $stm = BDMongo::getConexion()->usuario->find();
        $stm->setTypeMap(['root' => self::class]);
        foreach($stm as $user) {
              $usuarios[(String)$user->getId_usuario()] = $user;
        }
        return $usuarios;
    }

    function modificar(){

        $update = BDMongo::getConexion()->usuario->updateOne(
            [ '_id' => new MongoDB\BSON\ObjectId($this->getId_usuario())],
                [ '$set' => [
                    'nombre' => $this->getNombre(),
                    'correo' => $this->getCorreo(),
                    'pass' => $this->getPassword(),
                    'rol' => $this->getRol(),
                    'id_usuario' => $this->getId_usuario()
                ]]
        );
        
    }

    static function eliminar($id){
        BDMongo::getConexion()->usuario->deleteOne(
            [ "_id" => new MongoDB\BSON\ObjectID($id) ]
           );
    }

    //Funciones de serializado
    public function bsonUnserialize(array  $data): void
    {
       foreach ($data as $key => $value) {
           switch ($key) {
               case '_id': $this->setIdUsuario((String)$value); break;
               default: $this->$key = $value; break;
           }
       }
    }
    
    public function bsonSerialize(): array
    {
        $array = (array) $this;
        if (isset( $this->getIdUsuario())) {
         $array['_id'] =  new MongoDB\BSON\ObjectID($this->getIdUsuario());
        }
        unset($array['id_usuario']);
        return $array;
    }
    

}