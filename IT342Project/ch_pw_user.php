
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>change password</title>
</head>
<body>
	<?php
include "function.php";
$username=loggedIn();
$conn=db_connect();
$getmnglevel="select manager from users where username='$username'";
$result=$conn->query($getmnglevel) or die($conn->error);
$row=$result->fetch_assoc();

$mnglevel= $row['manager'];
	 echo "Welcome, ".$username."! ";
        echo " | ";
        if($mnglevel==0){
    echo "you are not a manager.";
}
	if($mnglevel==1){
    echo "<a href='manage.php'>Manage users</a>";
}
echo " | ";
echo "<a href='ch_pw_user.php'>Change password</a>";
echo " | ";
echo "<a href='list.php'>Back to list</a>";
echo " | ";
echo "<a href='login.php'>Log out</a>";

         ?>
	<form action="ch_pw_user_pcs.php" method="post">
		<p>Change Password</p>
		New Password<input type="text" name="pw"><br>
		<input type="submit" value="change">
	</form>
</body>
</html>