<?php
/**
 * Esta interfaz es el esquema de las funciones de persistencia en los 3 tipos de DB
 */

interface interfazPersistencia{
    

     function guardar($datos);

     function listar();

     function modificar($datos);

     function eliminar($id);

}