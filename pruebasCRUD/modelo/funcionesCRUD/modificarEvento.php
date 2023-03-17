<?php
/**
 * Importamos las dependencias
 */
require_once("../evento.php");
require_once("../selectorPersistencia.php");

/**
 * Iniciamos la sesión si no lo estuviese
 */
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start(); 
}



/**
 * Declaración de variables
 */
$mensaje = "";
$id = $_GET['id'];
$idUsuario = "";
$nombre="";
$descripcion = "";
$fecha_ini="";
$fecha_fin="";

$eventoSeleccionado;

if(isset($_SESSION["eventos"])){
    $eventos = unserialize($_SESSION["eventos"]);
}
else{
    $eventos = array();
    header("../../vista/privado.php");
}


/**
 * Tras deserializar cogemos el evento que nos interesa por id -> eventoSeleccionado()
 */
foreach ($eventos as $key => $evento){
    if($evento->getId_evento() == $id){
        $eventoSeleccionado = $evento;
    }
}

    /**
     * Función que comprueba que si se reciben los datos, estos sobreescriban los previos del evento.
     */
    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        if(!$_POST["nombre"]==""){
            $nombre = ($_POST["nombre"]);
        }
        if(!$_POST["descripcion"]==""){
            $descripcion = ($_POST["descripcion"]);
        }
        else{
            echo "entra";
        }
        if(!$_POST["fecha_ini"]==""){
            $fechaInicio = date('Y/d/m H:i',strtotime($_POST['fecha_ini']));
        }else{
            $fechaInicio = $eventoSeleccionado->getFecha_inicio();
        }
        if(!$_POST["fecha_fin"]==""){
            $fechaFin = date('Y/d/m H:i',strtotime($_POST['fecha_fin']));
        }else{
            $fechaFin = $eventoSeleccionado->getFecha_fin();
        }

        $classEvento = SelectorPersistente::getEventoPersistente();
        $evento = new $classEvento($eventoSeleccionado->getId_evento(),$eventoSeleccionado->getId_usuario(),$nombre,$descripcion,$fechaInicio,$fechaFin);
        $evento->modificar($evento);

                header("../../vista/privado.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css" media="screen" />
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Modificar evento</title>
</head>
<body>
    <div class="modificarEvento">
        <h2>Modificar evento:</h2>
        <form action="" method="post">

            <label for="nombre" class="help-block">Nombre del evento: </label>
            <input class="input form-control" type="text" name="nombre" id="nombre"  value="<?=$eventoSeleccionado->getNombre();?>">
            <label for="descripcion" class="help-block">Descripción: </label>
            <input class="input form-control" type="textarea" name="descripcion" id="descripcion"  value="<?=$eventoSeleccionado->getDescripcion();?>">
            <label for="fecha_ini" class="help-block">Fecha inicio evento: </label>
            <input class="input form-control" type="datetime-local" name="fecha_ini" id="fecha_ini" value="<?=$eventoSeleccionado->getFecha_inicio()?>">
            <label for="fecha_fin" class="help-block">Fecha fin evento: </label>
            <input class="input form-control" type="datetime-local" name="fecha_fin" id="fecha_fin" value="<?=$eventoSeleccionado->getFecha_fin()?>">
            <input class="boton btn btn-success" type="submit" value="Modificar">
 
        </form>
    </div>
    <button class="btn btn-light"><a href="../../vista/privado.php">Volver a la agenda</a></button>
</body>
</html>