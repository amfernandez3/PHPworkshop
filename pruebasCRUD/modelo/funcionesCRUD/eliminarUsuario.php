<?php
require_once(dirname(__FILE__)."/../SelectorPersistente.php");
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
} 


$id = $_GET['id'];


/**
 * Método que recorre el array de usuarios, buscando por id_usuario y elimina
 */
$usuarios = SelectorPersistente::getUsuarioPersistente()::eliminar($id);
header("location:../../vista/gestionUsuarios.php");
//header(dirname(__FILE__)."/../vista/privado.php");
exit();