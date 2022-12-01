<?php
class Emisor{

    private $host;
    private $puerto;

    function __construct($host, $puerto){
        $this->setHost($host);
        $this->setPuerto($puerto);
        
    }


    function setPuerto($puerto){
        $this->puerto = $puerto;
    }

    function setHost($host){
        $this->host = $host;
    }



    /**
     * Get the value of host
     */ 
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Get the value of puerto
     */ 
    public function getPuerto()
    {
        return $this->puerto;
    }
}

?>