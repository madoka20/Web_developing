<?php
include "function.php";
$conn=db_connect();
if(!$stmt=$conn->prepare("UPDATE users set manager=? where username=? ")){
	die( "error:".$conn->error);
}
$username=$_POST['username'];

$manager=$_POST['manager'];
if(!$stmt->bind_param("is",$manager,$username)){
	die( "error:".$conn->error);
}
if(!$stmt->execute()){
		die( "error:".$conn->error);
}
header('Location:manage.php');
?>