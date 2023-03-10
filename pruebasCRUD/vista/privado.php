<?

/**
 * Iniciamos el control de sesiones:
 */
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

$correo;
if(isset($_SESSION["usuarioLogueadoCorreo"])){
    $correo = $_SESSION["usuarioLogueadoCorreo"];
}
else{
    header("location:../vista/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Logueado con la cuenta: <?=$_SESSION["usuarioLogueadoCorreo"] ?> </p>
    <p>Usuarios registrados: <?php if(isset($_SESSION["usuarios"])){echo '<pre>';print_r( unserialize($_SESSION["usuarios"])); echo '</pre>';}?> </p>
    <button><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
    <button><a href="registro.php">Registro</a></button>
</body>
</html>