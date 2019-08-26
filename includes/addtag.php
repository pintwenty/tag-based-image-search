<?php
session_start();
include 'config.php';
if (!isset($_SESSION['id'])) {
	# code...
	die("0");
}
$name = $_POST['tname'];

$sql = "INSERT INTO tags (name) VALUES ('$name')";
if ($conn->query($sql) === TRUE) {
	echo "1";	
} else {
   	echo "0";
}


?>