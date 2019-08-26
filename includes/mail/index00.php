<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// echo "hii";
$mail = new PHPMailer();

// $mail->Host = "box1311.bluehost.com";
$mail->IsSMTP();                         // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";    // specify bluehost as outgoing server
// $mail->SMTPSecure = "tls";               // sets the prefix to the server do not use ssl
$mail->SMTPDebug  = 3;  
// $mail->SMTPDebug = 1;
// $mail->isSMTP();
$mail->SMTPAuth =true;
$mail->CharSet = "UTF-8";
$mail->Username = "santhoshsai20@gmail.com";

$mail->Password = "";

$mail->SMTPSecure = "tls"; // or we can use ssl

$mail->Port = 587; //465 if ssl or 587 if TLS

// $mail->isHTML(true);
// $mail->addReplayTo('example@gmail.com');
// $mail->addAttachment('path','name');
$mail->Subject = 'Testing from PHPMailer';
$mail->Body = 'this is body sent from PHPMailer';
$mail->setFrom('santhoshsai20@gmail.com','Santosh P');
$mail->addAddress('santhoshsai20@gmail.com','Santosh');
if($mail->send()){
	echo "mail sent..!";
}
else {
	echo $mail->ErrorInfo;
}

 ?>
