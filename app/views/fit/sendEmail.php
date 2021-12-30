<?php 




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = '587';
#$mail->isHTML();
$mail->Username = 'fit.it.its@gmail.com';
$mail->Password = 'Mejakursi1';
$mail->setFrom('fit.it.its@gmail.com');
$mail->Subject = 'yo';
$mail->Body = 'tes yo kl masok chat yo';
$to='nugas.time@gmail.com'. ',';
$to.='mileniaulwanzafira@gmail.com';
#$mail->SetFrom("$from", "$from");
$mail->addAddress("$to");

#$mail->Subject = "$subject";
#$mail->Body = "$message";
$mail->Send();

$mail->smtpClose()

?>