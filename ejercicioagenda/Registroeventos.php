<?php
require_once("Evento.php");
$mensaje = "";
if(!isset($_SESSION)) 
{ 
    session_start(); 
    
} 

$eventos = [];
if(isset($_SESSION['eventos'])){
    $eventos =  unserialize($_SESSION['eventos']);
}

if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"])&& isset($_POST["fecha_ini"])&& isset($_POST["fecha_fin"]) ) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $fecha_ini = $_POST["fecha_ini"];
    $fecha_fin = $_POST["fecha_fin"];
    
        $eventos[] = new Evento($id,$nombre,new DateTime($fecha_ini),new DateTime($fecha_fin),$_SESSION["usuario"]["idUsuario"]);
            $_SESSION['eventos'] =  serialize($eventos);


    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>
<div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">
                        <h1 class="page-title">Agenda de eventos</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mensaje"><?=$mensaje?></div>

    <div class="AñadirEvento">
        <section>
        <button id="buttonAct" class="btn btn-success pull-right">CREAR EVENTO</button>
            <article class="form-group formulario" id="formEventos">
            <form action="" method="post">
            <caption>CREAR EVENTO:</caption></br>
            <label for="id" class="help-block">ID:</label>
                <input type="text" name="id" id="id" required class="form-control">
               
                <label for="nombre" class="help-block">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required class="form-control">
             
                <label for="fecha_ini" class="help-block">Inicio:</label>
                <input type="datetime-local" name="fecha_ini" id="fecha_ini" required class="form-control">
               
                <label for="fecha_fin" class="help-block">Fin:</label>
                <input type="datetime-local" name="fecha_fin" id="fecha_fin" required class="form-control">
                </br>
                <input class="btn btn-success pull-right" type="submit" value="Añadir evento">    
        </form>
            </article>
        </section>
        
    </div>
    <script src="./desplegable.js"></script>
</body>
</html>