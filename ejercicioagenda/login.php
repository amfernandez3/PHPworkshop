<?php
require_once("Usuario.php");
$mensaje = "";
if(!session_start()){
    session_start();
}
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"]) ) {
    $correo = $_POST["correo"];
    $passwd = $_POST["password"];

    $usuario1 = new Usuario(1,"alex","alejandro@gmail.com","abc123.","Admin",false);

    if($usuario1->getCorreo() == $correo && $usuario1->getPassword() == $passwd){
        $mensaje =  "Acceso correcto";
            $_SESSION["correo"] = $correo;
            $_SESSION["usuario"]["idUsuario"] = $usuario1->getId_usuario();
            $_SESSION["usuario"]["nombre"] = $usuario1->getNombre();
        header("location:index.php");
        exit();
    } else {
        $mensaje = "Datos incorrectos";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mensaje"><?=$mensaje?></div>

    <section>
        <h2>Inicio de sesión</h2>
        <form action="" method="post">
            <label for="correo">Correo:</label>
                <input class="inpt" type="email" name="correo" id="correo" required>
                <label for="password">Password:</label>
                <input class="inpt" type="password" name="password" id="password" required>
                <input class="boton" type="submit" value="Entrar">    
        </form>
</section>
   
</body>
</html>