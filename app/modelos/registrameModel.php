<?php

/*
 * Copyright 2014 Jonathan Fernández jonathan.fernandezj@gmail.com.
 *
 */
include_once 'config/database.php';
require_once '../assets/phpmailer/PHPMailerAutoload.php';

/**
 * Description of registrame
 *
 * @author Jonathan Fernández jonathan.fernandezj@gmail.com
 */
class registrameModel {

    private $connection;
    private $mail;

    public function __construct() {
        $this->connection = new database;
        $this->mail = new PHPMailer();
    }

    public function sendMail() {
        $this->mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $this->mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
        $this->mail->Debugoutput = 'html';
//Set the hostname of the mail server
        $this->mail->Host = "mail.bcard.cl";
//Set the SMTP port number - likely to be 25, 465 or 587
        $this->mail->Port = 25;
//Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;
//Username to use for SMTP authentication
        $this->mail->Username = "contacto@bcard.cl";
//Password to use for SMTP authentication
        $this->mail->Password = "jfernandezBCARD";
//Set who the message is to be sent from
        $this->mail->setFrom('contacto@bcard.cl', 'Jonathan Fernández');
//Set an alternative reply-to address
        $this->mail->addReplyTo('contacto@bcard.cl', 'Jonathan Fernández');
//Set who the message is to be sent to
        $this->mail->addAddress('jfernandezj@gmail.com', 'Jonathan Fernández');
//Set the subject line
        $this->mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $this->mail->msgHTML(file_get_contents('../assets/phpmailer/contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
        $this->mail->AltBody = 'This is a plain-text message body';
//Attach an image file
        $this->mail->addAttachment('../assets/phpmailer/phpmailer_mini.gif');

//send the message, check for errors
        if (!$this->mail->send()) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
    
    public function add($p) {

        $email = $this->connection->sanitize($p['email']);
        $password = $this->connection->sanitize($p['password']);
        $subject = "Registro exitoso Bcard";
        //TODO: generar hash para validación de correos
        $message = "Prueba envío de correos";
        $q = "INSERT INTO `bussiness_card`.`base_usuario`
                (`nombre`, `email`,`logapp`,`pwd`,`fecha_creacion`,`fecha_modificacion`,`activo`,`idperfil`)
                VALUES(
                ' ',
                '$email',
                1,
                MD5('$password'),
                now(),
                now(),
                1,
                7);";
        if ($this->connection->_query($q)) {

            if ($this->sendMail()) {
                return 1;
            } else {
                return "Ha ocurrido un error";
            }
        } else {
            $this->connection->error();
        }
    }
}
