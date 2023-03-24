<?php
require_once(dirname(__FILE__)."/../controlador/conexionDB.php");
//require_once("../controlador/conexionDB.php");
require_once("interfazPersistencia.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

class EventosMysql extends Evento implements interfazPersistencia{

   function guardar(){
        $stm = BDMySql::getConexion()->prepare("INSERT into evento ( id_usuario, nombre, descripcion, fecha_inicio, fecha_fin) 
        values(:id_usuario, :nombre, :descripcion, :fecha_inicio, :fecha_fin)"); 
                $stm->execute([//":id_evento"=>null,
                ":id_usuario"=>$this->getId_usuario(),
                ":nombre"=>$this->getNombre(),
                ":descripcion"=>$this->getDescripcion(),
                ":fecha_inicio"=>$this->getFecha_inicio(),
                ":fecha_fin"=>$this->getFecha_fin()]);
    }

    static function listar(){
        $stm = BDMySql::getConexion()->prepare("SELECT * from evento"); 
        $stm->execute();
        $eventos = [];
        while (($evento = $stm->fetch())!=null) {
            $eventos[] =  new self(
            $evento["id_evento"],
            $evento["id_evento"],
            $evento["nombre"],
            $evento["descripcion"],
            $evento["fecha_inicio"],
            $evento["fecha_fin"]);
        }
        return $eventos;
    }

    function modificar($datos){
        $stm = BDMySql::getConexion()->prepare("UPDATE evento SET nombre = :nombre , fecha_inicio = :fecha_inicio, fecha_fin= :fecha_fin where id_evento=:id");
        $stm->execute([":nombre"=>$datos->getNombre(),
        ":fecha_inicio"=>$datos->getFecha_inicio(),
        ":fecha_fin"=>$datos->getFecha_fin(),
        ":id"=>$datos->getId_evento()]);
    }

    static function eliminar($id){
        $stm = BDMySql::getConexion()->prepare("DELETE from evento where id_evento = :id ");
        $stm->execute([":id"=>$id]);
    }

}