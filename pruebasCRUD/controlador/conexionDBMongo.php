<?php
require_once('vendor/autoload.php');

class conexionDBMongo{
    private  $conexion;
    private static $bd;

    private function __construct(){
        $conn = new MongoDB\Client("mongodb://root:example@mongo:27017");
        $this->conexion = $conn->agenda;
    }

    private function __clone() { }

    public static function getConexion(){

        if (!isset(self::$bd)) {
            self::$bd = new conexionDBMongo();
        }

        return self::$bd->conexion;
    }
}