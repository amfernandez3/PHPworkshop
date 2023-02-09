<?php
require_once("./Usuario.php");
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if (isset($_POST['nombre']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
        $evento1 = new Evento();
        if($_POST['correo'] == "alejandro@gmail.com" && $_POST['password'] == "abc123."){
            echo "Añadido!";
        }
        else{
            echo "False" . " " . $_POST['nombre'] ." ". $_POST['fecha_inicio'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto de una agenda</title>
</head>
<body>
    <section>
        <article>
            <h3>Formulario evento</h3>
            <form action="" method="POST">
                <label for="id_evento">Id evento</label>
                <input type="number" name="id_evento">
                <label for="nombreEvento">Nombre del evento</label>
                <input type="text" name="nombreEvento">
                <input type="submit" value="login">
                <label for="fecha_inicio">Fecha inicio</label>
                <input type="date" name="fecha_inicio">
                <label for="fecha_fin">Fecha fin</label>
                <input type="date" name="fecha_fin">
                <label for="correo">ID usuario</label>
                <input type="text" name="id_usuario">
                <input type="submit" value="registrar">
            </form>
        </article>
    </section>
</body>
</html>