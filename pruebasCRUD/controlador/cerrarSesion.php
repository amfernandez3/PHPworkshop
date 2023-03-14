<?php
@session_start();
unset($_SESSION["usuarioLogueadoCorreo"]);
header("Location: ../index.php");
?>