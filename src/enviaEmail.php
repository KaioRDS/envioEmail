<?php

use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception ;
require "../vendor/autoload.php";

$resposta = Array();

if(isset($_POST['nome']) && isset($_POST['email'])){
    $nome = addslashes( $_POST['nome']);
    $emailUser = addslashes($_POST['email']);
    $msg = addslashes($_POST['msg']);

    
    $mail = new PHPMailer(true);

    try {

        // Configurações do servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        $mail->isSMTP();        //Devine o uso de SMTP no envio
        //$mail->SMTPDebug = 2;
        $mail->SMTPAuth     = true; //Habilita a autenticação SMTP
        $mail->Username     = 'kaiords.14@gmail.com';
        $mail->Password     = '';
        // Criptografia do envio SSL também é aceito
        $mail->SMTPSecure   = 'tls';
        // Informações específicadas pelo Google
        $mail->Host         = 'smtp.mail.gmail.com';
        $mail->Port         = 587;
        // Define o remetente
        $mail->setFrom('kaiords.14@gmail.com', 'Enviando email');
        // Define o destinatário
        $mail->addAddress($emailUser);
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject      = 'Envio de email';
        $mail->Body         = $msg;
        //$mail->AltBody    = 'Este é o cortpo da mensagem para clientes de e-mail que não reconhecem HTML';
        $mail->CharSet = 'UTF-8';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            )
        );

        // Enviar
        $mail->send();
        echo 'A mensagem foi enviada!';
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
    