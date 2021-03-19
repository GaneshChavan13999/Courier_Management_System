<?php
include "includes/mail.php";
mailto("mayurchavan13999@gmail.com","Hello","This Is Body");
// $email_send = new phpmailer();
// $email_send->sendMail("mayurchavan13999@gmail.com","Hello","This Is Body");
?>
<?php
// class phpmailer {
//   public function sendMail($email, $message, $subject)
//   {
//       // require_once('./includes/vendor/phpmailer/src/phpmailer/class.phpmailer.php');
//       // require_once('./includes/vendor/phpmailer/src/phpmailer/class.smtp.php');
//       // require_once('./includes/vendor/phpmailer/src/phpmailer/class.pop3.php');
//       $mail = new PHPMailer();
//       $mail->isSMTP();
//       $mail->SMTPDebug = 0;
//       $mail->SMTPAuth = true;
//       $mail->SMTPSecure = "ssl";
//       $mail->Host = "smtp.gmail.com";
//       $mail->Port = 465;
//       $mail->addAddress($email);
//       $mail->Username = "email@gmail.com";
//       $mail->Password = "email_password";
//       $mail->setFrom('email_Sent_from@gmail.com', 'Alias');
//       $mail->addReplyTo("email_to@gmail.com", "Alias");
//       $mail->Subject = $subject;
//       $mail->msgHTML($message);
//       $mail->send();
//   }
// }
?>