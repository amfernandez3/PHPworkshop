<?php
/**
 * Creamos los import que usaremos
 */
require_once(dirname(__FILE__)."/../modelo/eventoSesiones.php");
require_once(dirname(__FILE__)."/../modelo/eventoMysql.php");
require_once(dirname(__FILE__)."/../modelo/evento.php");
require_once(dirname(__FILE__)."/../modelo/usuario/usuarioSesiones.php");
require_once(dirname(__FILE__)."/../modelo/usuario/usuario.php");
require_once(dirname(__FILE__)."/../modelo/SelectorPersistente.php");
include(dirname(__FILE__).'/../controlador/controlAcceso.php');


/**
 * Declaración de variables
 */
    $mensaje = "";
    $correo = $_SESSION["usuarioLogueadoCorreo"];
    $selector = "";
    $eventos = array();
    $idEvento;
    $idUsuario = 0;
   

    /**
     * Control de datos de formulario -> añadir evento
     */
    if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"]) && isset($_POST["descripcion"])&& isset($_POST["fecha_ini"]) ){
        
        $usuarios = SelectorPersistente::getUsuarioPersistente()::listar();
        foreach ($usuarios as $id => $usuario){
            if($usuario->getCorreo() == $_SESSION["usuarioLogueadoCorreo"]){
                $idUsuario = $usuario->getIdUsuario();

            }
            if($usuario->getRol() == "admin"){
                $_SESSION['usuarioLogueadoRol'] = "admin";
            }
            else{
                $_SESSION['usuarioLogueadoRol'] = "user";
            }
        }


        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $fechaInicio = date('Y/d/m H:i',strtotime($_POST['fecha_ini']));
        if(isset($_POST["fecha_fin"])){
            $fechaFin = date('Y/d/m H:i',strtotime($_POST['fecha_fin']));
        }

        $classEvento = SelectorPersistente::getEventoPersistente();
        $evento = new $classEvento(0,$idUsuario,$nombre,$descripcion,$fechaInicio,$fechaFin);
        $evento->guardar();
    
        $mensaje = "Logueado con la cuenta:" . $correo . " en persistencia: ". $classEvento ;
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
     * Al ser un método abstracto, se realiza la llamada al método con :: y no con ->
     */
    $eventos = SelectorPersistente::getEventoPersistente()::listar();

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <title>Zona personal</title>
</head>
<body>
    <header>
    <button class="btn btn-light"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
    <button class="btn btn-light"><a href="login.php">Login</a></button>
    <button class="btn btn-light"><a href="registro.php">Registro</a></button>
    <?php
    if($_SESSION['usuarioLogueadoRol'] = "admin"){
        ?>
        <button class="btn btn-light"><a href="gestionUsuarios.php">Gestión Usuarios</a></button>
        <?php
    }
    ?>
    <h2> AGENDA EVENTOS---------------------</h2>
    </header>
    <section>
        <p> <?php echo "Hola ".$correo . "tu rol es: ". $_SESSION['usuarioLogueadoRol'].", tus eventos de ". SelectorPersistente::tipoPersistencia() . " son: " ?></p>
    <article id="eventos">
    <!-- Código que gestiona el envío de datos de evento -->
    <form action="" method="post" id="crearEventoForm">
                <label for="nombre" class="help-block">Nombre del evento: </label>
                <input class="input form-control" type="text" name="nombre" id="nombre" required placeholder="Nombre del evento">
                <label for="descripcion" class="help-block">Descripción: </label>
                <input class="input form-control" type="textarea" name="descripcion" id="descripcion" required placeholder="Descripcion">
                <label for="fecha_ini" class="help-block">Fecha inicio evento: </label>
                <input class="input form-control" type="datetime-local" name="fecha_ini" id="fecha_ini" required placeholder="Fecha Inicio">
                <label for="fecha_fin" class="help-block">Fecha fin evento: </label>
                <input class="input form-control" type="datetime-local" name="fecha_fin" id="fecha_fin" placeholder="Fecha Fin">
                <input class="boton btn btn-success" type="submit" value="Crear">
        </form>
        <form action="" method="POST">
                <input class="boton btn btn-warning" type="submit" value="actualizar" name="actualizar">
        </form>
    </article>
    <article id="tablaEventos">
    <table class='table table-bordered table-striped'>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha_inicio</th>
            <th>Fecha_fin</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        <?php
            foreach ($eventos as $id => $evento) {
                 ?>
        <tr>
            <td><?= $evento->getNombre() ?></td>
            <td><?= $evento->getDescripcion() ?></td>
            <td><?= $evento->getFecha_inicio() ?></td>
            <td><?= $evento->getFecha_fin() ?></td>
            <td><a  href="../modelo/funcionesCRUD/modificarEvento.php?id=<?= $evento->getId_evento() ?>"><img src="../assets/icons/edit.png" alt="edit" width="20px" height="20px"></a></td>
            <td><a  href="../modelo/funcionesCRUD/eliminarEvento.php?id=<?= $evento->getId_evento() ?>" onclick="javascript:return confirm('Estás seguro de eliminar el evento?')"><img src="../assets/icons/delete.png" alt="delete" width="20px" height="20px"></a></td>
        </tr>
        <?php }?>
    </table>
    </article>
    </section>
</body>
</html>