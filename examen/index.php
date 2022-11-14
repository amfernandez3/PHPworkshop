<?php
session_start();

//Variables
//Crea la constante PALABRA con el array "suerte","GANAR","perder","aprobar"  (1 punto)
const PALABRAS = ["suerte", "GANAR", "perder", "aprobar"];
$palabra = "APROBAR";
$palabra_oculta = "_"; //Tantos guiones como letras tiene $palabra
$letras = [];  // Letras jugadas por el jugador en la partida actual
$vidas = 7; //Vidas de las que dispone el jugador para adivinar la $palabra
$mensaje = null;  //Mensajes a mostrar el jugador: letra repetida, ha gando, ha perdido, ...
$partidas_jugadas = 0;  //Partidas totales jugadas por el jugador
$partidas_ganadas = 0; //Partidas ganadas por el jugador

//Código que necesites incluir y no este definido --> (0,25 puntos)
$posiciones;
$ganar = false;
$letra;
$partidaTerminada = false;
//-------
//Funciones necesarias para desarrollar el juego
/**
 * posiscionesLetra
 * Función que devuelve las posiciones de la "letra" enviada en la palabra a adivinar
 * (2 puntos)
 * @param  mixed $palabra palabra que se ha de acertar
 * @param  mixed $letra letra enviada por el jugador
 * @return mixed Devuelve "false" si no se encuentra la letra en la palabra,
 *               en otro caso devuelve un "array" con las posiciones de esta
 */
function posicionesLetra($palabra, $letra)
{
    //Controla que la letra se encuentre en la palabra
    if (strpos($palabra, $letra) !== false) {
        $posiciones = [];
        for ($contador = 0; $contador < strlen($palabra); $contador++) {
            if ($letra == $palabra[$contador]) {
                array_push($posiciones, $contador);
            }
        }
        //var_dump($posiciones);  
        return $posiciones;
    } else {
        return false;
    }
}




//
/**
 * colocarletras
 *  Función que coloca la letra en sus posiciones en la palabra oculta
 *      ej:)    palabra a adivinar "SOL" letra= "O" palabra_oculta="___" return "_O_"
 * (1 punto)
 * @param  mixed $palabra_oculta  palabra que contiene guiones y que serán sustituidos en esta función
 * @param  mixed $posiciones posiciones donde se encuentra la letra en la palabra a adivinar
 * @param  mixed $letra letra a colocar en la palabra
 * @return string palabra oculta con la letra en sus posiciones
 */

function colocarLetras(&$palabra_oculta, $posiciones, $letra)
{

    if (!is_array($palabra_oculta)) str_split($palabra_oculta);
    for ($contador = 0; $contador < count($posiciones); $contador++) {
        $palabra_oculta[$posiciones[$contador]] = $letra;
    }
    if (is_array($palabra_oculta)) implode(",", $palabra_oculta);
    $_SESSION['palabra_oculta'] = $palabra_oculta;
    return $palabra_oculta;
}






/**
 * cargarestadojuego
 *  Carga los datos del juego necesarios de la anterior jugada
 * (1 punto)
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @param  mixed $partidas_jugadas número de partidas jugadas por el jugador
 * @param  mixed $partidas_ganadas número de partidas ganadas por el jugador
 * @return void
 */
function cargarEstadoJuego(&$palabra, &$palabra_oculta, &$letras, &$vidas, &$partidas_jugadas, &$partidas_ganadas)
{
    if (isset($_SESSION['palabra'])) {
        $palabra = $_SESSION['palabra'];
    }
    if (isset($_SESSION['palabra_oculta'])) {
        $palabra_oculta = $_SESSION['palabra_oculta'];
    }
    if (isset($_SESSION['letras'])) {
        $letras = $_SESSION['letras'];
    }
    if (isset($_SESSION['vidas'])) {
        $vidas = $_SESSION['vidas'];
    }
    if (isset($_COOKIE['partidas_jugadas'])) {
        $partidas_jugadas = $_COOKIE['partidas_jugadas'];
    }

    if (isset($_COOKIE['partidas_ganadas'])) {
        $partidas_ganadas = $_COOKIE['partidas_ganadas'];
    }
}

/**
 * iniciarjuego
 * (1 punto)
 * obtiene la $palabra al azar del array PALABRAS
 * crea la palabra_oculta a partir de la palabra generada al azar
 * inicializa el array de $letras jugadas en la partida
 * inicializa el numero de $vidas a 7
 *
 * En caso de ganar o perder una partida actualiza el número de partidas jugadas y ganadas
 * los parametros $ganar, $partidas_jugadas y $partidas_ganadas son opcionales, en caso de no ser
 * necesarios su valor por defecto será null
 *
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @param  mixed $ganar [default null] Permite indicar si se ha ganado o perdio una partida (true, false)
 * @param  mixed $partidas_jugadas [default null] número de partidas jugadas por el jugador
 * @param  mixed $partidas_ganadas [default null] número de partidas ganadas por el jugador
 * @return void
 */

function iniciarJuego(&$palabra, &$palabra_oculta, &$letras, &$vidas, &$ganar = NULL, &$partidas_jugadas = NULL, &$partidas_ganadas = NULL)
{
    //Si no existe cookie del juego:
    if (!isset($_SESSION['palabra'])) {
        $palabra = PALABRAS[rand(0, count(PALABRAS) - 1)];
        $palabra = strtoupper($palabra);
    } else {
        //Definición de palabra
        $palabra =  $_SESSION['palabra'];
    }
    //Definición de palabra_oculta : tamaño de $palabra * _
    for ($contador = 0; $contador != strlen($palabra); $contador++) {
        $palabra_oculta[$contador] = "_";
    }
    //Definición de letras 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['letra'])) {
        $_SESSION['letras'] = $letras;
    }
    //Definición de vidas
    if (!isset($_SESSION['vidas'])) {
        $_SESSION['vidas'] = ++$vidas;
    } else {
        $vidas = $_SESSION['vidas'];
    }
    //Definición de partidas jugadas
    /*
    Partidas jugadas: declaradas en esta función:
    Si existe la variable en cookies, se asigna su valor a global $partidas_jugadas
    Si no existe, se crea la variable cookie 'partidas_jugadas' con el valor de la variable global.
    Una vez concluída la partida ($partidaTerminada = true) se aumenta su valor.
    */
    if (isset($_COOKIE['partidas_jugadas'])) {
        $partidas_jugadas = $_COOKIE['partidas_jugadas'];
    } else {
        setcookie('partidas_jugadas', $partidas_jugadas, time() + 3600 * 24 * 30);
    }
    //Definición de partidas ganadas (Igual a partidas_jugadas pero dependiente del valor de $ganar)
    if (isset($_COOKIE['partidas_ganadas'])) {
        $partidas_ganadas = $_COOKIE['partidas_ganadas'];
    } else {
        setcookie('partidas_ganadas', $partidas_ganadas, time() + 3600 * 24 * 30);
    }
}







/**
 * guardarestadojuego
 *
 * Guarda el estado de la partida para que se pueda continuar el juego en la próxima llamada a la página
 * (0,5 puntos)
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta  palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @return void
 */
function guardarEstadoJuego($palabra, $palabra_oculta, $letras, $vidas)
{
    $_SESSION['palabra'] =  $palabra;
    $_SESSION['palabra_oculta'] =  $palabra_oculta;
    $_SESSION['letras'] =  $letras;
    $_SESSION['vidas'] =  $vidas;
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