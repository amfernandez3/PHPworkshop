<?php

/**
 * Importamos las clases que usaremos: todas las que definen las posibles instancias de usuario / evento
 */
require_once("eventoSesiones.php");
require_once("usuario/usuarioSesiones.php");
require_once("eventoMysql.php");
require_once("usuario/usuarioMysql.php");

/**
 * funcion: persistenciaSeleccionada: devuelve un valor numérico que definirá el tipo de persistencia. (procede de form)
 * 
 * funcion: getEventoPersistente: en base a "persistenciaSeleccionada"
 * 
 * funcion: getUsuarioPersistente:
 */
class SelectorPersistente{
    static private  function persistenciaSeleccionada() {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        return isset($_SESSION["selectorPersistencia"])?$_SESSION["selectorPersistencia"]:-1;
    }
    
    /**
     * Funcion que discrimina el tipo de persistencia en string
     */
        static public function tipoPersistencia() {
            
            switch(self::persistenciaSeleccionada()){
                case 0: return "Sesiones";
                break;
                case 1: return "Mysql";
                break;
                case 2: return "MongoDB";
                return;
                default: return "Sesiones";
                break;
            }
        }

    static public function getEventoPersistente(){
    
        switch(self::persistenciaSeleccionada()){
            case 0: 
                $evento = eventoSesiones::class;
                break;
            
            case 1:
                $evento =  EventosMysql::class;
                break;
            
            case 2:
                //$evento =  new EventosMongo();
                break;

            default: 
              $evento =  eventoSesiones::class;
            break;
        }
        //Devolvemos el evento creado a cuyos métodos se pueden realizar llamadas.
        return $evento;
    }



    static public function getUsuarioPersistente(){
        $usuario =null;
        switch(self::persistenciaSeleccionada()){
            case 0: 
                $usuario = usuarioSesiones::class;
                break;
            
            case 1:
                $usuario = usuarioMysql::class;
                break;
            
            case 2:
                //$usuario = usuarioMongo::class;
                break;

            default: 
            $usuario = usuarioSesiones::class;
            break;
        }
        return $usuario;
    }
}