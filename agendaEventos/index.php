<?php
//Entrada principal del programa, aquí se comprueba la existencia de sesión de usuario.
/**
 * Si no existe la sesión se envía al usuario a la página de login.
 * Si existe la sesión se carga la agenda del usuario
 */

if(!session_start()){
    session_start();
}
if (!isset($_SESSION["correo"])) {
    header("location:./vista/login.php");
    exit();
} else {
    include("./vista/agendaUsuario.php");
}
?>