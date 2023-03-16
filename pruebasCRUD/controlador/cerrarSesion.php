<?php
@session_start();
unset($_SESSION["usuarioLogueadoCorreo"]);
unset($_SESSION["selectorPersistencia"]);
header("Location: ../index.php");
?>