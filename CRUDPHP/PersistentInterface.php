<?php

interface interfazPersistencia{
    

    function guardar($datos);

    function listar();

    function modificar($datos);

    function eliminar($id);

    //function getObbjeto($id);
}