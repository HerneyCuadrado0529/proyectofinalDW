<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

session_start();

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Username = '7865956f54b7297665c2ba24002c343b';
    $mail->Password = '4134c21807163ee666067a8b6f3de28e';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('mainapp2022@gmail.com', 'Herney Cuadrado');
    $mail->addAddress($_GET['email'], 'Receptor');

    $mail->isHTML(true);
    $mail->Subject = 'Cambio de contraseña';
    $mail->Body = '<b>Hola</b>, Para cambiar su contraseña ingrese a este <a href="http://localhost/proyectofinaldw/public/UpdatePassword.php?email='.$_GET['email'].'">Enlace</a> .';

    if ($mail->send()) {
        echo '<script> alert("por favor revice su correo");
        window.location.href = "public/index.php";</script>';
    }
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;

    echo '<script> alert("Error' . $mail->ErrorInfo . '");
        window.location.href = "public/index.php";</script>';
}
