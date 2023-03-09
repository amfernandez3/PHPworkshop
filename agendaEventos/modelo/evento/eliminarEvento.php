<?php
require_once("evento.php");
require_once("../persistenciaDatos/selectorPersistencia.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 


$id = $_GET['id'];

$eventos = SelectorPersistente::getEventoPersistente()->listar();
foreach ($eventos as $key => $evento){
    if($evento->getId_evento() == $id){
        SelectorPersistente::getEventoPersistente()->eliminar($id);
    }
}
include("agenda.php");