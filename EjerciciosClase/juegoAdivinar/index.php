<?php
session_start();

if (isset($_SESSION['numeroAleatorio']) && isset($_SESSION['contador'])) {
    //Si el número aleatorio ya está definido

    if (isset($_SESSION['numeroAleatorio']) && $_SESSION['contador'] <= 0) {
        session_destroy();
    }
} else {
    //Si el número aleatorio aún no está definido
    $_SESSION['numeroAleatorio'] = rand(0, 100);
    $_SESSION['contador'] = 4;
    $_SESSION['seguirJugando'] = true;
    $_SESSION['ganador'] = false;
    $_SESSION['historico'] = array();
}
if (!empty($_POST['numero']) && $_SESSION['contador'] > 0) {
    //Se ha recibido un numero usando post

    //array_push($_SESSION['historico'],$_POST['numero']);
    $_SESSION['historico'][]=$_POST['numero'];
    $_SESSION['contador']--;
    if ($_POST['numero'] == $_SESSION['numeroAleatorio']) {
        $_SESSION['ganador'] = true;
    } elseif ($_POST['numero'] > $_SESSION['numeroAleatorio']) {
        echo "</br>El numero " . $_POST['numero'] . " es mayor que el secreto.</br>";
    } else {
        echo "</br>El numero " . $_POST['numero'] . " es menor que el secreto.</br>";
    }
} elseif ($_SESSION['contador'] <= 0) {
    $_SESSION['seguirJugando'] = false;
} else {
    //No se ha recibido un numero a través de post
    //echo "Introduce un número válido.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
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

        <form action="" method="post" class="text-primary">
            <input type="text" name="numero" id="numero">
            <input type="submit" value="enviar">
            </br>
            <?php echo "</br>Quedan " . $_SESSION['contador'] + 1 . " intentos."; ?>

        </form>
        <?php } else {
        if ($_SESSION['ganador'] == true) {
        ?>
            <h3 class="text-success">Has acertado!</h3>
            <p>El número era: <?php echo $_SESSION['numeroAleatorio'] ?></p>
            <form action="" method="post">
                <input type="submit" value="ReiniciarJuego" name="reiniciarJuego">
            </form>
        <?php } else { ?>
            <h3 class="text-danger">Has perdido.</h3>
            <p>El número era: <?php echo $_SESSION['numeroAleatorio'] ?></p>
            <form action="" method="post">
                <input type="submit" value="Reiniciar juego" name="reiniciarJuego">
            </form>
        <?php } ?>
    <?php } ?>

    <div class="historico">
            <p>Últimos intentos: <?php  echo implode(',', $_SESSION['historico']) ?></p>
    </div>

</body>

</html>