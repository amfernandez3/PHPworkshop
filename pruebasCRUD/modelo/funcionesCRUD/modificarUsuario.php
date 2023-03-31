<?php
/**
 * Importamos las dependencias
 */
require_once(dirname(__FILE__)."/../usuario/usuario.php");
require_once(dirname(__FILE__)."/../SelectorPersistente.php");

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
$nombre="";
$correo = "";
$rol="";
$password="";

$usuarioSeleccionado;

if(isset($_SESSION["usuarios"])){
    $usuarios = unserialize($_SESSION["usuarios"]);
}
else{
    $usuarios = array();
    header(dirname(__FILE__)."/../vista/privado.php");
}


/**
 * Tras deserializar cogemos el evento que nos interesa por id -> eventoSeleccionado()
 */
foreach ($usuarios as $key => $usuario){
    if($usuario->getIdUsuario() == $id){
        $usuarioSeleccionado = $usuario;
    }
}

    /**
     * Función que comprueba que si se reciben los datos, estos sobreescriban los previos del evento.
     */
    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        if(!$_POST["nombre"]==""){
            $nombre = ($_POST["nombre"]);
        }
        if(!$_POST["correo"]==""){
            $correo = ($_POST["correo"]);
        }
        if(!$_POST["password"]==""){
            $password = ($_POST["password"]);
        }
        if($_POST["rol"]!=""){
            $rol = ($_POST["rol"]);
        }
       

        $classUsuario = SelectorPersistente::getUsuarioPersistente();
        $usuario = new $classUsuario($usuarioSeleccionado->getIdUsuario(),$nombre,$correo,$rol,$password,false);
        $usuario->modificar();

        header("Location: ../../vista/gestionUsuarios.php");
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
    <title>Modificar usuario</title>
</head>
<body>
    <div class="modificarUsuario">
        <h2>Modificar usuario:</h2>
        <form action="" method="post" id="crearUsuarioForm">
                <label for="nombre" class="help-block">Nombre del usuario: </label>
                <input class="input form-control" type="text" name="nombre" id="nombre" required placeholder="Nombre" value="<?=$usuarioSeleccionado->getNombre();?>">
                <label for="correo" class="help-block">correo: </label>
                <input class="input form-control" type="email" name="correo" id="correo" required placeholder="Correo" value="<?=$usuarioSeleccionado->getCorreo();?>">
                <label for="password" class="help-block">contraseña: </label>
                <input class="input form-control" type="password" name="password" id="password" required placeholder="password" value="<?=$usuarioSeleccionado->getPassword();?>">
                <label for="confirmPassword" class="help-block">Confirmar contraseña: </label>
                <input class="input form-control" type="password" name="confirmPassword" id="confirmPassword" required placeholder="password" value="<?=$usuarioSeleccionado->getPassword();?>">
                <label for="rol" class="help-block">Rol (admin o user): </label>
                <input class="input form-control" type="text" name="rol" id="rol" required placeholder="Rol" value="<?=$usuarioSeleccionado->getRol();?>">
               
                <input class="boton btn btn-success" type="submit" value="Modificar">
        </form>
    </div>
    <button class="btn btn-light"><a href="../../vista/gestionUsuarios.php">Cancelar</a></button>
    <script src="../../assets/js/funciones.js"></script>
</body>
</html>