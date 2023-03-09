<?php
/**
 * Realizamos los imports:
 * 
 */
require_once("../controlador/eventoSesiones.php");
require_once("../controlador/usuarioSesiones.php");
require_once("../controlador/eventoMysql.php");
require_once("../controlador/usuarioMysql.php");

/**
 * Creamos la clase selector de persistencias
 */
class SelectorPersistente{
    static private  function getTipoEvento() {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        return $_SESSION["guardarEstado"];
    }

    static private  function getTipoUsuario() {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        return $_SESSION["guardarEstado"];
    }

    static public function getEventoPersistente(){
        $obj =null;
        switch(self::getTipoEvento()){
            case 0: 
                $obj =  new EventosSessiones();
                break;
            
            case 1:
               // $obj =  new EventosMysql();
                break;
            
            case 2:
                //$obj =  new EventosMongo();
                break;

            default: 
            $obj =  new EventosSessiones();
            break;
        }
        return $obj;
    }

    static public function getUsuarioPersistente(){
        $obj =null;
        switch(self::getTipoUsuario()){
            case 0: 
                $obj =  new UsuarioSesiones();
                break;
            
            case 1:
               // $obj =  new EventosMysql();
                break;
            
            case 2:
                //$obj =  new EventosMongo();
                break;

            default: 
            $obj =  new UsuarioSesiones();
            break;
        }
        return $obj;
    }
}