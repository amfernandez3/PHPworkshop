<?php
class ahorcado{
const PALABRAS = ["suerte", "GANAR", "perder", "aprobar"];
private $palabra = "APROBAR";
private $palabra_oculta = "_"; //Tantos guiones como letras tiene $palabra
private $letras = [];  // Letras jugadas por el jugador en la partida actual
private $vidas = 7; //Vidas de las que dispone el jugador para adivinar la $palabra

//Código que necesites incluir y no este definido --> (0,25 puntos)
private $posiciones;
private $ganar = false;
private $letra;
private $partidaTerminada = false;

function __construct($palabra, $palabra_oculta, $letras, $vidas)
{
    iniciarJuego($palabra, $palabra_oculta, $letras, $vidas);
    $this->palabra = $palabra;
    $this->palabra_oculta = $palabra_oculta;
    $this->letras = $letras;
    $this->vidas = $vidas;
    $this->palabra = $palabra;

}

function iniciarJuego(&$palabra, &$palabra_oculta, &$letras, &$vidas)
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
 
   
}

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

}

?>