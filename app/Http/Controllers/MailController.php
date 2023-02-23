<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
use Illuminate\Http\Request;

class MailController extends Controller
{
    private $User;
    private $Pass;
    private $Host;

    public function __construct()
    {
        $this->User = 'Email';
        $this->Pass = '1234';
        $this->Host = 'www';
    }
    public function Enviar_Email($nome, $email, $token){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = $this->Host;                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $this->User;                     // SMTP username
            $mail->Password   = $this->Pass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('from@example.com', 'Project Cruize');
            $mail->addAddress($email, $nome);     
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Email de validação do Usuario: '.$nome;
            $mail->Body    = '<h1>Esse token irá servir para validar sua conta e/ou poder recuperar sua conta.</h1>
            <br>
            <h2>Seu token e: <span style="color:red;">'.$token.'</span> </h2>';
            $mail->send();
        } catch (Exception $e) {
            echo "Ocorreu um erro na validação de emails";
        }
    }
}
