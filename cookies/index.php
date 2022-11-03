<?php
// Función creación cookie
if (!empty($_POST["color"])) {
    setcookie("color",$_POST["color"],time()+3600);
    $color = $_POST['color'];
}
else{
    if(isset($_COOKIE['color'])){
        $color = $_COOKIE['color'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Selecciona el color: </p>
        <input type="color" name="color" id="color">
        <input type="submit" value="enviar">
    </form>
</body>
</html>
