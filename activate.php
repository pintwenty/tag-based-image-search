<?php
session_start();
include 'includes/config.php';

if(isset($_REQUEST['key']))
{
	$key = $_REQUEST['key'];
	$sql = "SELECT status FROM users where activationKey='$key'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		$user = $result->fetch_assoc();
		if($user['status'] == 0){
			$sql = "UPDATE users SET status=1 WHERE activationKey='$key'";

			if ($conn->query($sql) == TRUE) {
	    		echo "<br><br><br><br><center>Activation successful.</center>";
	    		header("refresh:2;url=login.php");
			} else {
	    		echo "Error : Please Contact Administrator :(";
			}

		}else{
	    		echo "<br><br><br><center>Account has already been Activated.<br></center>";
	    		header("refresh:2;url=login.php");

		}
	}
}
if(isset($_REQUEST['pass']))
{
	$email=$_SESSION['email'];
	$new_pass=$_SESSION['new_pass'];
	if($_REQUEST['pass']=="changed")
		{
			$sql = "SELECT password FROM users where email='$email'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0){
				$user = $result->fetch_assoc();
					$sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";

					if ($conn->query($sql) == TRUE) {
			    		echo "<br><br><br><center>Password has been reset</center>";
			    		header("refresh:2;url=login.php");
					} else {
			    		echo "Error : Please Contact Administrator :(";
					}
			}
		}
}

?>