<?php
include "function.php";
$conn=db_connect();
if(!$stmt=$conn->prepare("UPDATE users set pw=? where username=? ")){
	die( "error:".$conn->error);
}
$username=loggedIn();

$pw=$_POST['pw'];
if(!$stmt->bind_param("ss",$pw,$username)){
	die( "error:".$conn->error);
}
$pw=password_hash($pw,PASSWORD_BCRYPT);
if(!$stmt->execute()){
		die( "error:".$conn->error);
}
header('Location:login.php');
?>