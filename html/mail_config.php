<?php


use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';



$mail = new PHPMailer(true);


    //Server settings

    $mail->isSMTP();                                        
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;

    $mail->Username   = '';         
    $mail->Password   = '';   

    $mail->SMTPSecure = 'ssl';                         
    $mail->Port       = 465;        


    $mail->isHTML(true);


   return $mail;