<?php
require_once("./ahorcado.php");
require_once("./controladorDatos.php");

session_start();
$controlador1 = new controladorDatos();
$ahorcado1 = new ahorcado();

$mensaje = null;  //Mensajes a mostrar el jugador: letra repetida, ha gando, ha perdido, ...
$partidas_jugadas = 0;  //Partidas totales jugadas por el jugador
$partidas_ganadas = 0; //Partidas ganadas por el jugador






if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
}


//Control del juego (2,25 puntos)
/*
Utiliza aquí las funciones creadas anteriormente y haz que el juego funcione
Flujo: inicio de partida, seteo de datos (si no existen aún):
iteración de comprobación de letras
*/
if (!isset($_SESSION['palabra'])) {
    iniciarJuego($palabra, $palabra_oculta, $letras, $vidas, $ganar, $partidas_jugadas, $partidas_jugadas);
}
cargarEstadoJuego($palabra, $palabra_oculta, $letras, $vidas, $ganar, $partidas_jugadas, $partidas_jugadas);


//Pasamos la letra introducida a Mayúscula:
if (!empty($_POST['letra'])) {
    $letra = strtoupper($_POST['letra']);
    array_push($letras, $letra);
} else {
    $letra = "";
}
//Flujo del juego: comprobacion letra, modificación string.

if (posicionesLetra($palabra, $letra)) {
    $mensaje = $mensaje . "La letra está en la palabra!";
    //Aquí el array de posiciones modifica esos índices en $palabra_oculta
    $posiciones = posicionesLetra($palabra, $letra);
    $palabra_oculta = colocarLetras($palabra_oculta, $posiciones, $letra);
    if ($palabra == $palabra_oculta) {
        $ganar == true;
        $mensaje = "Esa era la última...Has ganado!";
        $partidas_jugadas = $_COOKIE['partidas_jugadas'] + 1;
        $partidas_ganadas = $_COOKIE['partidas_ganadas'] + 1;
        $partidaTerminada = true;
    }
} else {
    if($vidas == 8){
        $mensaje = $mensaje . "Introduce una letra para jugar!";
    }else{
        $mensaje = $mensaje . "La letra no está en la palabra!  (vacía == error)";

    }
    $vidas--;
    if ($vidas <= 0) {
        $mensaje = "...Has perdido...!";
        $ganar = false;
        $partidas_jugadas = $_COOKIE['partidas_jugadas'] + 1;
        $partidas_ganadas = $_COOKIE['partidas_ganadas'];
        $partidaTerminada = true;
    }
}
guardarEstadoJuego($palabra, $palabra_oculta, $letras, $vidas, $partidas_jugadas, $partidas_ganadas);

if ($partidaTerminada) {
    setcookie('partidas_jugadas', $partidas_jugadas, time() + 3600 * 24 * 30);
    if ($ganar) {
        setcookie('partidas_ganadas', $partidas_ganadas, time() + 3600 * 24 * 30);
    }
    session_destroy();
}










//Mostrar datos (1 punto)

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            text-align: left;
            font-family: Georgia, 'Times New Roman', Times, serif;
            padding: 15px;
            margin-left: 100px;
        }

        h2 {
            text-align: center;
        }

        div {
            margin: 20px;
        }

        #zonaJuego {
            border: 1px solid;
            width: 30%;
            padding: 20px;
            margin-top: 50px;
            display: inline-block;
        }

        #vidas {
            border: 1px solid black;
            display: inline-block;
            padding: 10px;
        }

        #zonaFinal {
            text-align: center;
        }

        #zonaGrafica {
            border: 1px solid;
            float: right;
            width: 30%;
            padding: 20px;
            margin-top: 50px;
            margin-right: 150px;
            height: 360px;

        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego ahorcado</title>
</head>

<body>
    <header>
        <h2>AHORCADO</h2>
    </header>
    <div id="zonaFinal">
        <?php
        if ($partidaTerminada) {
            echo "<h2>" . $mensaje . " </h2>";
            if($ganar == true){ ?>
    <img src="./assets/dibujoGanador.jpg" width="300" height="300" alt="dibujoGanador">
            <?php }
            else{ ?>
    <img src="./assets/dibujo7.jpg" width="300" height="300" alt="dibujo7">
            <?php }
        ?>
            <form action="" method="post">
                <input type="submit" value="Jugar nueva partida" name="reiniciar">
            </form>
    </div>
<?php

        } else { ?>

    <div id="zonaJuego">
        <div><?php echo $mensaje ?> </div>
        <div>Letras jugadas: <?php foreach ($letras as $letra) {
                                    echo $letra . ", ";
                                } ?></div>
        <div>Palabra: <?php if (isset($_SESSION['palabra_oculta'])) {
                            echo $palabra_oculta;
                        } ?> Longitud: <?php if (isset($_SESSION['palabra'])) {
                                            echo strlen($palabra);
                                        } ?></div>
        <div id="vidas">VIDAS: <?php for ($aux = 0; $aux < $vidas; $aux++) {
                                ?>
                <img src="./assets/heart-icon_34407.png" width="20" height="20" alt="vida">
            <?php
                                }  ?>

        </div>
        <form action="" method="post">
            <input type="text" name="letra" id="letra">
            <input type="submit" value="Comprobar">
        </form>
        <div>Partidas ganadas: <?php if (isset($_COOKIE['partidas_ganadas'])) {
                                    $partidas_ganadas = $_COOKIE['partidas_ganadas'];
                                    echo $partidas_ganadas;
                                } ?> / Partidas jugadas: <?php if (isset($_COOKIE['partidas_jugadas'])) {
                                                                $partidas_jugadas = $_COOKIE['partidas_jugadas'];
                                                                echo $partidas_jugadas;
                                                            } ?></div>
        <div>Palabra: <?php if (isset($_SESSION['palabra'])) {
                            echo $palabra;
                        } ?></div>
    </div>
    <div id="zonaGrafica">
        <?php
            switch ($vidas) {
                case 6: ?> <img src="./assets/dibujo1.jpg" width="300" height="300" alt="dibujo1"><?php break;
                case 5: ?> <img src="./assets/dibujo2.jpg" width="300" height="300" alt="dibujo2"><?php break;
                case 4: ?> <img src="./assets/dibujo3.jpg" width="300" height="300" alt="dibujo3"><?php break;
                case 3: ?> <img src="./assets/dibujo4.jpg" width="300" height="300" alt="dibujo4"><?php break;
                case 2: ?> <img src="./assets/dibujo5.jpg" width="300" height="300" alt="dibujo5"><?php break;
                case 1: ?> <img src="./assets/dibujo6.jpg" width="300" height="300" alt="dibujo6"><?php break;
                default: break;
                                                                                        }
                                                                                                ?>
    </div>
<?php } ?>

</body>

</html>