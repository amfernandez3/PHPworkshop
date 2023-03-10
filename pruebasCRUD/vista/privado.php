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
    <p>Zona privada del usuario : <?=$_SESSION["correoUsuario"] ?> </p>
    <p>Sus datos son: <?php if(isset($_SESSION["usuarios"])){echo '<pre>';print_r( unserialize($_SESSION["usuarios"])); echo '</pre>';}?> </p>
    <button><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
    <button><a href="registro.php">Registro</a></button>
</body>
</html>