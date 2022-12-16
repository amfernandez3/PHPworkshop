<?php
$cadena_conexion = "mysql:dbname=docker_demo;host=docker-mysql";
$usuario = "root";
$password = "root123";
try{
    $bdConection = new PDO($cadena_conexion,$usuario,$password);
    $sql = "select * from usuario";
    $datos = $bdConection->query($sql);
    echo "Total usuarios en la base : <br>" . $datos->rowCount();
    foreach($datos as $usu){
        echo $usu['nombre']."   ";
        echo $usu['apellidos']."<br>";
        
    }

    echo "------------------------------<br>";
    $stm = $bdConection->prepare("SELECT * from usuario where idusuario = ?");
    $stm->execute([1]);
    foreach($stm as $d){
        echo $d["nombre"].", ";
        echo $d["apellidos"]."<br>";
    }
}catch(Exception $e){
    echo "ERROR:".$e->getMessage();

}

?>