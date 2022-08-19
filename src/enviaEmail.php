<?php

use  PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception ;
require "../vendor/autoload.php";

$resposta = Array();

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $msg = $_POST["msg"];
    $para = "kaiords.14@gmail.com";
    $assunto = "Script de enviar email";
    $corpo = "Nome: ".$nome."<br>Email: ".$email."<br>Mensagem: ".$msg;
    $mail = new PHPMailer(true);
    try {

            $mail->IsSMTP();        // Ativar SMTP
            $mail->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail->SMTPAuth = true;     // Autenticação ativada
            $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
            $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
            $mail->Port = 465; 
            $mail->Username = '';
            $mail->Password = '';
            $mail->SetFrom('kaiords.14@gmail.com', 'caioRS');
            $mail->addAddress($email,'qualquer coisa que quiser');
            $mail->Subject=($assunto);
            $mail->msgHTML($corpo);
        if ($mail->send()){
            echo 'enviado';
        }else{
            echo 'não enviado.';
         } 
        }
        catch (Exception  $e) {
            echo "ERRO: {$mail->ErrorInfo}";
        }   
}
    
