<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;    
    public $nombre;    
    public $token;   

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    // Enviar confirmación de email
    public function enviarConfirmacion() {
        // Crear el objeto de email
        $mail = new  PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['DB_EMAIL_HOST'];
        $mail->SMTPAuth = false;
        //$mail->Port = 2525;
        $mail->Username = $_ENV['DB_EMAIL'];
        $mail->Password = $_ENV['DB_EMAIL_PASS'];
        $mail->setFrom($_ENV['DB_EMAIL']);
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->IsHTML(true);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong> " . $this->nombre . " </strong> Has creado tu cuenta en Network Exporter, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=". $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        // Enviar el mail
        $mail->send();
    }

    // Enviar confirmacion para cambiar password
    public function enviarInstrucciones() {
         // Crear el objeto de email
         $mail = new  PHPMailer();
         $mail->isSMTP();
         $mail->Host = 'correo.cnfl.go.cr';
         $mail->SMTPAuth = false;
         //$mail->Port = 2525;
         $mail->Username = $_ENV['DB_EMAIL'];
         $mail->Password = $_ENV['DB_EMAIL_PASS'];
         $mail->setFrom($_ENV['DB_EMAIL']);
         $mail->addAddress($this->email);
         $mail->Subject = 'Reestablece tu Password';
 
         // Set HTML
         $mail->IsHTML(true);
         $mail->CharSet = "UTF-8";
 
         $contenido = "<html>";
         $contenido .= "<p>Hola <strong> " . $this->nombre . " </strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
         $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=". $this->token . "'>Recuperar Cuenta</a> </p>";
         $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
         $contenido .= "</html>";
         $mail->Body = $contenido;
 
         // Enviar el mail
         $mail->send();
    }
}