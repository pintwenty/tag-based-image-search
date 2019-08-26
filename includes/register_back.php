<?php
error_reporting(E_ALL);
include 'config.php';

include_once('mail/index.php');


$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$mobile = $_POST['mobile'];
$repass = md5($_POST['repassword']);


if ($pass == $repass) {
	$key = md5($email.'-'.$pass);
	$sql = "INSERT INTO users (name,email,mobile,password,activationKey) VALUES ('$name', '$email','$mobile', '$pass','$key')";

	if ($conn->query($sql) === TRUE) {
		$mail->Subject = 'Activation Confirmation';
		$mail->Body = "Hi $name,<br><p style='padding:30px 50px;'>Your Account has Registred Please <a href='http://localhost/activate.php?key=$key'>Click Here</a> to Activate.</p><br><br><br>
			<p><strong>Important : Please do not reply to this email. It is an auto-generated message. For any queries, please contact the admin.</strong></p>";
		$mail->addAddress($email,$name);
		if($mail->send()){
			echo "<br><br><br><center><h1>Please close this page and Check your mail to Activate the account</h1></center>";
		}else {
			echo "Something went wrong...! Please Contact Administrator";
		}
    	
	} else {
    	echo "Error:<br>" . $conn->error;
	}
}
else{
	echo "Passwords do not match";
}


?>