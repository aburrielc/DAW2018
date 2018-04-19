<?php

require_once('conf.inc.php');

function enviarMail($emailOrigen,$nombreOrigen,$asunto,$cuerpo){
    
    require("../libs/PHPMailer-5.2.16/class.phpmailer.php");
    require("../libs/PHPMailer-5.2.16/class.smtp.php");
    
    global $hostSMTP, $usernameSMTP, $passwordSMTP, $emailDestino, $destinatario, $protocolo, $puerto;
        
    $mail = new PHPMailer;
    
    $mail->SMTPDebug = 0; //Si el valor es 4 muestra todo el proceso de "debug", en cambio, si es 0, no mostrará nada.
    
    //Iniciamos la validación por SMTP.
    $mail->isSMTP();
    
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    $mail->SMTPAuth = true; //Habilita la autenticación SMTP.
    
    $mail->Host = $hostSMTP; //SMTP a utilizar.
    $mail->Username = $usernameSMTP; // SMTP username.
    $mail->Password = $passwordSMTP; // SMTP password.
    
    $mail->SMTPSecure = $protocolo;
    $mail->Port = $puerto; //Puerto de conexión al servidor de envío.
    
    $mail->setFrom($emailOrigen,$nombreOrigen); //Email y nombre del remitente. 
    $mail->addAddress($emailDestino, $destinatario); //Dirección del destino del correo.
    
    $mail->addReplyTo($emailOrigen,$nombreOrigen); //Añade una dirección para el "Responder a".
    
    //Enviamos el correo como HTML.
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->Subject = $asunto; //Título o asunto del email.
    $mail->Body = $cuerpo; //Mensaje del email.
    
    //Realizamos el envio y comprobamos si el correo se ha enviado correctamente o no.
    $respuesta = "";
    if(!$mail->send()) {
        $respuesta = "El mensaje no ha podido ser enviado. Error:".$mail->ErrorInfo;
        echo $respuesta;
    } else {
        $respuesta = "correoEnviado";
        header("Location: ../contacto.php?respuesta=".$respuesta);
    }
}

?>