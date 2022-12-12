<?php

require_once "./Emisor.php";
require_once "./Envio.php";
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;

class ControladorMailer{
    private $mail;
   
    public function __construct()
    {
        $emisor1 = new Emisor("169.254.108.118", 25);
        $this->mail = new PHPMailer();

        $this->mail->IsSMTP();
        // cambiar a O para no ver mensajes de error
        $this->SMTPDebug = 2;
        $this->mail->SMTPAuth = false;
        //$mail->SMTPSecure = "tls";
        $this->mail->Host = $emisor1->getHost();
        $this->mail->Port = $emisor1->getPuerto();
        // introducir usuario de google
        $this->mail->Username = "";
        // introducir clave
        $this->mail->Password = "";

        $address = "miServidor@servidor.com";
        $this->mail->AddAddress($address, "Test");
        
    }

    function envioMensaje(Envio $envio){
      //  echo $envio->getDireccion();
        $this->mail->SetFrom($envio->getDireccion(), $envio->getDireccion());
        $this->mail->Subject = ($envio->getAsunto());
        $this->mail->MsgHTML($envio->getMensaje());
        $resul = $this->mail->Send();
        if (!$resul) {
            echo "Error". $this->mail->ErrorInfo;
        } else {
            echo "Enviado";
        }
    }
}
