<?php
session_start();
$contador = 0;
$color = "#FFF";

//Contador para los cambios de color por sesión: Si no existe contador lo creamos, si existe lo aumentamos
if (!isset($_COOKIE["contador"])){
    setcookie('contador','0',time()+3600);
}

//Si envía el color en el form:
if (isset($_POST["color"])){
    $_SESSION['color'] = $_POST["color"];
    $color = $_SESSION['color'];
    $_COOKIE['contador']++;
    $contador = $_COOKIE['contador'];
    setcookie('contador',$contador,time()+3600);

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: <?=$color?>;
        }
    </style>
    <title>Color con sesión</title>

</head>
<body>
   <p>Introduce un color para el fondo: </p>
   <form action="" method="post">
    <caption>color: </caption>
    <input type="color" name="color" id="color" value="<?php $color ?>">
    <input type="submit" value="cambiar fondo">
   </form>
   <p>El fondo se ha cambiado : <?php if(isset($_COOKIE["contador"]))echo $contador ?> veces</php></p>
</body>
</html>