<?php

require_once(dirname(__FILE__)."/../controlador/conexionDBMongo.php");
require_once("interfazPersistencia.php");
require_once("evento.php");
require_once('vendor/autoload.php');
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

class EventosMongo extends Evento implements interfazPersistencia, MongoDB\BSON\Persistable{

    function guardar(){
        if (is_null($this->getId_evento())) {
            //Definir flujo de control si id == null
            
        } else {
            BDMongo::getConexion()->eventos->updateOne(
                [ "_id" => new MongoDB\BSON\ObjectID($this->getId_evento()) ],
                [ '$set' =>  $this]);
        }
    //    $stm = BDMongo::getConexion()->usuario->insertOne($this);
                
    }

    static function listar(){
        $eventos = [];
        $stm = BDMongo::getConexion()->eventos->find();
        $stm->setTypeMap(['root' => self::class]);
        foreach($stm as $event) {
              $eventos[(String)$event->getId_evento()] = $event;
        }
        return $eventos;
    }

    function modificar(){
        //echo ((String)$this->getFecha_fin()->format('Y-m-d H:i:s'));
        $update = BDMongo::getConexion()->eventos->updateOne(
            [ '_id' => new MongoDB\BSON\ObjectId($this->getId_evento())],
                [ '$set' => [
                    'nombre' => $this->getNombre(),
                    'fecha_inicio' => (String)$this->getFecha_inicio(),
                    'fecha_fin' => (String)$this->getFecha_fin()
                ]]
        );
        
    }

    static function eliminar($id){
        BDMongo::getConexion()->eventos->deleteOne(
            [ "_id" => new MongoDB\BSON\ObjectID($id) ]
           );
    }


    public function bsonUnserialize(array  $data): void
    {
     //$this->nombre = $data["nombre"];
       foreach ($data as $key => $value) {
           switch ($key) {
               case '_id': $this->setId_evento((String)$value); break;
               case 'fecha_inicio': $this->setFecha_inicio((String)$value); break;
               case 'fecha_fin':  $this->setFecha_fin((String)$value); break;
               default: $this->$key = $value; break;
           }
       }
    }
    
    public function bsonSerialize(): array
    {
        $array = (array) $this;
        $array["fecha_inicio"]  = (String)$this->getFecha_inicio();
        $array["fecha_fin"]  = (String)$this->getFecha_fin();
        if (isset( $this->getId_evento())) {
         $array['_id'] =  new MongoDB\BSON\ObjectID($this->getId_evento());
        }
        unset($array['id_evento']);
        return $array;
    }

}