<?php
/**
 * Creamos los imports
 */
require_once("../modelo/usuarioSesiones.php");
require_once("../modelo/usuario.php");

/*
Contrastamos la información recibida por POST con la del modelo de persistencia seleccionado
*/
$mensaje = "";
$Usuarios;

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


    if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"]) ) {

        $correo = $_POST["correo"];
        $passwd = $_POST["password"];


        // todo: incluir despues de validacion : $_SESSION["correoUsuario"] = $_POST['correo'];
        
        /**
         * Cotejamos los datos introducidos con los de la base.
         */
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Página de login</title>
</head>
<body>
    <div class="mensaje"><?=$mensaje?></div>
    <div class="contenedor">
        <h2>Inicio de sesión</h2>
        <form action="" method="post">
                <input class="input" type="email" name="correo" id="correo" required placeholder="Correo de usuario">
                <input class="input" type="password" name="password" id="password" required placeholder="Contraseña">
                <input class="boton" type="submit" value="Login">  
        </form>
        <a  href="registro.php">Registrarse</a></td>
    </div>
   
</body>
</html>