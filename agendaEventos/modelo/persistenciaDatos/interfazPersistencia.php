<?php
//Esta interfaz define la estructura y funcionamiento de los tres tipos de persistencia de datos de la aplicación que la implementarán
interface interfazPersistencia{
    

    function guardar($datos);

    function listar();

    function modificar($datos);

    function eliminar($id);

}