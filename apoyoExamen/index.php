<?php
include_once("./cripto.php");
include_once("./cadenas.php");
include_once("./peticiones.php");
include_once("./conceptosPOO.php");
include_once("./excepciones.php");

//Ejercicios y teoría referente a los primeros temas.
/*
Indice:
cripto.php -> ejercicios criptografía datos (hash)
cadenas.php -> ejercicios de cadenas de texto
peticiones.php -> estructura básica de control de peticiones.
*/


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body{
            text-align: center;
        }
        #casoPrueba1{
            margin: 200px;
            padding: 15px;
            border: 1px black;
            border-style: solid;
            display: block;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Utilidades PHP básico:</h3>
    <div id="casoPrueba1">
        <form action="" method="POST">
            <caption>Este formulario realiza un envío POST:</br></br></caption>
            <p>Nombre: <input type="text" name="nombre" id="nombre"></p>
            <input type="submit" value="enviar">
        </form>
    </div>
</body>
</html>