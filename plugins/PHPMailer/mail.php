<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sjkspam254@gmail.com';                     //SMTP username
    $mail->Password   = 'wcqeicpahakllaur';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set 

    //Recipients
    $mail->setFrom('sjkspam254@gmail.com', 'Sharlet');
    $mail->addAddress($mailMsg['sjk2spam254@gmail.com'], $mailMsg['Sharlet']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mailMsg['Welcome.'];
    $mail->Body    = nl2br($mailMsg[' Thank you for joining. <br> Your verification code is <br> <h1> 45521 </h1>']);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
}