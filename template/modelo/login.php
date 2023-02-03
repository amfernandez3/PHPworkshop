<?php
require_once("./template/modelo/Usuario.php");
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if (isset($_POST['correo']) && isset($_POST['password'])) {
        $usuario1 = new Usuario();
        if($_POST['correo'] == "alejandro@gmail.com" && $_POST['password'] == "abc123."){
            header('Location: addEvento.php');
        }
        else{
            header('Location: ../index.php');
        }
    }
}

?>