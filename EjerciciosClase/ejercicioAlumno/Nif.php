<?php

class Nif
{
    private $dni;
    private $letra;
    private $esValido;

    public function __construct($nif)
    {
        $this->validarLetra($nif);
    }

    //La función valida la letra del NIF: primero comprueba que la cadena sea de 10 char, luego divide y compara.
    public function validarLetra($nif)
    {


        if (strlen($nif) == 10) {
            $datos = explode("-", $nif);
            $this->dni = $datos[0];
            $this->letra = $datos[1];


            $moduloDni = $this->dni % 23;
            $cadenaLetras = "TRWAGMYFPDXBNJZSQVHLCKE";

            $letraAux = $cadenaLetras[$moduloDni];
            if ($this->letra == $letraAux) {
                //El NIF es correcto
                $this->esValido = true;
            } else {
                //El NIF es erróneo
                $this->esValido = false;
            }
        } else {
            $this->esValido = false;
        }
    }

    function __toString()
    {
        return  $this->dni . "-" . $this->letra;
    }

    public function setDni($valor)
    {
        return $this->dni = $valor;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getEsValido()
    {
        return $this->esValido;
    }
}
