<?php
$arr = [10,20,['2',3,7,8],40];
recorrerArray($arr);


function recorrerArray($arr) {

    //print_r($arr);
    foreach($arr as $value) {
        if(is_array($value)){
            
            foreach($value as $value2){
                print($value);
            }
        }
        else{
            print($value);
        }
      } 
}
?>