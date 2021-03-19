<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function mailto($to, $sub, $msg) {
    // require './vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/src/Exception.php';
//Define name spaces

require 'credential.php';
// include './includes/vendor/phpmailer/src/PHPMailer.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 4;                            

$mail->isSMTP();                                 
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;          
$mail->Username = EMAIL;         
$mail->Password = PASS;          
$mail->SMTPSecure = 'tls';       
$mail->Port = 587;               
$mail->setFrom(EMAIL, 'G C');
$mail->addAddress($to);     
$mail->isHTML(true);                    
$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);
$mail->Subject = $sub;
$mail->Body    = $msg;
$mail->AltBody = $msg;

if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
    return false;
} else {
    // echo 'Message has been sent';
    // header("Location: http://localhost/HOME/ADMIN/tutorman.php");
    return true;
}
}
?>