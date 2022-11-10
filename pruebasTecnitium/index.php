<?php 
session_start();
$nombre;

if($_SERVER['REQUEST_METHOD']== 'POST'){
    if(!empty($_POST['nombre'])){
        $_SESSION['nombre'] = $_POST['nombre'];
        $nombre = $_SESSION['nombre'];
    }
    else{
        $nombre = $_SESSION['nombre'];
    }
}
else{
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
<?php if(isset($nombre)){
        echo "<h1>Hola! ". $nombre ."</h1>";
    }
    ?>
  <form action="" method="POST">
    <input type="text" id="nombre" value="" name="nombre">
    <input type="submit" value="enviar">
  </form>  
</body>
</html>
