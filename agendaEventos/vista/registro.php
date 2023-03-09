<?php

/**
 * Definimos los imports de los elementos que usaremos.
 */
require_once("../modelo/usuario/usuario.php");
require_once("../modelo/persistenciaDatos/selectorPersistencia.php");
require_once("../modelo/conexionDB.php");
$mensaje = "";


/**
 * Si la sesión no está activa, la iniciamos.
 */
if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}


/*
Si existe la sesión usuarios cargamos la información.
*/
$usuarios = [];
if(isset($_SESSION['usuarios'])){
    $usuarios =  unserialize($_SESSION['usuarios']);
}

if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"])&& isset($_POST["nombre"]) ) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $_SESSION["guardarEstado"] = $_POST['volcarSistema'];

    $usuario = new Usuario($nombre,$correo,$password,true);
    SelectorPersistente::getUsuarioPersistente()->guardar($usuario);
    header("location:../index.php");
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
    <title>Registro Usuario</title>
</head>
<body>
    <div class="mensaje"><?=$mensaje?></div>
        <h2>Crear nuevo usuario</h2>
        <form action="" method="post">
            <input class="inpt" type="text" name="nombre" id="nombre" required placeholder="Nombre de usuario">
            <input class="inpt" type="email" name="correo" id="correo" required placeholder="Correo de usuario">
            <input class="inpt" type="password" name="password" id="password" required placeholder="Contraseña">
            <select class="volcarSistema" name="volcarSistema" required>
                <option value="0">Sesiones</option>
                <option value="1">MySQL</option>
                <option value="2">MongoDB</option>
            </select>
            <input class="boton" type="submit" value="Registrar">    
        </form>
        <label for="volverLogin">Volver al login: </label>
        <button id="volverLogin"><a  href="login.php">Volver</a></td></button>
        
    </div>
   
</body>
</html>