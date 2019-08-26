<?php

include 'config.php';
session_start();
if (!isset($_SESSION['id'])) {
	die('Session Expired');
}
// print_r($_POST['tags']);
$target_dir = "../images/";
$name = $_SESSION['id'].''.time().''.basename($_FILES["image"]["name"]);
$target_file = $target_dir.''.$name;
$uploadOk = 1;

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    	try{
    	$tags =$_POST['tags'];
    	$sql = "INSERT INTO images (uid,image) VALUES ('".$_SESSION['id']."', '$name')";
    	if ($conn->query($sql) === TRUE) {
    		$id = $conn->insert_id;
    		foreach ($tags as $tag) {
    			$sql1 = "INSERT INTO taglink (iid,tag) VALUES ($id, '".$tag."');";
    			$conn->query($sql1);
    		}
    	// header("HTTP/1.1 200 OK");
    	echo "image added Successful";
            header("refresh:2;url=". $_SERVER['HTTP_REFERER']);
             
    		
    	}
    }catch(Exception $e){
    	header("Internal Server Error");
    	echo $e->getMessage();
    }

    } else {
    	header("Internal Server Error");
    	echo "Sorry, there was an error uploading your file.";

    }
}

?>