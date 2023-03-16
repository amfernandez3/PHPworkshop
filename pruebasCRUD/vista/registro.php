<?php
/*
Importamos las clases con las que trabajaremos
*/
require_once("../modelo/usuario/usuarioSesiones.php");
/*
Contrastamos la información recibida por POST con la del modelo de persistencia seleccionado
*/
$mensaje = "";
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


    if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"]) && isset($_POST["correo"])&& isset($_POST["password"]) ) {
        if(isset($_POST['selectorPersistencia'])){
            $_SESSION["selectorPersistencia"] = $_POST['selectorPersistencia'];
        }
        else{
            $_SESSION["selectorPersistencia"] = 0;
        }
        $correo = $_POST["correo"];
        $passwd = $_POST["password"];
        $nombre = $_POST["nombre"];
        /**
         * Generamos el id dinámico en base al tamaño de la sesión
         */
        //unset($_SESSION["usuarios"]);
        $id;
        if(isset($_SESSION["usuarios"])){
            $id = count(unserialize($_SESSION["usuarios"]));
        }
        else{
            $id = 0;
        }
        
        $usuario = new usuarioSesiones($id, $nombre, $correo,"usuario",$passwd,false);

        //Comprobamos si el usuario  ya existe en la base de datos antes de añadirlo.
        if($usuario->comprobarExisteUsuario($correo, $passwd)){
            $mensaje = "El correo ya existe en la BD";
        }
        else{
            $mensaje = "El usuario se añadió a la base de datos";
            $usuario->guardarUsuario($usuario);
            $_SESSION["usuarioLogueadoCorreo"] = $usuario->getCorreo();
            header("location:../index.php");
        }
        
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="mensaje"><?=$mensaje?></div>
    <div class="contenedor">
        <h2>Crear nuevo usuario</h2>
        <form action="" method="post">
                <label for="nombre" class="help-block">Nombre de usuario: </label>
                <input class="input form-control" type="text" name="nombre" id="nombre" required placeholder="Nombre">
                <label for="correo" class="help-block">Correo: </label>
                <input class="input form-control" type="email" name="correo" id="correo" required placeholder="Correo de usuario">
                <label for="password" class="help-block">Contraseña: </label>
                <input class="input form-control" type="password" name="password" id="password" required placeholder="Contraseña">
                <label for="selectorPersistencia">Selecciona la DB:</label>
                <select class="selectorPersistencia form-control" name="selectorPersistencia" required>
                <option value="0">Sesiones</option>
                <option value="1">MySQL</option>
                <option value="2">MongoDB</option>
            </select>
                <input class="btn btn-success" type="submit" value="Registrar">  
        </form>
        <a class="badge-secondary" href="login.php">volver al login</a></td>
    </div>
</body>
</html>