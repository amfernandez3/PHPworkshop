<?php

//Método comprobación de acceso por método
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //TODO: eliminar salidas por pantalla innecesarias.

    if (!empty($_POST['Nombre']) && !empty($_POST['Apellidos']) && !empty($_POST['Sexo']) && !empty($_POST['NIF'])) {
        require_once("./Alumno.php");
        $alumno = new Alumno($_POST['Nombre'], $_POST['Apellidos'], $_POST['NIF'], $_POST['Sexo']);

        //Flag que indica que se ha completado la instancia de alumno
        $alumnoFlag = true;
    } else {
        //Indica si existe algún error
        $alumnoFlag = false;
        $errorAlumno = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            text-align: center;

        }

        .card {
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
            text-align: center;
            padding-top: 30px;
        }
        .ocultar{
            <?php 
            
                if(isset($alumnoFlag) && $alumnoFlag && $alumno->getNif()->getEsValido() == true){
                    echo "display:none";
                }
            ?>
            
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h3 class="card text-primary">REGISTRO DE ALUMNOS</h3>
    <?php //Si existe un alumno y es correcto 
    if (isset($alumnoFlag) && $alumnoFlag) {
        if ($alumno->getNif()->getEsValido() == false) {
            echo "Introduce un NIF correcto.";
        } else {
            echo $alumno->__toString();
        }
    } elseif (isset($alumnoFlag) && !$alumnoFlag) {
        echo "Faltan datos, rellena todos los campos.";
    } elseif (isset($errorAlumno) && $errorAlumno) {
        //Este supuesto V
        echo "Faltan datos, rellena todos los campos.";
    }
    ?>
    <div class="text-primary">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="card ocultar">
            <p>
                <input type="text" name="Nombre" placeholder="Nombre" class="text-primary" value="<?php if(!empty($_POST['Nombre'])) echo $_POST['Nombre']; ?>">
            </p>
            <p>
                <input type="text" name="Apellidos" placeholder="Apellidos" class="text-primary" value="<?php if(!empty($_POST['Apellidos'])) echo $_POST['Apellidos']; ?>">
            </p>
            <p>
                <input type="text" name="NIF" placeholder="NIF" class="text-primary" value="<?php if(!empty($_POST['NIF'])) echo $_POST['NIF']; ?>">
            </p>
            <p>SEXO:
                <select class="text-primary" name="Sexo" id="Sexo">
                    <option value="">Selecciona:</option>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
            </p>
            <p>
                <input class="btn btn-success" type="submit" name="submit" value="Registrar">
            </p>
        </form>
    </div>
</body>

</html>