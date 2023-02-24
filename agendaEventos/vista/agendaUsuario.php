<?php
/**
 * Esta página es el centro de la aplicación, una vez logueado (y con sesión activa), el usuario accede a su espacio
 * Aquí puede elegir con qué sistema de persistencia interactuar.
 */

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda usuario</title>
</head>
<body>
    <p>Zona privada del usuario: <?php echo $_SESSION["correo"] ?></p>
    <p>¿Qué datos quieres ver?</p>
    <form action="" method="post">
                <select class="sistemaguardar" name="sistemaguardar" required>
                    <option value="0">Sesiones</option>
                    <option value="1">MongoDB</option>
                    <option value="2">MySQL</option>
                </select>
                <input class="boton" type="submit" value="Ver">    
    </form>
    </br>
    <!--Formulario que redirige al cierre de sesion-->
    <form action='../controlador/desconectar.php'>
    <input type="submit" name="desconectar" value="Desconectar"/>
    </form>

    <a href="../controlador/desconectar.php">Desconectar (a)</a>
</body>
</html>