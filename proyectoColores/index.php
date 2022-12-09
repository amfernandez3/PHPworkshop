<?php
require_once("Controlador.php");
    $partidaGanada = false;
    //Entra y reinicia la partida si se ganó (si ganarPartida == true)
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reiniciar'])){
        session_destroy();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['color1']) && isset($_POST['color2']) && isset($_POST['color3']) && isset($_POST['color4'])) {
        /* $color1 = new Color($_POST['color1']);
        $color2 = new Color($_POST['color2']);
        $color3 = new Color($_POST['color3']);
        $color4 = new Color($_POST['color4']); */
        
        
        $filaEntrada = new Fila(new Color($_POST['color1']), new Color($_POST['color2']), new Color($_POST['color3']), new Color($_POST['color4']));
        $controlador1 = new Controlador();
        $controlador1->tratarDatosEntrada($filaEntrada);
        $controlador1->guardarEstado();
        $partidaGanada = $controlador1->getTablero()->getPartidaGanada();
    } else {
        //Error en el envío POST
    }


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .resultado {
            border: solid 1px black;
            padding: 10px;
            height: 200px;
            text-align: center;
        }

        .formularioEnvio {
            border: solid 1px black;
            padding: 10px;
        }

        .formularioEnvio>select {
            padding: 5px;
        }

        .infoJuego {
            border: solid 1px black;
            padding: 10px;
        }

        .tabla {
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            align-items: center;
            flex-direction: column;
            margin: 10px;
            margin-top: 10px;
            justify-items: space-around;
        }
        .captioFin{
            text-align: center;
        }


        td {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            border: solid 1px black;
            width: 50px;
            height: 50px;
        }
        .reinicio{
            padding: 5px;
            margin: 10px;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <section>
        <div class="resultado">
            <caption>ACERTADAS:</caption>
            <table class="tabla">
                <tr>
                    <?php
                    if (isset($controlador1)) {
                        foreach ($controlador1->getTablero()->getFilaGanadoraActual() as $clave => $valor) {
                    ?>
                            <td style="background-color:<?php echo $valor; ?>"></td>
                        <?php
                        }
                    } else { ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
            <caption>HAS INTRODUCIDO:</caption>
            <table class="tabla">
                <tr>
                    <?php
                    if (isset($controlador1)) {
                        foreach ($filaEntrada->getColores() as $clave => $valor) {
                    ?>
                            <td style="background-color:<?php echo $valor; ?>"></td>
                        <?php
                        }
                    } else { ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
        </div>

        <?php if($partidaGanada == false ){ 
        ?>
        <div class="formularioEnvio">
            <form action="" method="POST">
                <select name="color1" id="color1">
                <option value="white" selected="selected">Color:</option>
                    <option value="red">Rojo</option>
                    <option value="green">Verde</option>
                    <option value="blue">azul</option>
                    <option value="yellow">amarillo</option>
                    <option value="purple">Violeta</option>
                    <option value="orange">Naranja</option>
                </select>
                <select name="color2" id="color2">
                <option value="white" selected="selected">Color:</option>
                    <option value="red">Rojo</option>
                    <option value="green">Verde</option>
                    <option value="blue">azul</option>
                    <option value="yellow">amarillo</option>
                    <option value="purple">Violeta</option>
                    <option value="orange">Naranja</option>
                </select>
                <select name="color3" id="color3">
                <option value="white" selected="selected">Color:</option>
                    <option value="red">Rojo</option>
                    <option value="green">Verde</option>
                    <option value="blue">azul</option>
                    <option value="yellow">amarillo</option>
                    <option value="purple">Violeta</option>
                    <option value="orange">Naranja</option>
                </select>
                <select name="color4" id="color4">
                <option value="white" selected="selected">Color:</option>
                    <option value="red">Rojo</option>
                    <option value="green">Verde</option>
                    <option value="blue">azul</option>
                    <option value="yellow">amarillo</option>
                    <option value="purple">Violeta</option>
                    <option value="orange">Naranja</option>
                </select>
                <input type="submit" value="Comprobar">
            </form>
            <?php }
            else{ ?>
                
                <caption class="captionFin">HAS GANADO</caption>
                <form action="" method="POST" class="reinicio">
                    <input type="submit" value="reiniciar" name="reiniciar">
                </form>
            <?php
            }
            ?>
        </div>
        <div class="infoJuego">
            <p>Intentos: <?php if(isset($_SESSION["tablero"]) && isset($controlador1)){ echo $controlador1->getTablero()->getNumeroIntentos();}else {echo 0;}?></p>
        </div>
        <div class="infoJuego">
        <table class="tabla">
            <caption>Pista (colores presentes):</caption>
                <tr>
                    <?php
if (isset($controlador1)) {
    if ($controlador1->getTablero()->getFilaColoresPresentes() != null) {
        foreach ($controlador1->getTablero()->getFilaColoresPresentes() as $clave => $valor) {
            ?>
                            <td style="background-color:<?php echo $valor; ?>"></td>
                        <?php
        }
    } else { ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php
    }
}
                    ?>
                </tr>
            </table>
        </div>
    </section>

</body>

</html>