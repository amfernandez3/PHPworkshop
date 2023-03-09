<?
$correo;
if(isset($_SESSION["correoUsuario"])){
    $correo = $_SESSION["correoUsuario"];
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
    <p>Zona privada del usuario : <?=$correo ?> </p>
    <button><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
</body>
</html>