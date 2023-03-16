<?php
require_once("../evento.php");
require_once("../selectorPersistencia.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 


$id = $_GET['id'];

$eventos = unserialize($_SESSION["eventos"]);

/**
 * Método que recorre el array de eventos, buscando por id_evento y elimina
 */
foreach ($eventos as $key => $evento){
    if($evento->getId_evento() == $id){
        
        $evento->eliminar($id);
    }
}

include("../../vista/privado.php");