<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require '../solicitud_serv.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';  //HOST correo                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pistons.pruebas.taller@gmail.com';        //SMTP username
    $mail->Password   = 'Taller22';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pistons.pruebas.taller@gmail.com', 'taller Mail cita');
    $mail->addAddress('ma.morcillo.2015@gmail.com', 'M Angeles');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enviado por la web Taller_pistons ';
    $mail->Body    = 'Mensage de peticion de cita enviado desde el formulario del taller: <br> Su vehículo con matricula </b>'.$_POST['vehiculo']. 'tiene cita en nuestro taller el '.$_POST['fecha_cita'].', a las '.$_POST['hora_cita'] ;
    $mail->AltBody = 'Su cita esta Programada con exito';

    $mail->send();
    echo 'Message se envió con exito';
} catch (Exception $e) {
    echo "Hubo un error al enviar: {$mail->ErrorInfo}";
}
?>