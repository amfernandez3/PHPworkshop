<?php 

      function calculador($operacion, $numa, $numb){
        $resul = $operacion($numa,$numb);
      }

      function suma($a, $b){
        return $a + $b;
      }

      function resta($numa, $numb){
        return $numa - $numb;
      }

      $a = 6;
      $b = 3;
      $r1 = calculador("suma", $a, $b);
      //var_dump($r1);
      echo $r1 . "\n";

  ?>