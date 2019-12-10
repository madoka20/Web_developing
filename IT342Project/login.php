<?php 
include("function.php");




function checkUser($username,$password){

$conn=db_connect();
if(!$stmt=$conn->prepare("SELECT pw FROM users WHERE username=? ")){
	die( "error:".$conn->error);
}
$stmt->bind_param("s",$username);

$stmt->execute();
$stmt->bind_result($hashed_pw);
if($stmt->fetch()){
return password_verify($password, $hashed_pw);
}else{
	return 0;
}
}

if(isset($_POST['login'])){


if(checkUser($_POST['username'],$_POST['password'])){
	setcookie("username",$_POST['username'],time()+1440);
	header('Location:list.php');
}else{
	echo "invalid";
}

}
?>



<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<style>
		.center{
			position: absolute;
			top: 50%;
			left:50%;
			 margin-top: -170px;
  			margin-left: -130px;
		}
	</style>
	 <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
	<div class="center">
		
		<h4 style="text-align: center;"c>CTS Computer Inventory</h4>
	<form action="login.php" method="post">
		
		Username:<input class="form-control" type="text" name="username" required="required"><br>
		Password:<input class="form-control" type="password" name="password" required="required"><br>
		<input style="width:100%;" class="btn btn-primary" type="submit" name="login" value="Login">
	</form>
	</div>
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>