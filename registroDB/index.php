<?php
    if(isset($_SESSION['usuario'])){
        header('Location: '."privado.php");
    }
    else{
        header('Location: '."login.php");
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
    <section>
    </section>
</body>
</html>