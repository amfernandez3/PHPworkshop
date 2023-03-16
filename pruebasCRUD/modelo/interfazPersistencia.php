<?php
/**
 * Esta interfaz es el esquema de las funciones de persistencia en los 3 tipos de DB
 */

interface interfazPersistencia{
    

     function guardar();

    static function listar();

     function modificar($datos);

     static function eliminar($id);

}