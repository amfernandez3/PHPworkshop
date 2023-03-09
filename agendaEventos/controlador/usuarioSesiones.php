<?php
require_once("../modelo/persistenciaDatos/selectorPersistencia.php");
require_once("../modelo/persistenciaDatos/interfazPersistencia.php");
require_once("../modelo/conexionDB.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

class UsuarioSesiones implements interfazPersistencia{

    function guardar($datos){
        $usuarios =[];
        if(isset($_SESSION['usuarios'])){
            $usuarios = unserialize($_SESSION['usuarios']);
        }
        $datos->setId_usuario(count($usuarios));
        $usuarios[$datos->getId_usuario()] = $datos;
        $_SESSION['usuarios'] =  serialize($usuarios);
    }

    function listar(){
        $usuarios = [];
        if(isset($_SESSION['usuarios'])){
            $usuarios = unserialize($_SESSION['usuarios']);
        }
        return $usuarios;
    }

    function modificar($datos){
        self::guardar($datos);
    }

    function eliminar($id){
        $usuarios = [];
        if(isset($_SESSION['usuarios'])){
            $usuarios = unserialize($_SESSION['usuarios']);
        }
        unset($usuarios[$id]);
        $_SESSION['usuarios'] =  serialize($usuarios);

    }

}