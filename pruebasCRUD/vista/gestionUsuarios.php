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

$usuarios = array();

if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();  
} 
        //Creación del usuario
        if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"]) && isset($_POST["correo"])&& isset($_POST["password"]) ){
            $correo = $_POST["correo"];
            $password = $_POST["password"];
            $nombre = $_POST["nombre"];

            $usuarios = SelectorPersistente::getUsuarioPersistente()::listar();
            $classUsuario = SelectorPersistente::getUsuarioPersistente();
            $usuario = new $classUsuario(0,$nombre,$correo,"user",$password,false);
            $usuario->guardar();
        }
        
        $usuarios = SelectorPersistente::getUsuarioPersistente()::listar();
        
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
    <title>Gestión de usuarios</title>
</head>
<body>
    <header>
    <button class="btn btn-light"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
    <button class="btn btn-light"><a href="login.php">Login</a></button>
    <button class="btn btn-light"><a href="registro.php">Registro</a></button>
    <button class="btn btn-light"><a href="privado.php">Eventos</a></button>
    <h2> AGENDA USUARIOS---------------------</h2>
    </header>
    <section>
        <p> <?php echo "Hola ".$_SESSION["usuarioLogueadoCorreo"] . ", los usuarios de ". SelectorPersistente::tipoPersistencia() . " son: " ?></p>
    <article id="usuarios">
    <!-- Código que gestiona el envío de datos de evento -->
    <form action="" method="post" id="crearUsuarioForm">
                <label for="nombre" class="help-block">Nombre del usuario: </label>
                <input class="input form-control" type="text" name="nombre" id="nombre" required placeholder="Nombre">
                <label for="correo" class="help-block">correo: </label>
                <input class="input form-control" type="email" name="correo" id="correo" required placeholder="Correo">
                <label for="password" class="help-block">contraseña: </label>
                <input class="input form-control" type="password" name="password" id="password" required placeholder="password">
                <label for="confirmPassword" class="help-block">Confirmar contraseña: </label>
                <input class="input form-control" type="password" name="confirmPassword" id="confirmPassword" required placeholder="password">
                <input class="boton btn btn-success" type="submit" value="Crear">
        </form>
        <form action="" method="POST">
                <input class="boton btn btn-warning" type="submit" value="actualizar" name="actualizar">
        </form>
    </article>
    <article id="tablaUsuarios">
    <table class='table table-bordered table-striped'>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>ID</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        <?php
foreach ($usuarios as $id => $usuario) {
    ?>
        <tr>
            <td><?= $usuario->getNombre() ?></td>
            <td><?= $usuario->getCorreo() ?></td>
            <td><?= $usuario->getRol() ?></td>
            <td><?= $usuario->getIdUsuario() ?></td>
            <td><a href="../modelo/funcionesCRUD/modificarUsuario.php?id=<?= $usuario->getIdUsuario() ?>"><img src="../assets/icons/edit.png" alt="edit" width="20px" height="20px"></a></td>
            <td><a href="../modelo/funcionesCRUD/eliminarUsuario.php?id=<?= $usuario->getIdUsuario() ?>" onclick="javascript:return confirm('Estás seguro de eliminar el evento?')"><img src="../assets/icons/delete.png" alt="delete" width="20px" height="20px"></a></td>
            </tr>
        <?php }?>
    </table>
    </article>
    </section>
    <script src="../assets/js/funciones.js"></script>
</body>
</html>