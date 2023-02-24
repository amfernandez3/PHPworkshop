<?php

//Comprobamos si existe ya la sesión: 0 -> iniciamos una
if(!session_start()){
    session_start();
}
if (!isset($_SESSION["correo"])) {
    header("location:login.php");
    exit();
} else {
    include("agenda.php");
}
?>