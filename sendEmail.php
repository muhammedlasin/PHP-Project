<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


require 'vendor/autoload.php';


include './header.php';



//$userId = 10; //is a developer

function sendEmailToUser($userId, $message)
{
    $userObj = new UsersContr();

    $userEmailAdrress = $userObj->getEmailFromUsersId($userId);



    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                           //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'clnfterrific982@gmail.com';                     //SMTP username
        $mail->Password   = 'otdojpgyxyggijvz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($userEmailAdrress, 'user');     //Add a recipient

        


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Update';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    return;
}
