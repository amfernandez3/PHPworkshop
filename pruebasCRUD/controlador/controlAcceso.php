<?php
//Script de control de acceso a zona privada sin login
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

if(isset($_SESSION["usuarioLogueadoCorreo"])){
    $correo = $_SESSION["usuarioLogueadoCorreo"];
}
else{
    header("location:../vista/login.php");
}
?>