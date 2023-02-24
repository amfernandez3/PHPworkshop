<?php

//Si la sesión no existe se crea
require_once("Registroeventos.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
    
}
if(isset($_SESSION['eventos'])){
}
else{
    //Deserializamos la estructura de datos de eventos:
    //$eventos = unserialize($_SESSION['eventos']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>Document</title>
</head>
<body>
    <table class='table table-bordered table-striped'>
        <tr>
            <td>id_evento</td>
            <td>nombre</td>
            <td>fecha_inicio</td>
            <td>fecha_fin</td>
            <td>id_usuario</td>
            <td>Acciones</td>
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
            <td><a  href="EditarEvento.php?id=<?= $id?>"><img src="./assets/icons/edit.png" alt="edit" width="20px" height="20px"></a><a  href="DeleteEvento.php?id=<?= $id?>"><img src="./assets/icons/delete.png" alt="delete" width="20px" height="20px"></a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>