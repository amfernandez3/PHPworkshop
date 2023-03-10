<?php
/*
Importamos las clases con las que trabajaremos
*/
require_once("../modelo/usuarioSesiones.php");
/*
Contrastamos la información recibida por POST con la del modelo de persistencia seleccionado
*/
$mensaje = "";
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


    if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"]) && isset($_POST["correo"])&& isset($_POST["password"]) ) {

        $correo = $_POST["correo"];
        $passwd = $_POST["password"];
        $nombre = $_POST["nombre"];
        
        $usuario = new usuarioSesiones(1, $nombre, $correo,"usuario",$passwd);
        $usuario->guardarUsuario($usuario);
        
        $_SESSION["correoUsuario"] = $usuario->getCorreo();

        header("location:../index.php");

        /* foreach ($usuarios as $id => $usuario) {

            if($usuario->getCorreo() == $correo && $usuario->getPassword() == $passwd){
                $_SESSION["correo"] = $correo;
                $_SESSION["id"] = $usuario->getId_usuario();
                header("location:index.php");
                exit();
            }else{
                $mensaje = "Usuario no encontrado";
            }
        }   */
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="mensaje"><?=$mensaje?></div>
    <div class="contenedor">
        <h2>Crear nuevo usuario</h2>
        <form action="" method="post">
                <input class="input" type="text" name="nombre" id="nombre" required placeholder="Nombre">
                <input class="input" type="email" name="correo" id="correo" required placeholder="Correo de usuario">
                <input class="input" type="password" name="password" id="password" required placeholder="Contraseña">
                <input class="boton" type="submit" value="Login">  
        </form>
        <a  href="login.php">volver al login</a></td>
    </div>
</body>
</html>