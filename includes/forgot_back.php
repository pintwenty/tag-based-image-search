<?php
session_start();
include 'config.php';
include_once('mail/index.php');
error_reporting(0);
$name="Sir/Ma'am";
$email = $_POST['email'];
$_SESSION['email'] = $email;
$new_pass = md5($_POST['new_password']);
$_SESSION['new_pass']=$new_pass;
$re_new_pass = md5($_POST['re_new_password']);


if ($new_pass == $re_new_pass) {

	$result = mysqli_query($conn,"SELECT email from users where email='$email'");
	if(mysqli_num_rows($result)>0)
	{
		$mail->Subject = 'Password Reset Confirmation';
		$mail->Body = "Hi $name,<br><p style='padding:30px 50px;'>Your Account Password has been changed. Please <a href='http://localhost/activate.php?pass=changed'>Click Here</a> to Confirm.</p><br><br><br>
			<p><strong>Important : Please do not reply to this email. It is an auto-generated message. For any queries, please contact the admin.</strong></p> ";
		$mail->addAddress($email,$name);
		if($mail->send()){
			echo "<center><h1>Please close this page and Check your mail to confirm</h1></center>";
		}else {
			echo "<center>Something went wrong...! Please Contact Administrator</center>";
		}			
	}
	else
	{
		echo "<center><strong>No user linked with this email account</strong></center>";
	}
		
    	
	} else {
    	echo "<center>Passwords do not match</center>";
	}

?>