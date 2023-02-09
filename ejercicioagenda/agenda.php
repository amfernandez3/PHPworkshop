<?php

//Si la sesión no existe se crea
require_once("eventos.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
    
}
//Deserializamos la estructura de datos de eventos:

$eventos = unserialize($_SESSION['eventos']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css" media="screen" />
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>id_evento</td>
            <td>nombre</td>
            <td>fecha_inicio</td>
            <td>fecha_fin</td>
            <td>id_usuario</td>
        </tr>
        <?php
            foreach ($eventos as $id => $evento) {
                 ?>
        <tr>
            <td><?= $evento->getId_evento() ?></td>
            <td><?= $evento->getNombre() ?></td>
            <td><?= $evento->getFecha_inicio()->format("d-m-Y T H:i ") ?></td>
            <td><?= $evento->getFecha_fin()->format("d-m-Y T H:i ") ?></td>
            <td><?= $evento->getId_usuario() ?></td>
            <td><a  href="EditarEvento.php?id=<?= $id?>">Editar</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>