<?php 
include("function.php");
function createUser($username,$password,$manager=0){
$conn=db_connect();
if(!$stmt=$conn->prepare("INSERT INTO users (username,pw,manager) VALUES (?,?,?) ")){
	die( "error:".$conn->error);
}
if(!$stmt->bind_param("ssi",$username,$password,$manager)){
	die( "error:".$conn->error);
}
$password=password_hash($password,PASSWORD_BCRYPT);


if(!$stmt->execute()){
		die( "error:".$conn->error);
}
}
// createUser("fumx17","1173790");


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
</head>
<body>


	<form action="login.php" method="post">
		
		Username:<input type="text" name="username" required="required"><br>
		Password:<input type="password" name="password" required="required"><br>
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>