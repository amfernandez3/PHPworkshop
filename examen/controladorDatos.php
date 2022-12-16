<?php 
class controladorDatos{
    private $partidas_ganadas;
    private $partidas_jugadas;
    private $ganar;
    private $palabra;
    private $palabra_oculta;
    private $letras;
    private $vidas;

    function __construct(){
        
    }

    function guardarDatos($partidas_ganadas, $partidas_jugadas, $ganar){
        if (isset($_COOKIE['partidas_jugadas'])) {
            $partidas_jugadas = $_COOKIE['partidas_jugadas'];
        } else {
            setcookie('partidas_jugadas', $partidas_jugadas, time() + 3600 * 24 * 30);
        }
        //Definición de partidas ganadas (Igual a partidas_jugadas pero dependiente del valor de $ganar)
        if (isset($_COOKIE['partidas_ganadas'])) {
            $partidas_ganadas = $_COOKIE['partidas_ganadas'];
        } else {
            setcookie('partidas_ganadas', $partidas_ganadas, time() + 3600 * 24 * 30);
        }
    }

    /**
     * Get the value of partidasJugadas
     */ 
    public function getPartidasJugadas()
    {
        if(isset($_COOKIE['partidas_jugadas'])){
            $this->partidas_jugadas = $_COOKIE['partidas_jugadas'];
        }
        
        return $this->partidas_jugadas;
    }

    /**
     * Get the value of partidasGanadas
     */ 
    public function getPartidasGanadas()
    {
        if(isset($_COOKIE['partidas_ganadas'])){
            $this->partidas_ganadas = $_COOKIE['partidas_ganadas'];
        }
        
        return $this->partidas_ganadas;
    }

    function cargarSession(){
        $this->palabra = $_SESSION['palabra'];
        $this->palabra_oculta = $_SESSION['palabra_oculta'];
        $this->letras = $_SESSION['letras'];
        $this->vidas = $_SESSION['vidas'] ;
    }

    function guardarSession($palabra, $palabra_oculta, $letras, $vidas){
        $_SESSION['palabra'] = $palabra;
        $_SESSION['palabra_oculta'] = $palabra_oculta;
        $_SESSION['letras'] = $letras;
        $_SESSION['vidas'] = $vidas;
    }

}

?>