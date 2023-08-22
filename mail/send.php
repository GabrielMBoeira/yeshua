<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email_to)
{
    //Load Composer's autoloader
    require_once(dirname(__FILE__, 2) . '/vendor/autoload.php');

    $envPath = realpath(dirname(__FILE__, 2) . '/.env');
    $env = parse_ini_file($envPath);

    $username = $env['USERNAME_EMAIL'];
    $password = $env['PASSWORD_EMAIL'];

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;      //Enable verbose debug output
        $mail->isSMTP();                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';   //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                   //Enable SMTP authentication
        $mail->Username   = $username;              //SMTP username
        $mail->Password   = $password;              //SMTP password
        $mail->SMTPSecure =  'ssl';                 //Enable ssl encryption
        $mail->Port       = 465;                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';

        $name_from = 'Yeshua';
        $email_from = 'atendimento@yeshuabarbersc.com.br';
        $email_to = $email_to;

        //Recipients
        $mail->setFrom($email_from, $name_from);
        $mail->addAddress($email_to);
        // $mail->addReplyTo('ellen@example.com', 'Yeshua');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        $mail->isHTML(true);
        // $mail->WordWrap = 50;  
        $mail->Subject = "Atendimento Yeshua";

        $mail->Body    = "Olá, Você será o 3º a ser atendido(a)... 
                          <br>
                          <br>
                          <b>Compareça na Yeshua Barbearia!</b>
                          ";

        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

    } catch (Exception $e) {
        echo "Mensagem não pode ser enviada para $email_to!. Mailer Error: {$mail->ErrorInfo}";
    }
}


