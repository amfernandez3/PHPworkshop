<?php
    $nombre;

   if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['nombre'])){
        //Si se envió una petición POST e incluye 'nombre' no vacío, creamos la cookie.
        setcookie('nombre', $_POST['nombre'], time()+3600);
        $nombre = $_POST['nombre'];
    }
    else{
        //Si se envía una petición pero el nombre está vacío
        
    }
   }
   else{
    //Si no se accede por post pero la cookie está creada y vigente:
    if(isset($_COOKIE['nombre'])){
        $nombre = $_COOKIE['nombre'];
    }
    else{
        //No accede por post y no hay cookie
        echo "Nombre no registrado.";
    }
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
    <div class="saludo">
        <?php
        if(isset($_COOKIE['nombre'])){
            echo "Tu nombre es: " . $nombre;
        }
       
        ?>
    </div>
    <form action="" method="post">
        <p>Introduce tu nombre: </p>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="enviar">
        <input type="reset" value="reset">
    </form>
</body>
</html>