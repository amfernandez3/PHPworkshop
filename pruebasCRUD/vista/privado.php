<?php
/**
 * Creamos los import que usaremos
 */
require_once("../modelo/eventoSesiones.php");
require_once("../modelo/evento.php");
require_once("../modelo/usuarioSesiones.php");
require_once("../modelo/usuario.php");
include('../controlador/controlAcceso.php');

/**
 * Declaración de variables
 */
    $mensaje = "";
    $correo = $_SESSION["usuarioLogueadoCorreo"];
    $eventos = array();
    $idEvento;
    $idUsuario;

   

    /**
     * Control de datos de formulario -> añadir evento
     */
    if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"]) && isset($_POST["descripcion"])&& isset($_POST["fecha_ini"]) ){
         /**
     * Control de id de evento y usuario
     */
    if(isset($_SESSION["eventos"])){
        $idEvento = count(unserialize($_SESSION["eventos"]));
    }
    else{
        $idEvento = 0;
    }

    $idUsuario = usuarioSesiones::encontrarID($correo);

        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $fechaInicio = date('Y/d/m H:i',strtotime($_POST['fecha_ini']));
        if(isset($_POST["fecha_fin"])){
            $fechaFin = date('Y/d/m H:i',strtotime($_POST['fecha_fin']));
        }
        $evento = new eventoSesiones($idEvento,$idUsuario,$nombre,$descripcion,$fechaInicio,$fechaFin);
        eventoSesiones::guardarEvento($evento);
        $mensaje = "El evento se creó con éxito.";
    }
    /**
     * Gestión del borrado de los eventos : cuando se envía el boton de borrado
     */
    elseif($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["borrarEventos"])){
        if(isset($_SESSION["eventos"])){
            eventoSesiones::borrarEventos();
        }
    }
    /**
     * Salida de error:
     */
    else{
        
    }
    $eventos = eventoSesiones::listarEventos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Zona personal</title>
</head>
<body>
    <section>
    <?php include('../controlador/controlAcceso.php'); ?>
    <!-- <p><?=$mensaje ?> </p> -->
    <p>Logueado con la cuenta: <?=$correo ?> </p>
    <!-- <p>Usuarios registrados: <?= '<pre>'; print_r(unserialize($_SESSION["usuarios"])); echo '</pre>';?> </p> -->
    <button><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
    <button><a href="login.php">Login</a></button>
    <button><a href="registro.php">Registro</a></button>
    <article id="eventos">
    <!-- Código que gestiona el envío de datos de evento -->
    <form action="" method="post" id="crearEventoForm">
        <caption>Añadir evento: </caption>
                <input class="input" type="text" name="nombre" id="nombre" required placeholder="Nombre del evento">
                <input class="input" type="text" name="descripcion" id="descripcion" required placeholder="Descripcion">
                <input class="input" type="datetime-local" name="fecha_ini" id="fecha_ini" required placeholder="Fecha Inicio">
                <input class="input" type="datetime-local" name="fecha_fin" id="fecha_fin" placeholder="Fecha Fin">
                <!-- <select class="sistemaguardar" name="sistemaguardar" required>
                    <option value="0">Sesiones</option>
                    <option value="1">MySQL</option>
                    <option value="2">MongoDB</option>
                </select> -->
                <input class="boton" type="submit" value="Crear">
        </form>
        <form action="" method="POST">
        <input class="boton" type="submit" value="Borrar Eventos" name="borrarEventos">
                <input class="boton" type="submit" value="actualizar" name="actualizar">
        </form>
    </article>
    <article id="tablaEventos">
    <table class="table">
        <tr>
            <td>nombre</td>
            <td>descripcion</td>
            <td>fecha_inicio</td>
            <td>fecha_fin</td>
            <td>Modificar</td>
            <td>Eliminar</td>
        </tr>
        <?php
         foreach ($eventos as $evento) {
                 ?>
        <tr>
            <td><?= $evento->getNombre() ?></td>
            <td><?= $evento->getDescripcion() ?></td>
            <td><?= $evento->getFecha_inicio() ?></td>
            <td><?= $evento->getFecha_fin() ?></td>
            <td><a  href="modifEvento.php?id=<?= $evento->getId_evento() ?>">Modificar evento</a></td>
            <td><a  href="eliminar.php?id=<?= $evento->getId_evento() ?>" onclick="javascript:return confirm('Estás seguro de eliminar el evento?')">Eliminar evento</a></td>
        </tr>
        <?php }?>
    </table>
    </article>
    </section>
</body>
</html>