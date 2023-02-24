<?php
/*
La lógica del login es la siguiente: un formulario que envía los datos al propio documento, donde son tratados:
    Si envian todos los campos se crea un nuevo usuario con ellos, si este nuevo usuario tiene unos datos idénticos a los de control
    se permite el login y se almacenan en sesiones sus datos. Tras ello volvemos al index, donde el código derivará a agenda.
*/
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="mensaje"><?=$mensaje?></div>

    <section>
        <h2>Inicio de sesión</h2>
        <form action="" method="post">
            <label for="correo" class="help-block">Correo:</label>
                <input class="form-control" type="email" name="correo" id="correo" required>
                <label for="password" class="help-block">Password:</label>
                <input class="form-control" type="password" name="password" id="password" required>
                <input class="btn btn-success pull-right" id="buttonAct" type="submit" value="Acceso">
        </form>
</section>
   
</body>
</html>