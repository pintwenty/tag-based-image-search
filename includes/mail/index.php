<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('PHPMailer/SMTP_ACC.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// echo "hii";
$mail = new PHPMailer();

// $mail->Host = "box1311.bluehost.com";
//$mail->isSMTP();                         // set mailer to use SMTP
$mail->Host = HOST;    // specify bluehost as outgoing server
// $mail->SMTPSecure = "tls";               // sets the prefix to the server do not use ssl
//$mail->SMTPDebug  = 3;  
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->CharSet = "UTF-8";
$mail->Username = USERNAME;

$mail->Password = PASSWORD;

$mail->SMTPSecure = "ssl"; // ssl or we can use tls

$mail->Port = 465; //465 if ssl or 587 if TLS

$mail->isHTML(true);
$mail->setFrom(USERNAME,VENDOR);
// $mail->addReplayTo('example@gmail.com');
// $mail->addAttachment('path','name');


 ?>
