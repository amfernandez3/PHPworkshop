<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (!isset($_SESSION["correo"])) {
    header("location:login.php");
    exit();
}else{
    require_once("usuario.php");

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (!isset($_SESSION["usuario"])) {
        header("location:login.php");
        exit();
    }
    /*
    $hash = password_hash("12345",PASSWORD_DEFAULT);
    if (password_verify("12345",$hash)) {
        echo "Acceso verificado";
    } else {
        echo "acceso denegado";
    }
    */

    if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"]) && isset($_POST["nombre"])&& isset($_POST["apellidos"]) ) {
        try{
            $correo = $_POST["correo"];
        $passwd = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $objeto = new usuario(null,$nombre,$apellidos,$correo,$passwd);

        $dsn = "mysql:dbname=docker_demo;host=docker-mysql";
        $usuario ="root";
        $password = "root123";
        $bd = new PDO($dsn, $usuario, $password);

        $stm = $bd->prepare("INSERT INTO usuario (nombre, apellidos, email, pass) VALUES (:nombre,:apellidos,:correo,:password)"); //los dos puntos hacen referencia al nombre de la siguiente linea
        $stm->execute([":nombre"=>$nombre,":apellidos"=>$apellidos,":correo"=>$correo,":password"=>$passwd]);
        }
        catch(Exception $e){
            echo "Error";
        }
        header("location:tablaUsuarios.php");
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>New User</title>
 
</head>
<body>
    <div class="contenedor">
        <h2>Introduce un nuevo usuario</h2>
        <form action="" method="post">
            <input class="inpt" type="text" name="nombre" id="nombre" required placeholder="Nombre" value="<?php //  (isset($objeto))?$objeto->getNombre():""?>">

            <input class="inpt" type="text" name="apellidos" id="apellidos" required placeholder="Apellidos" value="<?php // (isset($objeto))?$objeto->getApellidos():""?>">

            <input  class="inpt" type="text" name="correo" id="correo" required placeholder="Correo de usuario" value="<?php //(isset($objeto))?$objeto->getCorreo():""?>">

            <input class="inpt" type="password" name="password" id="password"  required placeholder="Correo de usuario">
            <input class="boton"type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>