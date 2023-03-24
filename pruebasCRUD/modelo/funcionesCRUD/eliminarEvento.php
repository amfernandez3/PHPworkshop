<?php
require_once(dirname(__FILE__)."/../SelectorPersistente.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 


$id = $_GET['id'];


/**
 * Método que recorre el array de eventos, buscando por id_evento y elimina
 */
$eventos = SelectorPersistente::getEventoPersistente()::eliminar($id);
//header("../../vista/privado.php");
header(dirname(__FILE__)."/../vista/privado.php");