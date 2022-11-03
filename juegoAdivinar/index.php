<?php

    session_start();
   
    if (isset($_SESSION['numeroAleatorio']) && isset($_SESSION['contador'])) {
        //Si el número aleatorio ya está definido
   
        if(isset($_SESSION['numeroAleatorio']) && $_SESSION['contador'] <= 0){
            session_destroy();
            
        }
    } else {
        //Si el número aleatorio aún no está definido
        $_SESSION['numeroAleatorio'] = rand(0, 100);
        $_SESSION['contador'] = 4;
        $_SESSION['seguirJugando'] = true;
        $_SESSION['ganador'] = false;
    }
    if (!empty($_POST['numero']) && $_SESSION['contador'] > 0) {
        //Se ha recibido un numero usando post
        echo "Has introducido el numero :" . $_POST['numero'];
        $_SESSION['contador']--;
        if ($_POST['numero'] == $_SESSION['numeroAleatorio']) {
            $_SESSION['ganador'] = true;
        } elseif ($_POST['numero'] > $_SESSION['numeroAleatorio']) {
            echo "</br>El número introducido es mayor que el secreto.</br>";
        } else {
            echo "</br>El número introducido es menor que el secreto.</br>";
        }
    } elseif ($_SESSION['contador'] <= 0) {
        $_SESSION['seguirJugando'] = false;
    } else {
        //No se ha recibido un numero a través de post
        //echo "Introduce un número válido.";
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
            padding: 10px;
            margin-top: 15px;
        }
    </style>
    <title>Document</title>
</head>

    <body>
    <h2 class="font-weight-bold" style="text-align: center;">Adivina el número secreto! (entre 0 - 100)</h2>

    <?php if ($_SESSION['seguirJugando'] && $_SESSION['ganador'] == false) { ?>
        
        <form action="" method="post">
            <input type="text" name="numero" id="numero">
            <input type="submit" value="enviar">
            </br>
            <?php echo "</br>Quedan " . $_SESSION['contador'] +1 . " intentos."; ?>
            
        </form> 
        <?php } else {
        if ($_SESSION['ganador'] == true) {
        ?>
        <h3>Has acertado!</h3>
        <p>El número era: <?php echo $_SESSION['numeroAleatorio']?></p>
        <form action="" method="post">
        <input type="submit" value="ReiniciarJuego" name="reiniciarJuego">
        </form>
        <?php } 
        else{ ?>
            <h3>Has perdido.</h3>
            <p>El número era: <?php echo $_SESSION['numeroAleatorio']?></p>
            <form action="" method="post">
        <input type="submit" value="ReiniciarJuego" name="reiniciarJuego">
        </form>
        <?php } ?>
    <?php } ?>

</body>

</html>