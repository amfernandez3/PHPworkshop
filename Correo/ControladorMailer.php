<?php

require_once "./Emisor.php";
require_once "./Envio.php";
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;

class ControladorMailer{
    private $mail;
    $this->mail = new PHPMailer();

    public function __construct()
    {
        $emisor1 = new Emisor("10.10.32.7", 25);
        
        $mail->IsSMTP();
        // cambiar a O para no ver mensajes de error
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = false;
        //$mail->SMTPSecure = "tls";
        $mail->Host = $emisor1->getHost();
        $mail->Port = $emisor1->getPuerto();
        // introducir usuario de google
        $mail->Username = "";
        // introducir clave
        $mail->Password = "";

        $address = "miServidor@servidor.com";
        $mail->AddAddress($address, "Test");
        
    }

    function envioMensaje(Envio $envio){
        $mail->SetFrom($envio->getDireccion(), $envio->getDireccion());
        $mail->Subject = ($envio->getAsunto());
        $mail->MsgHTML($envio->getMensaje());
        $resul = $mail->Send();
        if (!$resul) {
            echo "Error". $mail->ErrorInfo;
        } else {
            echo "Enviado";
        }
    }
}
