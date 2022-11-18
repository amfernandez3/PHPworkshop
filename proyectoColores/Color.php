<?php
class Color{
    // @param id -> define el color del 
    private $id;

    function __construct($id = null){
        
    }

    function getId(){

        return $this->id;
    }

    function compararColores($color){
        if($color->id == $this->id){
            echo "Los id de los colores son : " . $color->id . "y " . $this->id;
            return true;
        }
        else{
            return false;
        }
    }
    
}

?>