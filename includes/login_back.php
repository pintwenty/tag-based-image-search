<?php
error_reporting(0);
include 'config.php';

$email = $_REQUEST['username'];
$pass = md5($_REQUEST['password']);
$sql = "SELECT id,name,email FROM users where (name='$email' or email='$email') and password='$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	session_start();
	$_SESSION = $result->fetch_assoc();
	header("location:../index.php");
	exit();
}else{
	echo "<center>Invalid username or password</center>";

}	
?>