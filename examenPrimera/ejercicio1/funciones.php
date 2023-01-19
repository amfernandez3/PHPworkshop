<?php
session_start();
$mensaje = "";


//Función que validará los datos y definirá el tipo de entrada.
function comprobarValidezEntrada($entrada)
{
    $tipoEntrada = 0;
    try {
        $entradas = explode(",", $entrada);
        /* echo $entradas[0]; // parte1
        echo $entradas[1]; // parte2 */
    } catch (Exception $e) {
        echo 'Datos introducidos no válidos: ',  $e->getMessage(), "\n";
    }
    switch (count($entradas)) {
        case 0:
            echo "case 0";
            $tipoEntrada = 0;
            break;
        case 1:
            if (!is_numeric($entradas[0])) {
                throw new Exception('Debes introducir datos numéricos.');
            } else {
                $tipoEntrada = 1;
            }
            break;
        case 2:
            if (!is_numeric($entradas[0]) || !is_numeric($entradas[0])) {
                throw new Exception('Debes introducir datos numéricos.');
            } else {
                $tipoEntrada = 2;
            }
            break;
        default:
    }
    return $entradas;
}

//Función que rellena los datos
function generarDatos($entradas)
{
    if (isset($entradas[0])) {
        switch (count($entradas)) {
            case 0:
                for ($i = 0; $i<8; $i++) {
                    echo"</br>";
                    for ($j = 0; $j<8; $j++) {
                        generarDNI();
                        echo "     | ";
                    }
                }
                break;
            case 1:
                for ($i = 0; $i<$entradas[0]; $i++) {
                    echo"</br>";
                    for ($j = 0; $j<$entradas[0]; $j++) {
                        generarDNI();
                        echo "     | ";
                    }
                }
                break;
            case 2:
                for ($i = 0; $i<$entradas[0]; $i++) {
                    echo"</br>";
                    for ($j = 0; $j<$entradas[1]; $j++) {
                        generarDNI();
                        echo "     | ";
                    }
                }
                break;
            default:

                echo "Has introducido más datos de los solicitados";
        }
    } else {
        for ($i = 0; $i<8; $i++) {
            echo"</br>";
            for ($j = 0; $j<8; $j++) {
                generarDNI();
                echo "     | ";
            }
        }
    }
}

//Función para generar los DNI aleatorios
function generarDNI()
{
    $cadena = 0;
    $letraNif = "";
    $letrasVocales = ["A","E","I","O","U"];
    $cadena = rand(0000000, 99999999);
    $letraNif= substr("TRWAGMYFPDXBNJZSQVHLCKEO", $cadena % 23, 1);

    //Función que modifique DNI por vocal
   /*  if (in_array($letraNif, $letrasVocales)) {
        $numerosDNI=array();

        for ($i=0;$i<=strlen($cadena);$i++) {
            $numerosDNI[$i]=$cadena[$i];
        }

        for($i =0; $i<8;$i++){
            $cadena .= max($numerosDNI);
        }
    }
    echo "<b>".$cadena.$letraNif."</b>"; */

    echo $cadena.$letraNif;
}

function guardarSesion($datos){
    $_SESSION["entrada"] = $datos;
}

function cargarSesion(){
    return $_SESSION["entrada"];
}