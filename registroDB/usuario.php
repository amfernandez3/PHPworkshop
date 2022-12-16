<?php
session_start();
$cadena_conexion = "mysql:dbname=docker_demo;host=docker-mysql";
$usuario = "root";
$password = "root123";
try{
    $bdConection = new PDO($cadena_conexion,$usuario,$password);
    $sql = "select * from usuario where correo ='" .$_POST['correo']."' and password='".$_POST['pass']."'";
    $datos = $bdConection->query($sql);
    $stm = $bdConection->prepare("SELECT correo from usuario where idusuario = ?");
    $stm->execute([1]);
    $_SESSION['nombre'] = $_POST['correo'];
    if(isset($_SESSION['nombre'])){
        header('Location: '."privado.php");
    }
}catch(Exception $e){
    echo "ERROR:".$e->getMessage();

}

?>